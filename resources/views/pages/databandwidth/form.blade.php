@extends('layouts.master')
@section('title', 'Form Divisi')
@section('content')
@section('navbar-judul','Divisi')

    <section class="section">


        <form method="POST" action="/admin/databandwidth/store" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid py-4">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if ($errors->any())
                                {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                            @endif
                            <h5 class="text-center" style="margin-top: 20px"><b>FORM BANDWIDTH</b></h5>


                                @csrf
                                <div class="container-fluid py-4">

                                    <div class="row justify-content-center">
                                        <div class="col-8">
                                            {{-- <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">ID Divisi</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="id_divisi" class="form-control"
                                                        placeholder="ID Divisi" aria-label="Username"
                                                        aria-describedby="basic-addon1" required>
                                                </div>
                                            </div> --}}
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Nama Pelanggan</label>
                                                <div class="col-sm-12">
                                                    <select name="id_data" id="bandwidth" class="form-control" placeholer="Pilih pelanggan">

                                                        @foreach ($pelanggans as $item)
                                                            <option value="{{ $item['id'] }}">{{ $item['nama_instansi'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Jumlah Pemakaian</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="jumlah" class="form-control"
                                                        placeholder="Jumlah Pemakaian (Mbps)" aria-label="Username"
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
                                    <a href="/admin/databandwidth" type="reset" class="btn bg-gradient-danger btn-tooltip"
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
    NiceSelect.bind(document.getElementById("bandwidth"), {
        searchable: true
    });
</script>
@endpush
