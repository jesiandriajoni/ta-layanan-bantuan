@extends('layouts.master')
@section('title', 'Edit Divisi')
@section('content')
@section('navbar-judul','Divisi')


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <h5 class="text-center" style="margin-top: 20px">EDIT DIVISI</h5>
                    <form method="POST" action="/admin/divisi/{{ $divisi->id }}/update" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <form method="POST" action="/divisi/store">

                            <div class="container-fluid py-4">

                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        {{-- <div class="form-group row mb-3">
                                                <label class="col-form-label text-md-right col-12">ID Divisi</label>
                                                <div class="col-sm-12">
                                                    <input type="text" name="id_divisi" class="form-control"
                                                        placeholder="ID Divisi" aria-label="Username"
                                                        aria-describedby="basic-addon1" required
                                                        value="{{ old('id_divisi') ?? $divisis->id_divisi }}">
                                                </div>
                                            </div> --}}
                                        <div class="form-group row mb-3">
                                            <label class="col-form-label text-md-right col-12">Nama Divisi</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="nama_divisi" class="form-control"
                                                    placeholder="Nama Divisi" aria-label="Username"
                                                    aria-describedby="basic-addon1" required
                                                    value="{{ old('nama_divisi') ?? $divisi->nama_divisi }}">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label class="col-form-label text-md-right col-12">Jenis Divisi</label>
                                            <div class="col-sm-12">
                                                <select name="jenis_divisi" id="" class="form-control">
                                                    <option value="Teknis" >Teknis</option>
                                                    <option value="Non Teknis">Non Teknis</option>
{{--

                                                    {{-- <select name="id_divisi" id="" class="form-control">
                                                        <option value="">Jadikan Sebagai Parent </option>

                                                        @foreach ($divisis as $item)
                                                            <option value="{{ $item['id'] }}">{{ $item['nama_divisi'] }}  {{ $item->divisi ?  ' - '.$item->divisi->nama_divisi : " "}}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </select>
                                                {{-- <input type="text" name="jenis_divisi" class="form-control"
                                                    placeholder="Nama Divisi" aria-label="Username"
                                                    aria-describedby="basic-addon1" required
                                                    value="{{ old('jenis_divisi') ?? $divisis->jenis_divisi }}"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Simpan Data" data-container="body"
                                    data-animation="true">Simpan</button>
                                <a href="/admin/divisi" type="reset" class="btn bg-gradient-danger btn-tooltip"
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
