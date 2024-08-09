<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Makanan Ringan', 'slug' => Str::slug('Makanan Ringan'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Roti & Kue', 'slug' => Str::slug('Roti & Kue'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Minuman', 'slug' => Str::slug('Minuman'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Perangkat Dapur', 'slug' => Str::slug('Perangkat Dapur'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Obat-Obatan & Alat Kesehatan', 'slug' => Str::slug('Obat-Obatan & Alat Kesehatan'), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('categories')->insert($categories);
    }
}