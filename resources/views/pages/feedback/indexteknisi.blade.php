@extends('layouts.master')
@section('title', 'FeedBack')
@section('content')
@section('navbar-judul', 'FeedBack')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="text-center" style="margin-top: 20px"><b>DATA FEEDBACK</b></h5>
                <div class="card-header">
                    {{-- <a href="/admin/teknisi/create" class="btn bg-gradient-primary">Tambah</a> --}}
                </div>
                <div class="table-responsive" style="margin-top: -40px">
                    <table id="table" class="table align-items-center">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Tanggal
                                </th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nama Teknisi
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Pelapor
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Nilai
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Komentar
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rattings as $item)
                                <tr>
                                    <td>
                                        {{-- code dibawah berfungsi untuk memanggil relasi di tabel teknisi --}}
                                        {{ $item['created_at'] }}
                                    </td>
                                    <td>
                                        {{-- code dibawah berfungsi untuk memanggil relasi di tabel teknisi --}}
                                        {{ $item->teknisi->nama_teknisi ?? '' }}
                                    </td>
                                    {{-- code dibawah berfungsi untuk memanggil relasi di tabel pelanggan --}}
                                    <td>
                                        {{ $item->pengaduan->pelanggan->nama_instansi ??''}}
                                    </td>
                                    <td>
                                        {{ $item['nilai'] }}
                                    </td>
                                    <td>
                                        {{ $item['deskripsi'] }}
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
