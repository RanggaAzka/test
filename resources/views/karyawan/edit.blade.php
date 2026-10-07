@extends('karyawan.layout')

@section('title', 'Edit Karyawan')

@section('content')
    <h1>Edit Karyawan</h1>
    <p class="subtitle">Perbarui data {{ $karyawan->nama }}.</p>

    <div class="panel">
        <form action="{{ route('karyawan.update', $karyawan) }}" method="POST">
            @csrf
            @method('PUT')
            @include('karyawan._form', ['karyawan' => $karyawan])

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a class="btn btn-secondary" href="{{ route('karyawan.index') }}">Batal</a>
            </div>
        </form>
    </div>
@endsection