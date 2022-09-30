@extends('layouts.master')
@section('title', 'Data Pengaduan')
@section('content')
@section('navbar-judul','Pengaduan')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if ($errors->any())
                        {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                    @endif
                    <h5 class="text-center" style="margin-top: 20px"><b>FORM PENGADUAN</b></h5>
                    <form method="POST" action="/pelanggan/pengaduan/store" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid py-4">


                            <form>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="input" class="form-control-label">Gangguan</label>
                                            <input class="form-control" type="text" placeholder="Isikan Gangguan" name="pengaduan">
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
                                            <label for="input" class="form-control-label">Mulai Gangguan</label>
                                            <input class="form-control" type="datetime-local" value="{{ date('Y-m-d H:i:s') }}"
                                                id="example-datetime-local-input" name="timestart">
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


                                    {{-- <div class="col-md-6">
                                        <label for="input" class="form-control-label">Status</label>
                                       <div class="d-flex">
                                        <div class="form-check col-md-3">

                                            <input class="form-check-input" type="radio" name="status" value="waiting"
                                                id="customRadio1">
                                            <label class="custom-control-label" for="customRadio1">waiting</label>

                                        </div>
                                        <div class="form-check col-md-3">

                                            <input class="form-check-input" type="radio" name="status" value="doing"
                                                id="customRadio1">
                                            <label class="custom-control-label" for="customRadio1">doing</label>

                                        </div>

                                        <div class="form-check col-md-3">

                                            <input class="form-check-input" type="radio" name="status" value="done"
                                                id="customRadio1">
                                            <label class="custom-control-label" for="customRadio1">done</label>

                                        </div>
                                       </div>

                                    </div> --}}
                                </div>


                                <div class="card-footer text-center">
                                    <button type="submit" class="btn bg-gradient-success btn-tooltip"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan Data"
                                        data-container="body" data-animation="true">Simpan</button>
                                    <a href="/pelanggan/pengaduan" type="reset" class="btn bg-gradient-danger btn-tooltip"
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
    $(".e2").select2({
        placeholder: "Select a State",
        allowClear: true
    });
</script>


@endpush
