@extends('layouts.master')
@section('title', 'Data Pengaduan')
@section('content')
@section('navbar-judul', 'Pengaduan')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <h5 class="text-center" style="margin-top: 20px"><b>FORM PENGADUAN</b></h5>
                <form method="POST" action="/admin/pengaduan/{{ $pengaduans->id }}/update" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid py-4">


                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Gangguan</label>
                                        <input class="form-control" type="text" placeholder="Isikan Gangguan"
                                            name="pengaduan" value="{{ $pengaduans->pengaduan }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Pelanggan</label>

                                        <input class="form-control" type="text" placeholder="Isikan Gangguan"
                                        name="kode_pelanggan" value="{{ $pengaduans->pelanggan->kode_pelanggan }}" readonly>

                                        {{-- <select name="id_pelanggan" id="" class="form-control">
                                            @foreach ($pelanggan as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['kode_pelanggan'] }}
                                                </option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Mulai Gangguan</label>
                                        <input class="form-control" type="datetime-local" value="{{ date('Y-m-d H:i:s') }}"
                                            id="example-datetime-local-input" name="timestart"
                                            value="{{ $pengaduans->timestart }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Masukan Foto</label>
                                        <div class="input-group ">
                                            @if ($pengaduans['foto'] != null)
                                                <img width="100px" height="120px"
                                                    src="{{ asset('storage/pengaduan/' . $pengaduans['foto']) }}">
                                            @endif
                                            <input type="file" name="foto" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="keterangan">{{ $pengaduans->keterangan }}</textarea>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Selesai Gangguan</label>
                                        <input class="form-control" type="datetime-local" value=""
                                            id="example-datetime-local-input" name="timesend">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                        <label for="input" class="form-control-label">Status</label>
                                        <div class="d-flex">
                                            <div class="form-check col-md-3">

                                                <input class="form-check-input" type="radio" name="status"
                                                    value="waiting" id="customRadio1">
                                                <label class="custom-control-label" for="customRadio1">waiting</label>

                                            </div>
                                            <div class="form-check col-md-3">

                                                <input class="form-check-input" type="radio" name="status"
                                                    value="doing" id="customRadio1">
                                                <label class="custom-control-label" for="customRadio1">doing</label>

                                            </div>

                                            <div class="form-check col-md-3">

                                                <input class="form-check-input" type="radio" name="status"
                                                    value="done" id="customRadio1">
                                                <label class="custom-control-label" for="customRadio1">done</label>

                                            </div>
                                        </div>

                                    </div> --}}
                            {{-- </div> --}}


                            <div class="card-footer text-center">
                                <button type="submit" class="btn bg-gradient-success btn-tooltip"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan Data"
                                    data-container="body" data-animation="true">Simpan</button>
                                <a href="/admin/pengaduan" type="reset" class="btn bg-gradient-danger btn-tooltip"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Batal"
                                    data-container="body" data-animation="true">Batal</a>

                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
</div>



@endsection
