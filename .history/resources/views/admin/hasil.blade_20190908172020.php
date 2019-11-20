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

    <div class="col-md-8">
      <div class="card mx-auto mt-5">
          <div class="card-header">Tambah Kaidah Kategori</div>
          <div class="card-body">
              @csrf
              <form action="" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="text">Pilih Kategori 1:</label>
                    <select class="form-control" name="id_tanda" id="dropdown">
                        <option value="">Pilih Tanda DO:</option>
                        {{-- @foreach ($tanda as $tnd) --}}
                        <option value=""></option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                  <div class="form-group">
                      <label for="text">Pilih Tanda DO:</label>
                      <select class="form-control" name="id_tanda" id="dropdown">
                          <option value="">Pilih Tanda DO:</option>
                          {{-- @foreach ($tanda as $tnd) --}}
                          <option value=""></option>
                          {{-- @endforeach --}}
                      </select>
                  </div>
                  <a href="" class="btn btn-primary">Hitung</a>
              </form>
          </div>
      </div>
  </div>

</div>
@endsection

@push('scripts')

@endpush
