@extends('layouts.master')
@section('title', 'Form Event')
@section('content')
@section('navbar-judul', 'Event')
<section class="section">
    <form method="POST" action="/admin/event/store" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid py-4">
            <div class="row">
                <div class="card">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <h5 class="text-center" style="margin-top: 20px"><b>FORM EVENT</b></h5>

                    @csrf
                    <div class="container-fluid py-4">
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <div class="form-group row mb-3">
                                    {{-- <label class="col-form-label text-md-right col-12">Jenis Pengaduan</label>
                                            <div class="col-sm-12">
                                                <select name="id_jenispengaduan" id="" class="form-control">
                                                    <option value="">Jadikan Sebagai Parent </option>
                                                    @foreach ($jenispengaduans as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['nama_pengaduan'] }}
                                                            {{ $item->jenispengaduan ? ' - ' . $item->jenispengaduan->nama_pengaduan : ' ' }}
                                                        </option>
                                                    @endforeach
                                                </select>


                                            </div> --}}

                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Nama Event</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="event" class="form-control"
                                                placeholder="Nama Event" aria-label="Username"
                                                aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="form-group">
                                            <label class="col-form-label text-md-right col-12">Tanggal</label>
                                            <input class="form-control" type="date" value="2018-11-23T10:30:00"
                                                id="example-datetime-local-input" name="tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Lokasi</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="alamat" class="form-control"
                                                placeholder="Lokasi" aria-label="Username"
                                                aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">

                                        <label for="exampleFormControlTextarea1">Deskripsi</label>
                                        <div class="input-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="deskripsi"></textarea>
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
