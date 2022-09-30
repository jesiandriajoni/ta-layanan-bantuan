<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT. Marawa Transmisi Media</title>
    
    <style type="text/css">
        html {
            overflow: scroll;
            overflow-x: hidden;
        }
        
        .d-flex{
            display: flex;
        }
        
        .justify-content-between{
            justify-content: space-between;
        }
        
        ::-webkit-scrollbar {
            width: 0;
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
        }
        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #f7b6b6;
        }
        table {
            page-break-inside: auto;
        }

        tr {
            page-break-inside: avoid;
            page-break-after: auto;
        }

        thead {
            display: table-header-group;
        }

        tfoot {
            display: table-footer-group;
        }

        @media print {
            .pageBreak {
                page-break-after: always;
            }
        }

        /* @page {
            margin: 0;
        } */
    </style>
</head>

<body>
    <div>
        <div class="media" style="margin-top:20px">
            <div class="media-left d-flex justify-content-between">
                
                <img alt="image" src="{{ asset('soft/assets/img/transnet.png') }}" width="180" height="130"
                    height="70" style="margin-left: 20px">



                <div class="media-body d-flex justify-content-between" style="text-align:right">

                    <div style="margin-right:25px">
                        <h2 class="text-right">PT. Marawa Transmisi Media</h2>
                        <h4 class="text-right"> Jl. Batang Anai No. 4 A</h4>
                        <h4 class="text-right"> Notelp 07518959999 Website WWW.transnetsumbar.id</h4>
                    </div>

                </div>
            </div>
        </div>
        <div
            style=" height: 10px background-color:#000000 border-width: 5px; margin-top: 20px; margin-right:30px; border-top: 5px solid #000;">
        </div>
        <div style="text-center">
            <div style="margin-top:50px">
                <center >
                    <h1>Laporan Gangguan Jaringan</h1>
                </center>
            </div>

            <div class="table-responsive" style="margin-top: 10px">
                <table border="1" class="table text-center table-bordered"style="margin-top:20px;">
                    <thead>
                        <tr>

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Pelapor
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Pengaduan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Keterangan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Teknisi
                            </th>

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Mulai Gangguan
                            </th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                Selesai Gangguan
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($pengaduans as $item)
                            <tr>

                                <td>
                                    {{ $item['tanggal'] }}
                                </td>
                                <td>
                                    {{-- memanggil relasi --}}
                                    {{ $item->pelanggan->nama_instansi }}
                                </td>
                                <td>
                                    {{ $item->pelanggan->email }}
                                </td>
                                <td>
                                    {{-- error --}}
                                    {{ $item['pengaduan'] }}
                                </td>
                                <td>
                                    {{-- error --}}
                                    {{ $item['keterangan'] }}
                                </td>
                                <td>
                                    {{-- error --}}
                                    {{ $item->teknisi->nama_teknisi ?? 'Teknisi Belum Dipilih' }}
                                </td>

                                <td>
                                    {{-- error --}}
                                    {{ $item['timestart'] }}
                                </td>
                                <td>
                                    {{-- error --}}
                                    {{ $item['timesend'] }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="row" style="margin-top:3px">
                    <p style="text-indent: 950px; ">Direktur</p>
                    <p style="text-indent: 940px; ">(___________)</p>
                </div>


            </div>
            <script type="text/javascript">
                window.print();
            </script>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
