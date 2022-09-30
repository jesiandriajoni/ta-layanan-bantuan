@extends('layouts.master')
@section('title', 'Form Karyawan')
@section('content')
@section('navbar-judul', 'Karyawan')

<div class="container-fluid py-4">


    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <h5 class="text-center" style="margin-top: 20px"><b>EDIT KARYAWAN</b></h5>
                <form method="POST" action="/admin/karyawan/{{ $karyawans->id }}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid py-4">

                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12">Foto</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12">Nama</label>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="nama_karyawan" class="form-control"
                                                placeholder="Nama Karyawan" aria-label="Username"
                                                aria-describedby="basic-addon1"
                                                value="{{ old('nama_karyawan') ?? $karyawans->nama_karyawan }}">

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12">No Telpn</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="notelp" class="form-control" placeholder="No Telpn"
                                            aria-label="Username" aria-describedby="basic-addon1"
                                            value="{{ old('notelp') ?? $karyawans->notelp }}"onkeypress="return onlyNumberKey(event)">
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-form-label text-md-right col-12">Nama Divisi</label>
                                    <div class="col-sm-12">
                                        <select name="id_divisi" id="" class="form-control">
                                            @foreach ($divisi as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nama_divisi'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Simpan Data" data-container="body"
                            data-animation="true">Simpan</button>
                        <a href="/admin/karyawan" type="reset" class="btn bg-gradient-danger btn-tooltip"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Batal" data-container="body"
                            data-animation="true">Batal</a>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
{{-- untuk menambahkan kodingan apabila menginputkan nomor telepon
tidak bisa diinputkan huruf --}}
@push('script')
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
@endpush
