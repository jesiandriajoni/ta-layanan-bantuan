@extends('layouts.master')
@section('title', 'Form User')
@section('content')
@section('navbar-judul','User')

<section class="section">


    <form method="POST" action="/admin/user/store" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="text-center" style="margin-top: 20px">FORM USER</h5>

                        @csrf
                        <div class="container-fluid py-4">

                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="Nama" aria-label="Username"
                                                aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Username</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username"
                                                aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Username"
                                                aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Level</label>
                                        <div class="col-sm-12">
                                            <select name="id_divisi" class="form-control">
                                                @forelse ($levels as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['level_id'] }}
                                                        {{ $item['name'] }}</option>

                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Username"
                                                aria-describedby="basic-addon1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan Data" data-container="body" data-animation="true">Simpan</button>
                            <a href="/admin/user" type="reset" class="btn bg-gradient-danger btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal" data-container="body" data-animation="true" >Batal</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        {{-- BATAS --}}


    </div>


</form>

</section>
@endsection
