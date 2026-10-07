<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KaryawanController extends Controller
{
    private const RULES = [
        'nama' => ['required', 'string', 'max:255'],
        'jabatan' => ['required', 'string', 'max:255'],
        'gaji' => ['required', 'numeric', 'min:0'],
    ];

    public function index(): View
    {
        $karyawan = Karyawan::orderBy('id')->get();

        return view('karyawan.index', compact('karyawan'));
    }

    public function create(): View
    {
        return view('karyawan.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Karyawan::create($this->validatedData($request));

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function edit(Karyawan $karyawan): View
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan): RedirectResponse
    {
        $karyawan->update($this->validatedData($request));

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Karyawan $karyawan): RedirectResponse
    {
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        $request->merge([
            'gaji' => str_replace(['.', ','], ['', '.'], (string) $request->input('gaji')),
        ]);

        return $request->validate(self::RULES);
    }
}
