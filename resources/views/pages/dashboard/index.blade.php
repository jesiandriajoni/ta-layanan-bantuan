@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Pengaduan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $jumlah_pengaduan }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Pelanggan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $jumlah_pelanggan }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Bandwith</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $jumlah_bandwith }}
                                        <span class="text-success text-sm font-weight-bolder">Mbps</span>

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Teknisi</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $jumlah_teknisi }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">

            {{-- <div class="col-lg-6">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Grafik Data Gangguan </h6>
                        <p class="text-sm">
                            <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                            <span class="font-weight-bold">Pada Tahun</span> {{date('Y')}}
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line" class="chart-canvas" height="600" width="586"
                                style="display: block; box-sizing: border-box; height: 300px; width: 293px;"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-12">
                <div class="card z-index-2">
                    <div class="card-header pb-0">
                        <h6>Grafik Gangguan </h6>
                        <p class="text-sm">
                            <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                            <span class="font-weight-bold">Perbulan</span>
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-line3" class="chart-canvas" height="600" width="586"
                                style="display: block; box-sizing: border-box; height: 300px; width: 293px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
@push('script')
<script>
    //  var ctx2 = document.getElementById("chart-line").getContext("2d");
    var ctx3 = document.getElementById("chart-line3").getContext("2d");

    var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx3.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors


    new Chart(ctx3, {
      type: "line",
      data: {
        //untuk menampilkan grafik
        labels: {!! $label_pengaduanpertahun  !!},
        datasets: [{
            label: "Pengaduan",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            // backgroundColor: gradientStroke1,
            // backgroundColor: gradientStroke2,
            fill: true,
            data: {{ $jumlah_pengaduanpertahun }},
            maxBarThickness: 6

          },
        //   {
        //     label: "Websites",
        //     tension: 0.4,
        //     borderWidth: 0,
        //     pointRadius: 0,
        //     borderColor: "#3A416F",
        //     borderWidth: 3,
        //     backgroundColor: gradientStroke2,
        //     fill: true,
        //     data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
        //     maxBarThickness: 6
        //   },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    </script>


@endpush
