

  	<!-- Facebook and Twitter integration -->
      <meta property="og:title" content=""/>
      <meta property="og:image" content=""/>
      <meta property="og:url" content=""/>
      <meta property="og:site_name" content=""/>
      <meta property="og:description" content=""/>
      <meta name="twitter:title" content="" />
      <meta name="twitter:image" content="" />
      <meta name="twitter:url" content="" />
      <meta name="twitter:card" content="" />

      <link href="https://fonts.googleapis.com/css?family=Space+Mono" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

      <!-- Animate.css -->
      <link rel="stylesheet" href="css/animate.css">
      <!-- Icomoon Icon Fonts-->
      <link rel="stylesheet" href="css/icomoon.css">
      <!-- Bootstrap  -->
      <link rel="stylesheet" href="css/bootstrap.css">

      <!-- Theme style  -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Modernizr JS -->
      <script src="js/modernizr-2.6.2.min.js"></script>
      <!-- FOR IE9 below -->
      <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
      <![endif]-->

      </head>
      <body>

      <div class="fh5co-loader"></div>

      <div id="page">
      <header id="fh5co-header" class="fh5co-cover js-fullheight" role="banner" style="background-image:{{ asset('soft/assets/img/transnet.png') }}" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
              <div class="row">
                  <div class="col-md-8 col-md-offset-2 text-center">
                      <div class="display-t js-fullheight">
                          <div class="display-tc js-fullheight animate-box" data-animate-effect="fadeIn">
                              <div class="profile-thumb" style="background: {{ asset('soft/assets/img/transnet.png') }}"></div>
                              <h1><span>Hallo {{ $instansi }}</span></h1>
                              <h3><span> Terimakasih Pengaduan Anda Pada {{ $tanggal }} Telah Kami Terima</span></h3>
                              <h3><span>Mohon Tunggu Teknisi Kami "<b>{{ $nama_teknisi }}</b>" Sedang Memperbaiki Keluhan Anda </span></h3>
                              <p>

                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>






