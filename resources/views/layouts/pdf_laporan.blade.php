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

        .page_break {
            page-break-before: always;
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
        <tbody class="baris">
            @foreach($alldata->Report as $data)
            <tr class="isi">
                <td style="vertical-align:middle">{{date('d F Y',strtotime($data->tanggal_laporan))}}</td>
                <td style="vertical-align:middle">{{$data->kegiatan}}</td>
                <td style="vertical-align:middle">{{$data->keterangan}}</td>
                <td>
                    @foreach($data->Participant as $peserta)
                    <p>{{$loop->iteration}}. {{$peserta->nama_peserta}}</p>
                    @endforeach
                </td>

                @if(empty($data->foto))
                <td style="vertical-align:middle" class="foto">Tidak ada Foto diupload</td>
                @else
                <td class="foto"><img src="{{URL::asset('/images/laporan/')}}/{{$data->foto}}" class="imgLaporan3"></td>
                @endif

            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="page_break"></div>
    <p style="font-size:small"><strong>Tantangan dan Permasalahan</strong></p>
    <table width="100%" class="tab">
        <thead class="blue">
            <tr>
                <th width="5%">No</th>
                <th width="48%">Kendala</th>
                <th width="47%">Solusi</th>
            </tr>
        </thead>
        <tbody class="baris">
            @foreach($alldata->Report as $data)
            @if(!empty($data->keluhan))
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->keluhan}}</td>
                <td>{{empty($data->saran) ? '-' : $data->saran}}</td>
            </tr>
            @endif
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