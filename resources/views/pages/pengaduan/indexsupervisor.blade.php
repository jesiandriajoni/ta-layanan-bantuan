@extends('layouts.master')
@section('title', 'Data Pengaduan')
@section('content')
@section('navbar-judul', 'Pengaduan')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="text-center" style="margin-top: 20px"><b>DATA PENGADUAN</b></h5>
                <div class="card-header ml-5 float-right" style="margin-top: 50px">
                    

                    <form action="/supervisor/cetakpengaduan" class="row">
                        <div class="form-group col-auto" style=" width:160px">
                            <label for="example-date-input" class="form-control-label">Dari Tanggal</label>
                            <input class="form-control" type="date" value="" id="example-date-input"
                                name="mulai">
                        </div>
                        <div class="form-group col-auto" style=" width:160px">
                            <label for="example-date-input" class="form-control-label">Sampai Tanggal</label>
                            <input class="form-control" type="date" value="" id="example-date-input"
                                name="sampai">
                        </div>
                        <div class="col-auto form-group">
                            <button type="submit" style="margin-top:2rem" class="btn btn-warning" target="_blank"><i
                                    class="fas fa-print" style="color:#ffa500)"></i> </button>
                        </div>
                    </form>
                    <div class="float-right d-flex justify-content-end">
                        <a href="/supervisor/pengaduan?status=waiting" class="btn bg-gradient-danger "
                            style="margin-right:4px">Menunggu</a>
                        <a href="/supervisor/pengaduan?status=doing"
                            class="btn bg-gradient-info mr-2"style="margin-right:4px">Dikerjakan</a>
                        <a href="/supervisor/pengaduan?status=done"
                            class="btn bg-gradient-success"style="margin-right:4px">Selesai</a>
                        <a href="/supervisor/pengaduan" All class="btn bg-gradient-secondary">Semua</a>
                    </div>
                </div>
                <div class="table-responsive" style="margin-top: -40px">
                    <table id="table" class="table align-items-center">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Foto
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Kode Pelanggan
                                </th>

                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Pelapor
                                </th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email
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
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Status
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $item)
                                <tr>
                                    <td>
                                        @if ($item['foto'] != null)
                                            <img width="100px" height="120px"
                                                src="{{ asset('storage/pengaduan/' . $item['foto']) }}">
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->pelanggan->kode_pelanggan }}
                                    </td>
                                    <td>
                                        {{ date('d-m-Y',strtotime($item['tanggal'])) }}
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


                                    <td class="align-middle text-center text-sm">
                                        @if ($item['status'] == 'waiting')
                                            <span class="badge badge-sm bg-gradient-danger"> Menunggu </span>
                                        @elseif ($item['status'] == 'doing')
                                            <span class="badge badge-sm bg-gradient-info"> Dikerjakan </span>
                                        @else
                                            <span class="badge badge-sm bg-gradient-success">Selesai </span>
                                        @endif

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
