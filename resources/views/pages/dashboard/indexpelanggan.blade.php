@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
@section('navbar-judul', 'Dashboard')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="container-xxl bg-white p-0">
                    <!-- Spinner Start -->

                    <!-- Spinner End -->


                    <!-- Navbar & Hero Start -->
                    <div class="container-xxl position-relative p-0" id="home">
                        <nav
                            class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 sticky-top shadow-sm">
                            <div class="text-center">
                                <a href="" class="navbar-brand p-0">
                                    <center>
                                        <h1>PT. Marawa Transmisi Media</h1>
                                    </center>
                                    <!-- <img src="img/logo.png" alt="Logo"> -->
                                </a>
                            </div>
                            <button class="navbar-toggler rounded-pill" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                        </nav>

                        <div class="container-xxl  hero-header" style="background-color: #d3e2fc">
                            <div class="container">
                                <center><img style="width:300px; height:300%"
                                        src="{{ asset('soft/assets/img/tr.png') }}"></center>
                            </div>
                            <div class="justify-content-center">
                                <center>
                                    <h5>Internet Cepat, Jujur dan Unlimited
                                    </h5>
                                </center>
                                <br>
                                <div>
                                    <h6>PT MARAWA TRANSMISI MEDIA – Perusahaan Indonesia dengan nomor registrasi
                                        53/017363
                                        diterbitkan pada tahun 2019. Alamat terdaftar: Jl. Batang Anai No. 4 A. Nomor
                                        telepon perusahaan: 07518959999</h6>
                                    <h5>Visi</h5>
                                    <p>Menjadi Perusahaan Telekomunikasi dan IT Terpercaya, memiliki Inovasi dan
                                        Integritas
                                    </p>
                                    <h5>Misi</h5>
                                    <p>- Menjalankan kegiatan bisnis sesuai keinginan mitra, secara professional dan
                                        dengan
                                        tetap memperhatikan ketentuan yang berlaku.
                                    </p>
                                    <p>- Mengutamakan pelayanan dan mutu terbaik,serta meningkatkan kepuasan tertinggi
                                        terhadap mitra
                                    </p>
                                    <p>- Membangun serta menciptakan citra terbaik perusahaan.
                                    </p>

                                </div>



                                <div>
                                    <h5>Detail Perusahaan</h5>
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                No SK
                                            </div>
                                            <div class="col-4">
                                                AHU-0018034.AH.01.01.TAHUN 2019
                                            </div>

                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                Tanggal SK:
                                            </div>
                                            <div class="col-4">
                                                05-04-2019
                                            </div>

                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-4">
                                                No Akta:
                                            </div>
                                            <div class="col-4">
                                                151
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="https://iditrix.com/pt-marawa-transmisi-media/467607/" class="btn bg-gradient-warning">Baca Selengkapnya</a>


                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection

    @push('css')
        {{-- <script src="{{ asset('soft/assets/css/dataTables.bootstrap5.min.css') }}"></script> --}}
    @endpush

    @push('script')
        {{-- <script src="{{ asset('soft/assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('soft/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('soft/assets/js/dataTables.bootstrap5.min.js') }}"></script> --}}
        <script src="{{ asset('soft/assets/js/datatables.js') }}"></script>
        <script>
            // $(document).ready(function () {
            //     $('#table').DataTable();
            // });
            const dataTableBasic = new simpleDatatables.DataTable("#table", {
                searchable: true,
                fixedHeight: true
            });

            function hapus(form) {
                Swal.fire({
                    title: 'Yakin Menghapus Data ?',
                    text: "Data Yang Dihapus Tidak Bisa Dipulihkan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
                return false;
            }

            @if (session()->has('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ session('success') }}',
                })
            @endif
        </script>
    @endpush
