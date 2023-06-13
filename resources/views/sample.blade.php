<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            word-break: break-word;
            padding: 2rem;
            font-size: 0.6rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-header {
            text-align: center;
        }

        .table-header,
        .table-data {
            padding: 0.25rem;
            border: 1px solid black;
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div>
        <h1 id="title" style="text-align: center; font-weight: bold; margin-bottom: 1rem">
            SENSUS HARIAN RAWAT INAP
        </h1>
    </div>

    <table class="table">
        <thead>
            <tr style="vertical-align: middle">
                <th rowspan="2" class="table-header">No.</th>
                <th rowspan="2" class="table-header">Tgl. MRS</th>
                <th rowspan="2" class="table-header">Nama Pasien</th>
                <th colspan="2" class="table-header">Umur</th>
                <th rowspan="2" class="table-header">No. RM</th>
                <th colspan="3" class="table-header">Cara Datang</th>
                <th rowspan="2" class="table-header">Alamat</th>
                <th rowspan="2" class="table-header">Diagnosa MRS</th>
                <th rowspan="2" class="table-header">Diagnosa KRS</th>
                <th rowspan="2" class="table-header">Tgl. KRS</th>
                <th rowspan="2" align="center" class="table-header">HP</th>
                <th rowspan="2" align="center" class="table-header">KRS</th>
                <th rowspan="2" align="center" class="table-header">APS</th>
                <th rowspan="2" align="center" class="table-header">M</th>
                <th rowspan="2" align="center" class="table-header">Rjk</th>
                <th rowspan="2" align="center" class="table-header">Pdh</th>
                <th rowspan="2" class="table-header">Cara Bayar</th>
                <th rowspan="2" class="table-header">DPJP</th>
            </tr>
            <tr>
                <th ref="Umur" align="center" class="table-header">L</th>
                <th ref="Umur" align="center" class="table-header">P</th>
                <th ref="Cara Datang" align="center" class="table-header">IGD</th>
                <th ref="Cara Datang" align="center" class="table-header">Poli</th>
                <th ref="Cara Datang" align="center" class="table-header">Pndhn.</th>
            </tr>
        </thead>
    </table>
</body>

</html>
