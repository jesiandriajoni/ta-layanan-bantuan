{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="container pb-5">
        <br>
        <center>
            <h1>PT. Marawa Transmisi Media</h1>
        </center>
        @if ($rattings < 1)
            <center>
                <p class="lead">Berikan Penilaian Anda Terhadap Kinerja Teknisi yang Sudah Menangani Gangguan.</p>
            </center>

            <form method="POST" action="/pengaduan/feedback/store" enctype="multipart/form-data">
                @csrf
                <div class="rating">
                </div>
                <input type="hidden" name="id_pengaduan" value="{{ request()->kode }}" id="">

                <div class="p-5 d-flex justify-content-center">
                    <textarea style="width: 50%" class="form-control" name="deskripsi" id="" width="80" cols="10"
                        rows="5" placeholder="Berikan Komentar"></textarea>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mx-auto">Success</button>
                </div>

            </form>
        @else
            <center>
                <h3>Terimakasih Telah Mengisi FeedBack </h3>
                <h5>Semoga layanan yang kami berikan kedepannya dapat menjadi lebih baik lagi </h5>
            </center>
        @endif


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
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
</body>

</html> --}}
