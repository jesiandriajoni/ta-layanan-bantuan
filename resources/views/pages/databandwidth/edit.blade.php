@extends('layouts.master')
@section('title', 'Edit Databandwidht')
@section('content')
@section('navbar-judul','Databandwidht')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <h5 class="text-center" style="margin-top: 20px">EDIT BANDWIDTH</h5>
                    <form method="POST" action="/admin/databandwidth/{{ $databandwidth->id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form method="POST" action="/databandwidth/store">

                            <div class="container-fluid py-4">

                                <div class="row justify-content-center">
                                    <div class="col-8">
                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Nama Instansi</label>
                                                <div class="col-sm-12">

                                                    <input class="form-control" type="text" placeholder="Isikan Gangguan"
                                                     value="{{ $databandwidth->pelanggan->nama_instansi }}" readonly>
                                                     //
                                                    <input type="hidden" name="id_data" value="{{ $databandwidth->pelanggan->id }}">
                                                    {{-- <select name="id_data" id="" class="form-control">

                                                        @foreach ($pelanggans as $item)
                                                            <option value="{{ $item['id'] }}">{{ $item['nama_instansi'] }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}


                                                </div>
                                            </div>

                                            <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">Jumlah Pemakaian</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="jumlah" class="form-control"
                                                        placeholder="Jumlah Pemakaian (Mbps)" aria-label="Username"
                                                        aria-describedby="basic-addon1" required value="{{ $databandwidth->jumlah }}">
                                                </div>
                                            </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Simpan Data" data-container="body"
                                    data-animation="true">Simpan</button>
                                <a href="/admin/databandwidth" type="reset" class="btn bg-gradient-danger btn-tooltip"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Batal" data-container="body"
                                    data-animation="true">Batal</a>

                            </div>
                </div>


                </form>
            </div>
        </div>
    </div>


    {{-- BATAS --}}







    </section>
    </div>
@endsection
