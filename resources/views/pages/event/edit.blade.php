@extends('layouts.master')
@section('title', 'Form Event')
@section('content')
@section('navbar-judul', 'Edit Event')
<section class="section">
    <form method="POST" action="/admin/event/{{ $event->id }}/update" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <h5 class="text-center" style="margin-top: 20px"><b>EDIT EVENT</b></h5>

                    @csrf
                    @method('PUT')
                    <div class="container-fluid py-4">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group row mb-3">
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Nama Event</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="event" class="form-control"
                                                placeholder="Nama Event" aria-label="Username"
                                                aria-describedby="basic-addon1" required value="{{ old('event') ?? $event->event }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="form-group">
                                            <label for="input" class="form-control-label">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal"
                                            value="{{ old('tanggal') ?? $event->tanggal }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Lokasi</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="alamat" class="form-control"
                                                placeholder="Lokasi" aria-label="Username"
                                                aria-describedby="basic-addon1" required value="{{ old('alamat') ?? $event->alamat }}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                                        <div class="input-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="deskripsi">{{ $event->deskripsi }}</textarea>
                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Simpan Data" data-container="body"
                            data-animation="true">Simpan</button>
                        <a href="/admin/event" type="reset" class="btn bg-gradient-danger btn-tooltip"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Batal" data-container="body"
                            data-animation="true">Batal</a>

                    </div>

                </div>

            </div>



    </form>

</section>
@endsection
