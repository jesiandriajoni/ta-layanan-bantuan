@extends('layouts.master')
@section('title', 'Data Pelanggan')
@section('content')
@section('navbar-judul', 'Pelanggan')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="text-center" style="margin-top: 20px"><b>DATA PELANGGAN</b></h5>
                    <div class="card-header">
                        {{-- <a href="/pelanggan/pelanggan/create" class="btn bg-gradient-primary">Tambah</a> --}}
                    </div>
                    <div class="table-responsive" style="margin-top: -40px">
                        <table id="table" class="table align-items-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Kode Pelanggan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pelanggan
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Kontak
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Alamat
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Username
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pelanggans as $item)
                                    <tr>
                                        <td>
                                            {{ $item['kode_pelanggan'] }}
                                        </td>
                                        <td>
                                            {{ $item['nama_instansi'] }}
                                        </td>
                                        <td>
                                            {{ $item['kontak'] }}
                                        </td>
                                        <td>
                                            {{ $item['alamat'] }}
                                        </td>
                                        <td>
                                            {{ $item['username'] }}
                                        </td>
                                        <td>
                                            {{ $item['email'] }}
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex">


                                                <a href="/pelanggan/pelanggan/{{ $item->id }}/edit" class="btn btn-info"
                                                    title="Edit Data">
                                                    <i class="fas fa-edit" style="color:rgb(13, 0, 255)"></i></a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
