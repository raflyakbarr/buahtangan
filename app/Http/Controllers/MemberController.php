<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\RiwayatPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        confirmDelete();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required',
                'telp' => [
                    'unique:members',
                ],
            ]);
    
            // Membuat objek Member baru
            $member = new Member();
            $member->name = $request->name;
            $member->telp = $request->telp;
            $member->member_number = random_int(100000, 999999);
            $member->points = $request->points;
            $member->user_id = Auth::id();
    
            // Menyimpan member
            $member->save();
    
            // Membuat QR code
            $link = url('/member-list/' . $member->member_number);
            $qrCode = QrCode::size(300)
                            ->style('dot')
                            ->eye('circle')
                            ->margin(1)
                            ->color(1, 94, 0) 
                            ->generate($link);
            
            $qrCodeDir = public_path('qrcodes');
            if (!File::isDirectory($qrCodeDir)) {
                File::makeDirectory($qrCodeDir, 0755, true, true);
            }
    
            $qrCodePath = 'qrcodes/' . time() . '.svg';
            $fullPath = public_path($qrCodePath);
            file_put_contents($fullPath, $qrCode);
    
            $member->qr_code = $qrCodePath;
            $member->save();
    
            // Menyimpan riwayat poin jika ada
            if ($request->points > 0) {
                RiwayatPoint::create([
                    'member_number' => $member->member_number,
                    'user_id' => Auth::id(),
                    'points' => $request->points,
                ]);
            }
    
            // Tampilkan pesan sukses
            Alert::success('Sukses', 'Berhasil menambah member.');
            return redirect()->route('members.index');
        } catch (ValidationException $e) {
            // Tampilkan pesan kesalahan validasi
            Alert::error('Gagal', 'Nomor telepon sudah digunakan.');
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan umum
            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan data.');
            return redirect()->back()->withInput();
        }
    }

    public function show($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        $riwayatPoints = RiwayatPoint::where('member_number', $member->member_number)
            ->with('admin')
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('members.show', compact('member', 'riwayatPoints'));
    }

    public function edit($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $member_number)
    {
        try {
            // Validasi input
            $request->validate([
                'name' => 'required',
                'telp' => [
                    'required',
                ],
            ]);
    
            // Mengambil member berdasarkan nomor member
            $member = Member::where('member_number', $member_number)->firstOrFail();
            $member->name = $request->name;
            $member->telp = $request->telp;
    
            // Simpan perubahan
            $member->save();
    
            // Tampilkan pesan sukses
            Alert::success('Sukses', 'Member Berhasil Di Edit.');
            return redirect()->route('members.index');
        } catch (ValidationException $e) {
            // Tampilkan pesan kesalahan validasi
            Alert::error('Gagal', 'Validasi gagal. Silakan periksa input Anda.');
            return redirect()->back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Tampilkan pesan kesalahan umum
            Alert::error('Gagal', 'Terjadi kesalahan saat mengupdate data.');
            return redirect()->back()->withInput();
        }
    }

    public function destroy($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        $member->delete();
        Alert::success('Deleted Successfully', 'Member Data Deleted Successfully.');
        return redirect()->route('members.index');
    }

    public function indexForGuests($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        return view('member-list', compact('member'));
    }

    public function addPoints(Request $request)
    {
        $request->validate([
            'member_number' => 'required|exists:members,member_number',
            'points' => 'required|integer|min:1'
        ]);

        $member = Member::where('member_number', $request->member_number)->firstOrFail();
        $member->points += $request->points;
        $member->save();

        RiwayatPoint::create([
            'member_number' => $member->member_number,
            'user_id' => Auth::id(),
            'points' => $request->points,
        ]);

        return response()->json(['success' => true]);
    }
    public function deleteRiwayatPoint(Request $request, $member_number)
    {
        $riwayatPoint = RiwayatPoint::findOrFail($request->id);
        
        if ($riwayatPoint->member_number != $member_number) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
    
        // Ambil jumlah points yang akan dihapus
        $pointsToRemove = $riwayatPoint->points;
    
        // Cari member
        $member = Member::where('member_number', $member_number)->firstOrFail();
    
        // Pastikan member memiliki cukup points
        if ($member->points < $pointsToRemove) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus riwayat karena points member tidak mencukupi.');
        }
    
        // Kurangi points member
        $member->points -= $pointsToRemove;
        $member->save();
    
        // Hapus riwayat point
        $riwayatPoint->delete();
        
        return redirect()->route('members.show', $member_number)->with('success', 'Riwayat point berhasil dihapus dan points member diperbarui.');
    }
    public function resetPoints($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();

        // Reset points to 0
        $member->points = 0;
        $member->save();

        // Delete all point history for this member
        RiwayatPoint::where('member_number', $member_number)->delete();
        Alert::success('Reset Sukses', 'Memper Points Berhasil Di Edit.');
        return redirect()->route('members.index', $member_number);
    }
    public function tukarPoin(Request $request, $member_number)
    {
        $request->validate([
            'points' => 'required|integer|min:1'
        ]);
    
        $member = Member::where('member_number', $member_number)->firstOrFail();
    
        if ($member->points < $request->points) {
            Alert::error('Error', 'Poin tidak mencukupi untuk ditukarkan.');
            return redirect()->back();
        }
    
        $member->points -= $request->points;
        $member->save();
    
        RiwayatPoint::create([
            'member_number' => $member->member_number,
            'user_id' => Auth::id(),
            'points' => -$request->points, // Negative value to indicate points were deducted
        ]);
    
        Alert::success('Sukses', 'Poin berhasil ditukarkan.');
        return redirect()->route('members.show', $member_number);
    }
}
