@extends('karyawan.layout')

@section('title', 'Tambah Karyawan')

@section('content')
    <h1>Tambah Karyawan</h1>
    <p class="subtitle">Isi data karyawan baru.</p>

    <div class="panel">
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            @include('karyawan._form', ['karyawan' => null])

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a class="btn btn-secondary" href="{{ route('karyawan.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection