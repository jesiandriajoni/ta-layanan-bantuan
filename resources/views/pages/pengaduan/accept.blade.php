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
                <h5 class="text-center" style="margin-top: 20px"><b>FORM PEMILIHAN TEKNISI</b></h5>
                <form method="POST" action="/admin/pengaduan/{{ $pengaduans->id }}/accept" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="container-fluid py-4">


                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="input" class="form-control-label">Teknisi</label>
                                    <select name="id_teknisi" id="" class="form-control">
                                        @foreach ($teknisi as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['nama_teknisi'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
