@extends('layouts.app')

@section('title','Kinerja Akademik Dosen')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>

    <div class="mr-5">
        <h1>DEMPSTER SHAFER</h1>
    </div>
    <div class="col-md-8">
      <div class="card mx-auto mt-5">
          <div class="card-header">Tambah Kaidah Kategori</div>
          <div class="card-body">
              @csrf
              <form action="/tambahbobot/insert" method="post">
                  @csrf
                  <input type="hidden" name="id_kategori" class="form-control"
                      value="{{$kategori[0]->id_kategori}}">
                  <div class="form-group">
                      <label for="text">Nama Kategori DO:</label>
                      <input type="text" name="nama_kategori" class="form-control"
                          value="{{$kategori[0]->nama_kategori}}" readonly autocomplete="off">
                  </div>
                  <div class="form-group">
                      <label for="text">Pilih Tanda DO:</label>
                      <select class="form-control" name="id_tanda" id="dropdown">
                          <option value="">Pilih Tanda DO:</option>
                          @foreach ($tanda as $tnd)
                          <option value="{{$tnd->id_tanda}}">{{$tnd->nama_tanda}}</option>
                          @endforeach
                      </select>
                  </div>
                  <button class="btn btn-info" type="submit">Simpan</button>
                  <a href="/kaidah" class="btn btn-danger">Batal</a>
              </form>
          </div>
      </div>
  </div>

</div>
@endsection

@push('scripts')

@endpush
