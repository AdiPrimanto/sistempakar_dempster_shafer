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

    <div class="col-md-4">
      <div class="card mx-auto mt-3">
          <div class="card-header">Hitung Dempster Shafer</div>
          <div class="card-body">
              @csrf
              <form action="" method="post">
                  @csrf
                  <div class="form-group">
                    <label for="text">Pilih Tanda 1:</label>
                    <select class="form-control" name="id_tanda" id="dropdown">
                        <option value="">Pilih Tanda:</option>
                        {{-- @foreach ($tanda as $tnd) --}}
                        <option value=""></option>
                        {{-- @endforeach --}}
                    </select>
                </div>
                  <div class="form-group">
                      <label for="text">Pilih Tanda 2:</label>
                      <select class="form-control" name="id_tanda" id="dropdown">
                          <option value="">Pilih Tanda:</option>
                          @foreach ($bobot as $bbt)
                          <option value="{{$bbt->id_bobot}}">{{$bbt->nama_kategori}}</option>
                          @endforeach
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
