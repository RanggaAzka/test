<?php

use App\Models\Karyawan;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

describe('index', function () {
    it('menampilkan daftar karyawan', function () {
        $karyawanA = Karyawan::factory()->create(['nama' => 'Budi Santoso']);
        $karyawanB = Karyawan::factory()->create(['nama' => 'Siti Aminah']);

        $this->get(route('karyawan.index'))
            ->assertSee($karyawanA->nama)
            ->assertSee($karyawanB->nama);
    });
});

describe('create', function () {
    it('merender halaman tambah karyawan', function () {
        $this->get(route('karyawan.create'))
            ->assertOk()
            ->assertSee('Tambah Karyawan');
    });
});

describe('store', function () {
    it('menyimpan karyawan baru dan kembali ke daftar', function () {
        $response = $this->post(route('karyawan.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Akuntan',
            'gaji' => 5000000,
        ]);

        $saved = Karyawan::firstOrFail();

        $response->assertRedirect(route('karyawan.index'));
        expect(Karyawan::count())->toBe(1);
        expect($saved->nama)->toBe('Budi Santoso')
            ->and($saved->jabatan)->toBe('Akuntan')
            ->and($saved->gaji)->toBe('5000000.00');
    });

    it('menolak kiriman kosong tanpa menyimpan data', function () {
        $this->post(route('karyawan.store'), [])
            ->assertSessionHasErrors(['nama', 'jabatan', 'gaji']);

        expect(Karyawan::count())->toBe(0);
    });

    it('menolak gaji yang bukan angka', function () {
        $this->post(route('karyawan.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Akuntan',
            'gaji' => 'abc',
        ])->assertSessionHasErrors('gaji');

        expect(Karyawan::count())->toBe(0);
    });

    it('menerima gaji dengan koma sebagai pemisah desimal', function () {
        $response = $this->post(route('karyawan.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Akuntan',
            'gaji' => '9000000,50',
        ]);

        $response->assertRedirect(route('karyawan.index'));
        expect(Karyawan::firstOrFail()->gaji)->toBe('9000000.50');
    });

    it('menerima gaji dalam format rupiah dengan titik ribuan', function () {
        $response = $this->post(route('karyawan.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Akuntan',
            'gaji' => '9.000.000,50',
        ]);

        $response->assertRedirect(route('karyawan.index'));
        expect(Karyawan::firstOrFail()->gaji)->toBe('9000000.50');
    });

    it('menerima gaji dalam format rupiah tanpa desimal', function () {
        $response = $this->post(route('karyawan.store'), [
            'nama' => 'Budi Santoso',
            'jabatan' => 'Akuntan',
            'gaji' => '8.500.000',
        ]);

        $response->assertRedirect(route('karyawan.index'));
        expect(Karyawan::firstOrFail()->gaji)->toBe('8500000.00');
    });
});

describe('edit', function () {
    it('merender halaman edit dengan data terisi', function () {
        $karyawan = Karyawan::factory()->create();

        $this->get(route('karyawan.edit', $karyawan))
            ->assertOk()
            ->assertSee($karyawan->nama);
    });
});

describe('update', function () {
    it('memperbarui data karyawan', function () {
        $karyawan = Karyawan::factory()->create();

        $response = $this->put(route('karyawan.update', $karyawan), [
            'nama' => 'Siti Aminah',
            'jabatan' => 'Supervisor',
            'gaji' => 7500000,
        ]);

        $karyawan->refresh();

        $response->assertRedirect(route('karyawan.index'));
        expect($karyawan->nama)->toBe('Siti Aminah')
            ->and($karyawan->jabatan)->toBe('Supervisor')
            ->and($karyawan->gaji)->toBe('7500000.00');
    });

    it('menolak kiriman kosong tanpa mengubah data', function () {
        $karyawan = Karyawan::factory()->create([
            'nama' => 'Budi Santoso',
            'jabatan' => 'Akuntan',
            'gaji' => 5000000,
        ]);

        $this->put(route('karyawan.update', $karyawan), [])
            ->assertSessionHasErrors(['nama', 'jabatan', 'gaji']);

        $karyawan->refresh();
        expect($karyawan->nama)->toBe('Budi Santoso')
            ->and($karyawan->gaji)->toBe('5000000.00');
    });
});

describe('destroy', function () {
    it('menghapus data karyawan', function () {
        $karyawan = Karyawan::factory()->create();

        $response = $this->delete(route('karyawan.destroy', $karyawan));

        $response->assertRedirect(route('karyawan.index'));
        expect(Karyawan::count())->toBe(0);
        expect(Karyawan::find($karyawan->id))->toBeNull();
    });
});
