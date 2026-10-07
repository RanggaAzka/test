<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the database with karyawan data.
     */
    public function run(): void
    {
        $karyawan = [
            ['nama' => 'Budi Santoso', 'jabatan' => 'Manajer', 'gaji' => 8500000],
            ['nama' => 'Siti Aminah', 'jabatan' => 'Admin', 'gaji' => 4200000],
            ['nama' => 'Ahmad Fauzi', 'jabatan' => 'Staff IT', 'gaji' => 5500000],
            ['nama' => 'Dewi Lestari', 'jabatan' => 'Staff Keuangan', 'gaji' => 4800000],
            ['nama' => 'Rudi Hartono', 'jabatan' => 'Supervisor', 'gaji' => 6250000],
            ['nama' => 'Ratna Sari', 'jabatan' => 'Staff HRD', 'gaji' => 5000000],
            ['nama' => 'Joko Prasetyo', 'jabatan' => 'Staff Gudang', 'gaji' => 3750000],
        ];

        foreach ($karyawan as $data) {
            Karyawan::create($data);
        }
    }
}
