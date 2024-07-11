<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telp' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'unique:members',
            ],
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->telp = $request->telp;
        $member->member_number = random_int(100000, 999999);
        $member->points = $request->points;

        // Save the member first to get the ID
        $member->save();

        // Generate QR code
        $link = url('/member-list/' . $member->member_number);
        $qrCode = QrCode::size(300)
                    ->style('dot')
                    ->eye('circle')
                    ->margin(1)
                    ->color(1, 94, 0) // Adjust RGB color values as needed
                    ->generate($link);
        $qrCodePath = 'qrcodes/' . time() . '.svg';
        file_put_contents(public_path($qrCodePath), $qrCode);

        $member->qr_code = $qrCodePath;
        $member->save();

        return redirect()->route('members.index')
            ->with('success', 'Member created successfully.');
    }

    public function show($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        return view('members.show', compact('member'));
    }

    public function edit($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $member_number)
    {
        $request->validate([
            'name' => 'required',
            'telp' => [
                'required',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:10',
                'unique:members,telp,' . $member_number . ',member_number',
            ],
        ]);

        $member = Member::where('member_number', $member_number)->firstOrFail();
        $member->name = $request->name;
        $member->telp = $request->telp;
        $member->points = $request->points; // Pastikan points diupdate sesuai kebutuhan

        // Simpan perubahan
        $member->save();

        return redirect()->route('members.index')
            ->with('success', 'Member updated successfully.');
    }

    public function destroy($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        $member->delete();

        return redirect()->route('members.index')
            ->with('success', 'Member deleted successfully.');
    }

    public function indexForGuests($member_number)
    {
        $member = Member::where('member_number', $member_number)->firstOrFail();
        return view('member-list', compact('member'));
    }
}
