<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Report</title>

</head>
<body>
    <div class="text-center">
        <h5>Laporan Report Civitas</h5>
        <h6>PEM</h6>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Isi Laporan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $k => $v)
                <tr>
                    <td>{{ $k += 1}}</td>
                    <td>{{ $v->report_date->format('d-M-Y')}}</td>
                    <td>{{ $v->report_desc }}</td>
                    <td>{{ $v->status == '0' ? 'pending' : ucwords($v->status)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>