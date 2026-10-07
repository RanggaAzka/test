<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" value="{{ old('nama', $karyawan?->nama) }}" required>
    @error('nama')
        <span class="error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="jabatan">Jabatan</label>
    <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan', $karyawan?->jabatan) }}" required>
    @error('jabatan')
        <span class="error">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="gaji">Gaji</label>
    <input type="text" id="gaji" name="gaji" inputmode="decimal" autocomplete="off"
        value="{{ old('gaji', $karyawan ? number_format((float) $karyawan->gaji, fmod((float) $karyawan->gaji, 1) ? 2 : 0, ',', '.') : null) }}"
        placeholder="Contoh: 8.500.000" oninput="window.formatRupiah(this)">
    @error('gaji')
        <span class="error">{{ $message }}</span>
    @enderror
</div>

@push('scripts')
    <script>
        window.formatRupiah = function (el) {
            let v = el.value.replace(/[^\d,]/g, '');
            let i = v.indexOf(',');
            let int = i >= 0 ? v.slice(0, i) : v;
            let dec = i >= 0 ? v.slice(i + 1).replace(/\D/g, '') : '';
            if (dec.length > 2) {
                dec = dec.slice(0, 2);
            }
            int = int === '' ? '' : Number(int).toLocaleString('id-ID');
            el.value = dec ? int + ',' + dec : int;
        };
    </script>
@endpush