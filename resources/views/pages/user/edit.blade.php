@extends('layouts.master')
@section('title', 'Edit User')
@section('content')
@section('navbar-judul','User')

<section class="section">


    <form method="POST" action="/admin/user/{{ $users->id }}/update">
    @csrf
    @method('PUT')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <h5 class="text-center" style="margin-top: 20px">EDIT USER</h5>
                    <form method="POST" action="/user/store" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid py-4">

                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Nama</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="name" class="form-control" placeholder="nama" aria-label="Username"
                                                aria-describedby="basic-addon1" required  value="{{ old('name')?? $users->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Username</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="username" class="form-control" placeholder="Nama Divisi" aria-label="Username"
                                                aria-describedby="basic-addon1" required value="{{ old('username')?? $users->username}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Password</label>
                                        <div class="col-sm-12">
                                            <input type="password" name="password" class="form-control" placeholder="isi jika ganti password" aria-label="Username"
                                                aria-describedby="basic-addon1" required >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="email" class="form-control" placeholder="email" aria-label="Username"
                                                aria-describedby="basic-addon1" required value="{{ old('email')?? $users->email}}">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Level ID</label>
                                        <div class="col-sm-12">
                                            <select class="form-control" name="id_divisi">
                                                @foreach ($levels as $item)

                                                    <option {{ $users->level_id == $item->id ? 'selected' : null }}
                                                        value="{{ $item->id }}">{{ $item->name }}</option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="form-group row mb-3">
                                        <label class="col-form-label text-md-right col-12">Password</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="password" class="form-control" placeholder="password" aria-label="Username"
                                                aria-describedby="basic-addon1" required value="{{ old('password')?? $users->password}}">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn bg-gradient-success btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Simpan Data" data-container="body" data-animation="true">Simpan</button>
                            <a href="/index" type="reset" class="btn bg-gradient-danger btn-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Batal" data-container="body" data-animation="true" >Batal</a>

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
