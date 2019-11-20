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
                <div class="form-group">
                    <label for="text">Pilih Tanda 1:</label>
                    <select class="form-control" name="id_tanda" id="dropdown1" onchange="setDropdown2(this.value)">
                        <option value="">Pilih Tanda:</option>
                        @foreach ($bobot as $bbt)
                        <option value="{{$bbt->bobot}}">{{$bbt->nama_tanda}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="text">Pilih Tanda 2:</label>
                    <select class="form-control" name="id_tanda" id="dropdown2" onchange="setDropdown1(this.value)">
                        <option value="">Pilih Tanda:</option>
                        @foreach ($bobot as $bbt)
                        <option value="{{$bbt->bobot}}">{{$bbt->nama_tanda}}</option>
                        @endforeach
                    </select>
                </div>
                <button id="hitung" class="btn btn-primary" onclick="hitung()">Hitung</button>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card mx-auto mt-3">
            <div class="card-header">Hasil Dempster Shafer</div>
            <div class="card-body">
                <div>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <table class="table table-bordered">
                        <tbody id="table_dumpsuffer" style="display:none">
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="text-align:center">{PT, PS, PR}</td>
                                <td id="bbt_op2"></td>
                                <td style="text-align:center">0</td>
                                <td id="m2_op2"></td>
                            </tr>
                            <tr>
                                <td>{PT, PS, PR}</td>
                                <td id="bbt_op1"></td>
                                <td>{PT, PS, PR}</td>
                                <td id="bbt_op1_x_bbt_op2"></td>
                                <td>{PT, PS, PR}</td>
                                <td id="bbt_op1_x_m2_op2"></td>
                            </tr>
                            <tr>
                                <td>0</td>
                                <td id="m1_op1"></td>
                                <td>{PT, PS, PR}</td>
                                <td id="m1_op1_x_bbt_op2"></td>
                                <td>0</td>
                                <td id="m1_op1_x_m2_op2"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>

<script type="text/javascript">
    function setDropdown2(value) {
        var op2 = document.getElementById("dropdown2").getElementsByTagName("option");
        for (var i = 0; i < op2.length; i++) {
            (op2[i].value == value) ?
            op2[i].disabled = true: op2[i].disabled = false;
        }
    }

    function setDropdown1(value) {
        var op1 = document.getElementById("dropdown1").getElementsByTagName("option");
        for (var i = 0; i < op1.length; i++) {
            (op1[i].value == value) ?
            op1[i].disabled = true: op1[i].disabled = false;
        }
    }

    function hitung() {
        bbt_op1 = document.getElementById("dropdown1").value;
        bbt_op2 = document.getElementById("dropdown2").value;
        m1_op1 = 1 - bbt_op1
        m2_op2 = 1 - bbt_op2

        bbt_op1_x_bbt_op2 = bbt_op1 * bbt_op2
        bbt_op1_x_m2_op2 = bbt_op1 * m2_op2

        m1_op1_x_bbt_op2 = m1_op1 * bbt_op2
        m1_op1_x_m2_op2 = m1_op1 * m2_op2

        table = document.getElementById("table_dumpsuffer").style.display = "block";


        document.getElementById("bbt_op2").innerHTML = bbt_op2
        document.getElementById("m2_op2").innerHTML = m2_op2
        document.getElementById("bbt_op1").innerHTML = bbt_op1
        document.getElementById("bbt_op1_x_bbt_op2").innerHTML = bbt_op1_x_bbt_op2
        document.getElementById("bbt_op1_x_m2_op2").innerHTML = bbt_op1_x_m2_op2
        document.getElementById("m1_op1").innerHTML = m1_op1
        document.getElementById("m1_op1_x_bbt_op2").innerHTML = m1_op1_x_bbt_op2
        document.getElementById("m1_op1_x_m2_op2").innerHTML = m1_op1_x_m2_op2

    }

</script>

@endsection

@push('scripts')

@endpush
