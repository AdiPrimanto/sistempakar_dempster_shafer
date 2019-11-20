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
        &nbsp;
    </div>

    <div class="col-md-12">
        <div class="card mx-auto mt-12" id="group-1" style="display:none">
            <div class="card-header">
                Densitas Awal
            </div>
            <table class="table table-bordered" width="100%" cellspacing="0" id="densitas-awal">
                <thead>
                    <tr>
                        <th style="text-align:center">No</th>
                        <th style="text-align:center">Tanda</th>
                        <th style="text-align:center">Kategori</th>
                        <th style="text-align:center">Belief</th>
                        <th style="text-align:center">Plausibility</th>
                    </tr>
                </thead>
            </table>
        </div>
        <br />

        <div class="card mx-auto mt-12" id="group-3" style="display:none">
            <div class="card-header">
                Kesimpulan
            </div>
            <div id="kesimpulan">

            </div>
        </div>

        <div class="card mx-auto mt-12" id="group-2" style="display:none">
            <div class="card-header">
                Perhitungan
            </div>

            <div id="perhitungan-table"></div>

        </div>
    </div>

    <br />
</div>

<script>
    var list_data = []; //menampilkan data plausibility
    var list_hitung = [];
    var list_table_hitung = [];
    var table = []; //menampilkan data kombinasi
    var hasil_fix = [];
    var checked = $('.form-group #box_tanda');

    checked.change(function () {
        $("#hitung").prop('disabled', checked.filter(':checked').length == 0);
    });

    checked.change();

    function hitung() {

        var list_checked = [];
        var dict_checked = {};
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

        list_data = [];
        list_hitung = [];
        list_table_hitung = [];
        table = [];
        hasil_fix = [];

        for (var index = 0; index < data.length; index++) {
            var dict_data = {};
            var dict_data_table_hitung = {};
            tanda = data[index]['nama_tanda'];
            belief = data[index]['bobot_tanda']
            plausibility = 1 - data[index]['bobot_tanda'];
            plausibility = Math.round(plausibility * 10) / 10;
            gejala_list = data[index]['kategori'];
            gejala = [];
            nilai = [];

            for (var row = 0; row < gejala_list.length; row++) {
                gejala.push(gejala_list[row]['kode_kategori']);
            }

            dict_data['nama_tanda'] = tanda;
            dict_data['belief'] = belief;
            dict_data['plausibility'] = plausibility;
            dict_data['gejala'] = gejala;

            nilai.push(belief);
            nilai.push(plausibility);

            var gej_string = gejala.join(',');
            var gej_array = [];
            gej_array.push(gej_string);
            gej_array.push('θ');

            dict_data_table_hitung['nama_tanda'] = tanda;
            dict_data_table_hitung['gejala'] = gej_array;
            dict_data_table_hitung['nilai'] = nilai;

            list_data.push(dict_data);
            list_table_hitung.push(dict_data_table_hitung);
        }

        proses();

        console.log(hasil_fix);
        if (list_data.length == 1) {
            $('#hasil-akhir').remove();
            $('#group-1').css('display', 'none');
            $('#group-2').css('display', 'none');
            nilai = list_data[0]['belief'] * 100;
            nilai = ((nilai * 10) / 10).toFixed(0)
            hasil = `<b id='hasil-akhir'> Hasil Akhir ${nilai} %</b>`
            $('#kesimpulan').append(hasil);
            $('#group-3').css('display', 'block');
        }
        // console.log(list_data);
        // console.log(table);
        else {
            $('#group-3').css('display', 'none');
            $('.table-1-row').remove();
            var content = '';
            for (var index = 0; index < list_data.length; index++) {
                content += '<tr class="table-1-row">';
                content += '<td style="text-align:center">' + index + '</td>';
                content += '<td>' + list_data[index]['nama_tanda'] + '</td>';
                content += '<td style="text-align:center">' + list_data[index]['gejala'].join() + '</td>';
                content += '<td style="text-align:center">' + list_data[index]['belief'] + '</td>';
                content += '<td style="text-align:center">' + list_data[index]['plausibility'] + '</td>';
                content += '</tr>';
            }

            $('#densitas-awal').append(content);
            $('#group-1').css('display', 'block');

            $('.mytable').remove();
            content_table = '';
            for (var index_1 = 0; index_1 < table.length; index_1++) {

                content_table +=
                    `<label class= "mytable"><b>&nbsp &nbsp Perhitungan ke - ${index_1}</b></label> <table class="table table-bordered mytable" width="100%" cellspacing="0" id="densitas-awal" >`;
                for (var index_2 = 0; index_2 < table[index_1].length; index_2++) {
                    content_table += `<tr>`;
                    content_table += `<td style="text-align:center"> ${table[index_1][index_2][0]} </td>`;
                    content_table += `<td style="text-align:center"> ${table[index_1][index_2][1]} </td>`;
                    content_table += `<td style="text-align:center"> ${table[index_1][index_2][2]} </td>`;
                    content_table += `</tr>`;

                }
                content_table += '</table>';
            }


            $('#perhitungan-table').append(content_table);
            $('#group-2').css('display', 'block');
        }
    }

    function proses(mulai = 0, densitas = 1, list_hasil = []) {

        list_hasil = list_hasil;
        densitas = densitas;
        mulai = mulai;

        if (list_data.length == 1) {

            probabilitas = list_data[0]['belief'];

        } else {

            for (var start = mulai; start <= list_data.length; start++) {

                if (list_hasil.length < 2) {
                    list_hasil.push(list_table_hitung[start]);
                } else {
                    densitas = densitas + 2;
                    next = start;
                    hasil = subproses(list_hasil, densitas);
                    return proses(next, densitas, hasil);
                }

            }

        }

    }

    function subproses(data, densitas) {

        var list_rows = [];
        var columns_first = [];
        columns_first.push('');

        for (var gej = 0; gej < data[1]['gejala'].length; gej++) {
            columns_first.push(`${data[1]['gejala'][gej]} | ${data[1]['nilai'][gej]}`);
        };

        list_rows.push(columns_first);

        y = densitas - 2;
        x = densitas - 1;

        var status_evelidiance = false;
        var list_validiance = [];
        var validiance = 0;

        var dict_hasil = {}

        for (var index_a = 0; index_a < data[0]['nilai'].length; index_a++) {
            var temp_status_evelidiance = false;
            var list_columns = [];
            list_columns.push(`${data[0]['gejala'][index_a]} | ${data[0]['nilai'][index_a]}`);

            for (var index_b = 0; index_b < data[1]['nilai'].length; index_b++) {

                contains = data[0]['gejala'][index_a].includes(data[1]['gejala'][index_b])
                if (contains) {
                    if (data[0]['gejala'][index_a] == 'θ' && data[1]['gejala'][index_b] == 'θ') {
                        label = 'θ';
                    } else {
                        label_1 = data[0]['gejala'][index_a].length;
                        label_2 = data[1]['gejala'][index_b].length;
                        if (label_1 > label_2) {
                            label = data[1]['gejala'][index_b];
                        } else {
                            label = data[0]['gejala'][index_a];
                        }
                    }
                } else {
                    label_1 = data[0]['gejala'][index_a];
                    label_2 = data[1]['gejala'][index_b];

                    if (label_1 == 'θ') {
                        label = label_2;
                    } else if (label_2 == 'θ') {
                        label = label_1;
                    } else {
                        label = 'θ';
                        validiance = validiance + (data[0]['nilai'][index_a] * data[1]['nilai'][index_b])
                        list_validiance.push(data[0]['nilai'][index_a] * data[1]['nilai'][index_b]);
                        temp_status_evelidiance = true;
                        status_evelidiance = temp_status_evelidiance;

                    }
                }

                hasil = data[0]['nilai'][index_a] * data[1]['nilai'][index_b];
                hasil = ((hasil * 10) / 10).toFixed(10);
                status = !(`${label}` in dict_hasil)

                if (status) {
                    dict_hasil[`${label}`] = hasil;
                } else {
                    dict_hasil[`${label}`] = dict_hasil[`${label}`] + hasil;
                }

                list_columns.push(`${label} | ${hasil}`);

            }

            list_rows.push(list_columns);

        }

        table.push(list_rows);

        gejala_densitas_baru = Object.keys(dict_hasil);
        nilai_densitas_baru = [];

        gejala_densitas_baru.forEach(function (item) {
            nilai_densitas_baru.push((dict_hasil[item] / (1 - validiance.toFixed(10)).toFixed(10)).toFixed(10));

        });

        result = {};
        result['nama_tanda'] = `densitas ${densitas}`;
        result['gejala'] = gejala_densitas_baru;
        result['nilai'] = nilai_densitas_baru;

        var mylist = []

        mylist.push(result);

        hasil_fix.push(result)
        return mylist;

    }

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
