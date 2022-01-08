<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

        .tab tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .blue {
            background-color: #0275d8;
            color: white;
        }

        .imgLaporan3 {
            object-fit: cover;
            width: 128px;
            height: 100px;
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
            <td><strong>{{$awal == $akhir ? date('d F Y',strtotime($awal)) : date('d F Y',strtotime($awal)) ." - ". date('d F Y',strtotime($akhir))}}</strong></td>
        </tr>

    </table>

    <br />

    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th width="15%">Tanggal Laporan</th>
                <th width="15%">Kegiatan</th>
                <th width="30%">Deskripsi Kegiatan</th>
                <th width="20%">Peserta</th>
                <th width="20%">Foto</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alldata->Report as $data)
            <tr class="isi">
                <td style="vertical-align:middle">{{date('d F Y',strtotime($data->tanggal_laporan))}}</td>
                <td style="vertical-align:middle">{{$data->kegiatan}}</td>
                <td style="vertical-align:middle">{{$data->keterangan}}</td>
                <td style="vertical-align:middle">{{$data->peserta}}</td>
                @if(empty($data->foto))
                <td style="vertical-align:middle">Tidak ada Foto diupload</td>
                @else
                <td style="vertical-align:middle"><img src="{{URL::asset('/images/laporan/')}}/{{$data->foto}}" class="imgLaporan3"></td>
                @endif

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
            <td style="text-align:left;vertical-align:top">Tenaga Ahli Field Staff</td>
            <td style="text-align:left;vertical-align:top">Kasi Pemberdayaan Tanah Masyarakat</td>
        </tr>
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top;padding-top:80px"><b><u>{{$alldata->name}}</b></u></td>
            <td style="text-align:left;vertical-align:top;padding-top:80px"><b>@if(!empty($alldata->Kantah))<u>{{$alldata->Kantah->head_name}}</u>@else - @endif</b></td>
        </tr>
        <tr style="font-size:small">
            <td style="text-align:left;vertical-align:top">Field Staff</td>
            <td style="text-align:left;vertical-align:top">NIP: {{empty($alldata->Kantah) ? '-' : $alldata->Kantah->nip_head_name}}</td>
        </tr>

    </table>
</body>

</html>