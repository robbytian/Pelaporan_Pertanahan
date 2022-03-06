<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rencana Bulanan - {{$alldata->name}}</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        .tab {
            border-collapse: collapse;
            border-spacing: 0;
            border: 1px solid #ddd;
        }

        .tab tr,
        .tab td,
        .tab th {
            font-size: x-small;
            text-align: left;
            padding: 9px;
        }

        tr td {
            font-size: x-small;
        }

        .baris tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .blue {
            background-color: #0275d8;
            color: white;
        }

        .imgLaporan3 {
            object-fit: cover;
            width: 190px;
            height: 100%;
        }

        .foto {
            height: 130px;
        }
    </style>


</head>

<body>
    <h2>
        <center>Timesheet Field Staff</center>
    </h2>
    <table>
        <tr style="font-size:small">
            <td><strong>Nama</strong></td>
            <td> <strong>: </strong></td>
            <td><strong>{{$alldata->name}}</strong></td>
        </tr>
        <tr>
            <td><strong>Periode</strong></td>
            <td><strong> :</strong> </td>
            <td><strong>{{$awal == $akhir ? date('F Y',strtotime($awal)) : date('F Y',strtotime($awal)) ." - ". date('F Y',strtotime($akhir))}}</strong></td>
        </tr>

    </table>

    <br />

    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th>Periode</th>
                <th>Lokasi</th>
                <th>Rencana Tindak Lanjut</th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($alldata->Rencana as $data)
            <tr class="isi">
                <td>{{date('F Y',strtotime($data->periode))}}</td>
                <td>{{$data->lokasi}}</td>
                <td>{{$data->tindak_lanjut}}</td>
            </tr>
            @endforeach

        </tbody>


    </table>
    <br>
    <br>
    <br>
    <table width="100%">
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top" width=80%>Disusun Oleh,</td>
            <td style="text-align:left;vertical-align:top">Diketahui Oleh,</td>
        </tr>
        <tr>
            <td style="text-align:left;vertical-align:top">Tenaga Pendukung Penanganan Akses Reforma</td>
            <td style="text-align:left;vertical-align:top">@if(!empty($alldata->Kantah)) Kasi Penataan dan Pemberdayaan @else Koordinator Pemberdayaan Tanah Masyarakat @endif </td>
        </tr>
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top;padding-top:80px"><b><u>{{$alldata->name}}</b></u></td>
            <td style="text-align:left;vertical-align:top;padding-top:80px"><b><u>@if(!empty($alldata->Kantah)){{$alldata->Kantah->head_name}} @else {{$alldata->Kanwil->head_name}} @endif</b></u></td>
        </tr>
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top">Field Staff</td>
            <td style="text-align:left;vertical-align:top">NIP: {{empty($alldata->Kantah) ? $alldata->Kanwil->nip_head_name : $alldata->Kantah->nip_head_name}}</td>
        </tr>

    </table>
</body>

</html>