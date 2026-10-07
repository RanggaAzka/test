@extends('karyawan.layout')

@section('title', 'Daftar Karyawan')

@section('content')
    <div class="toolbar">
        <div>
            <h1>Daftar Karyawan</h1>

        </div>
        <a class="btn btn-primary" href="{{ route('karyawan.create') }}">Tambah Karyawan</a>
    </div>

    @if (session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th style="text-align: right;">Gaji</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyawan as $k)
                    <tr @class(['highlight' => $k->gaji > 5000000])>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->jabatan }}</td>
                        <td class="gaji">Rp&nbsp;{{ number_format((float) $k->gaji, fmod((float) $k->gaji, 1) ? 2 : 0, ',', '.') }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-secondary" href="{{ route('karyawan.edit', $k) }}">Edit</a>
                                <form action="{{ route('karyawan.destroy', $k) }}" method="POST"
                                    onsubmit="return confirm('Hapus data ' + {{ Js::from($k->nama) }} + '?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada data karyawan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <p class="legend"><span></span> Gaji di atas Rp 5.000.000</p>
@endsection