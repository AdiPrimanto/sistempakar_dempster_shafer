@extends('layouts.app')

@section('title','Kinerja Akademik Dosen')

@push('css')

@endpush

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>

    <div class="col-md-12">
        <div class="card mx-auto mt-12">
            <div class="card-header">
                Tanda - tanda
            </div>
            <div class="card-body">
                <div class="form-group">
                    @foreach ($bobot as $bbt)
                    <label style="display:block">
                        <input type="checkbox" id="box_tanda" name="tanda" value="{{$bbt->id_tanda}}">&nbsp;
                        {{$bbt->nama_tanda}}
                    </label>
                    @endforeach
                </div>
                <button id="hitung" class="btn btn-primary" onclick="hitung()" style="float:right">Hitung</button>
            </div>
        </div>
    </div>

    <br />
</div>

<script>
    var list_data = [];
    var list_hitung = [];
    var checked = $('.form-group #box_tanda');

    checked.change(function () {
        $("#hitung").prop('disabled', checked.filter(':checked').length == 0);
    });

    checked.change();

    function hitung() {

        var list_checked = [];
        var dict_checked = [];
        $("input:checkbox[name=tanda]:checked").each(
            function () {
                var id_tanda = $(this).val();
                var nama_tanda = $(this)[0].nextSibling.nodeValue;
                list_checked.push(id_tanda);
            }
        );

        dict_checked['data'] = list_checked;

        $.ajax({
            url: "/hasil/hitung",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: dict_checked,
            success: function (response) {
                nilai = JSON.parse(response);
                nilai = nilai['data'];
                setData(nilai);
            },
            error: function (response) {
                console.log(response);
            }

        });

    }

    function setData(data) {

        for (var index = 0; index < data.length; index++) {
            var dict_data = {};
            tanda = data[index]['nama_tanda'];
            belief = data[index]['bobot_tanda']
            plausibility = 1 - data[index]['bobot_tanda'];
            gejala_list = data[index]['kategori'];
            gejala = [];

            for (var row = 0; row < gejala_list.length; row++) {
                gejala.push(gejala_list[row]['kode_kategori']);
            }

            dict_data['nama_tanda'] = tanda;
            dict_data['belief'] = belief;
            dict_data['plausibility'] = plausibility;
            dict_data['gejala'] = gejala;

            list_data.push(dict_data);
        }

        console.log(list_data);
    }

    // function proses(start, temp_data){

    //     var temp_data = temp_data;
    //     for(var index=start; index<list_data.length; index++){

    //         if(temp_data.length < 2 ){

    //             temp_data.push(list_data[index]);

    //         }

    //         else{

    //             if (start == 0){
    //                 var list_densita = [];
    //                 var dict_gejala_1 = {};
    //                 var dict_gejala_2 = {};

    //                 var belief_1        = temp_data[0]['belief'];
    //                 var plausibility_1  = temp_data[0]['plausibility'];
    //                 var kategori_1      = temp_data[0]['gejala_array'];

    //                 var belief_2       = temp_data[1]['belief'];
    //                 var plausibility_2 = temp_data[1]['plausibility'];
    //                 var kategori_2     = temp_data[1]['gejala_array'];


    //                 m3_belief_1_belief_2             =  belief_1 * belief_1;
    //                 m3_belief_1_plausibility_2       =  belief_1 * plausibility_2;
    //                 m3_belief_2_plausibility_1       =  belief_2 * plausibility_1;
    //                 m3_plausibility_1_plausibility_2 =  plausibility_1 * plausibility_2;

    //                 dict_gejala_1['densitas'] = "m1";
    //                 dict_gejala_1['kategori'] = [kategori_1.join(),"{θ}"];
    //                 dict_gejala_1['nilai'] = [belief_1,plausibility_1];
    //                 dict_gejala_1['hasil']    = [belief_1, plausibility_1];
    //                 dict_gejala_1['evidental']    = [False,False,False];

    //                 dict_gejala_2['densitas'] = "m2";
    //                 dict_gejala_2['kategori'] = [kategori_2.join(),"{θ}"];
    //                 dict_gejala_2['nilai']    = [belief_2,plausibility_2];
    //                 dict_gejala_2['hasil']    = [belief_2, plausibility_2];
    //                 dict_gejala_2['evidental']    = [False,False,False];

    //                 var evidential_conflict = containsAny(kategori_1,kategori_2)

    //                 console.log(evidential_conflict);

    //                 if (evidential_conflict){
    //                     evidental = m3_belief_1_belief_2; 
    //                     m3_m1 =  m3_belief_1_plausibility_2 / (1-evidental);
    //                     m3_m2 =  m3_belief_2_plausibility_1 / (1-evidental);

    //                 }
    //                 else{
    //                     evidental = 0;
    //                     m3_m1 =  m3_belief_1_plausibility_2 / (1-evidental);
    //                     m3_m2 =  m3_belief_2_plausibility_1 / (1-evidental);

    //                 }

    //                 m3_m0  =  1 - (m3_m1 + m3_m2);



    //                 dict_gejala_3['densitas'] = "m3";
    //                 dict_gejala_3['kategori'] = [kategori_1.join(),kategori_2.join(),"{θ}"];
    //                 dict_gejala_3['nilai']    = [m3_m1,m3_m2,m3_m0];
    //                 dict_gejala_3['hasil']    = [m3_m1,m3_m2,m3_m0];
    //                 dict_gejala_3['evidental']    = [evidental,evidental,evidental];



    //                 list_densitas.push(dict_gejala_1);
    //                 list_densitas.push(dict_gejala_2);

    //                 start = start + 1;

    //                 return proses(start,);

    //             }

    //             else{

    //             }


    //         }

    //     }

    // }

    function containsAny(source, target) {
        var result = source.filter(function (item) {
            return target.indexOf(item) > -1
        });
        return (result.length > 0);
    }

</script>

@endsection

@push('scripts')

@endpush
