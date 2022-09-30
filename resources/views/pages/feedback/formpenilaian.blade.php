@extends('layouts.master')
@section('title', 'Form Penilaian')
@section('content')
@section('navbar-judul', 'Penilaian')

<div class="container-fluid py-4">


    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                @endif
                <h5 class="text-center" style="margin-top: 20px"><b></b></h5>

                    @csrf
                    @method('PUT')
                    <div class="container-fluid py-4">

                        <div class="container pb-5">
                            <center>
                                <h1>PT. Marawa Transmisi Media</h1>
                            </center>

                            @if (true)
                                <center>
                                    <p class="lead">Berikan Penilaian Anda Terhadap Kinerja Teknisi yang Sudah Menangani Gangguan.</p>
                                </center>
                                @if ($errors->any())
                                    {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                                @endif

                                <form method="POST" action="/pelanggan/penilaian/store" enctype="multipart/form-data">
                                    @csrf
                                    <div class="rating">
                                    </div>
                                    <input type="hidden" name="id_pengaduan" value="{{ request()->id }}" id="">

                                    <div class="p-5 d-flex justify-content-center">
                                        <textarea style="width: 50%" class="form-control" name="deskripsi" id="" width="80" cols="10"
                                            rows="5" placeholder="Berikan Komentar"></textarea>

                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success mx-auto">Kirim</button>
                                    </div>

                                </form>
                            @else
                                <center>
                                    <h3>Terimakasih Telah Mengisi FeedBack </h3>
                                    <h5>Semoga layanan yang kami berikan kedepannya dapat menjadi lebih baik lagi </h5>
                                </center>
                            @endif


                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>

</div>
@endsection
{{-- untuk menambahkan kodingan apabila menginputkan nomor telepon
tidak bisa diinputkan huruf --}}
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
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="{{ asset('soft/ratting/jquery.star-rating.js') }}"></script>
    <script>
        $('.rating').starRating({
            starSize: 1.5,
            showInfo: true,
            inputName: 'nilai',
        });

        $(document).on('change', '.rating',
            function(e, stars, index) {
                alert(`Thx for ${stars} stars!`);
            });
    </script>
@endpush
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

@endpush
