<?php

namespace Database\Seeders;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserKaryawanDivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $it = Divisi::create([
            'nama' => 'it',
            'active' => 1
        ]);

        $staff_it = User::factory()->create([
            'nama' => 'staff_it',
            'email' => 'staff_it@example.com',
        ]);

        $supervisor_it = User::factory()->create([
            'nama' => 'supervisor_it',
            'email' => 'supervisor_it@example.com',
        ]);

        $manager_it = User::factory()->create([
            'nama' => 'manager_it',
            'email' => 'manager_it@example.com',
        ]);

        $staff_it->atasan()->attach([
            $supervisor_it->id => ['level' => 1],
            $manager_it->id => ['level' => 2],
        ]);


        $staff_it->karyawan()->create([
            'nama' => $staff_it->nama,
            'divisi_id' => $it->id,
            'nama_divisi' => $it->nama,
            'status_karyawan' => 'tetap',
            'tanggal_masuk' => now(),
            'jenis_kelamin' => 'L'
        ]);
    }
}
