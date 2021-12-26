<html>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }

    .identitas {
        font-size: x-small;
        font-weight: bold;
    }

    .table {
        font-size: 12px;
    }

    .header {
        font-size: 25px;
    }

    /*tr td{*/
    /*    padding: 0 !important;*/
    /*    margin: 0 !important;*/
    /*}*/
</style>

</html>

<body>
    <div class="container">
        <div class="row">
            <div class="col col-md-12 text-center">
                <p class="header">Timesheet Field Staff</p>
            </div>
        </div>

        <div class="row">
            <div class="col col-md-12">
                <table>
                    <tr>
                        <td class="identitas">Nama</td>
                        <td class="identitas"> : </td>
                        <td class="identitas">Siapa</td>
                    </tr>
                    <tr>
                        <td class="identitas">Periode</td>
                        <td class="identitas"> : </td>
                        <td class="identitas">{{$awal == $akhir ? date('F Y',strtotime($awal)) : date('F Y',strtotime($awal)) ." - ". date('F Y',strtotime($akhir))}} </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="row">
            <div class="col col-md-12">
                <table class="table table-striped">
                    <thead class="bg-primary text-light">
                        <tr>
                            <td width="25%">Periode</td>
                            <td width="30%">Lokasi</td>
                            <td width="45%">Rencana Tindak Lanjut</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alldata->Rencana as $data)
                        <tr>
                            <td>{{date('F Y',strtotime($data->periode))}}</td>
                            <td>{{$data->lokasi}}</td>
                            <td>{{$data->tindak_lanjut}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>