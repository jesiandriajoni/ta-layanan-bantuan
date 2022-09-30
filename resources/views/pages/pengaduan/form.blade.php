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
                <form method="POST" action="/admin/pengaduan/store" enctype="multipart/form-data">
                    @csrf
                    <div class="container-fluid py-4">


                        <form>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Gangguan</label>
                                        <input class="form-control" type="text" placeholder="Isikan Gangguan"
                                            name="pengaduan">
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input" class="form-control-label">Tanggal</label>
                                            <input class="form-control" type="date" value="2018-11-23T10:30:00"
                                                id="example-datetime-local-input" name="tanggal">
                                        </div>
                                    </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Pelanggan</label>
                                        <select name="id_pelanggan" id="pelanggan" class="form-control e2" placeholder="--Pilih Pelanggan--">
                                            @foreach ($pelanggan as $item)
                                                <option value="{{ $item['id'] }}">{{ $item['kode_pelanggan'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Mulai Gangguan</label>
                                        <input class="form-control" type="datetime-local"
                                            value="{{ date('Y-m-d H:i:s') }}" id="example-datetime-local-input"
                                            name="timestart">
                                    </div>
                                </div>




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="input" class="form-control-label">Masukan Foto</label>
                                        <div class="input-group ">
                                            <input type="file" name="foto" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input" class="form-control-label">Selesai Gangguan</label>
                                            <input class="form-control" type="datetime-local" value="2018-11-23T10:30:00"
                                                id="example-datetime-local-input" name="timesend">
                                        </div>
                                    </div> --}}
                                <div class="col-md-6">
                                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="keterangan"></textarea>
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
@push('script')
<script>
    NiceSelect.bind(document.getElementById("pelanggan"), {
        searchable: true
    });
</script>
@endpush
