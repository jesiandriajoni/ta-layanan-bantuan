@extends('layouts.master')
@section('title', 'Form Pelanggan')
@section('content')
@section('navbar-judul', 'Pelanggan')

    <section class="section">


        <form method="POST" action="/pelanggan/pelanggan/store">
            @csrf
            <div class="container-fluid py-4">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h5 class="text-center" style="margin-top: 20px">FORM PELANGGAN</h5>
                            <form method="POST" action="/pelanggan/pelanggan/store" enctype="multipart/form-data">
                                @csrf
                                <div class="container-fluid py-4">

                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Nama Pelanggan</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="nama_instansi" class="form-control"
                                                        placeholder="Nama Instansi" aria-label="Username"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Kontak</label>
                                                <div class="col-sm-12">
                                                    <input type="telp" name="kontak" class="form-control"
                                                        placeholder="Kontak" aria-label="Username"
                                                        aria-describedby="basic-addon1" required
                                                        onkeypress="return onlyNumberKey(event)">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Alamat</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="alamat" class="form-control"
                                                        placeholder="Alamat" aria-label="Username"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <button type="submit" class="btn bg-gradient-success btn-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan Data"
                                        data-container="body" data-animation="true">Simpan</button>
                                    <a href="/pelanggan/pelanggan" type="reset" class="btn bg-gradient-danger btn-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Batal"
                                        data-container="body" data-animation="true">Batal</a>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                {{-- BATAS --}}


            </div>


        </form>

    </section>
@endsection
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
