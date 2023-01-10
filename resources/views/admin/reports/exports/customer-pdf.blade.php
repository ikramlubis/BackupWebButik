<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<title>Laporan</title>
		<style type="text/css">
			table {
				width: 100%;
			}

			table tr td,
			table tr th {
				font-size: 10pt;
				text-align: left;
			}

			table tr:nth-child(even) {
				background-color: #f2f2f2;
			}

			table th, td {
  				border-bottom: 1px solid #ddd;
			}

			table th {
				border-top: 1px solid #ddd;
				height: 40px;
			}

			table td {
				height: 25px;
			}
		</style>
	</head>
  	<body>
		<h2>Laporan Customer</h2>
		<hr>

        <table>
            <thead>

                <th> No </th>
                <th> Username </th>
                <th> E-mail </th>
                <th> Total Pesanan </th>
                <th> Pembelian </th>
                <th> Level Customer </th>

            </thead>
            <tbody>
            @foreach ($customer as $row )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->Total_Pesanan}}</td>
                <td>{{ 'Rp'.($row->Pembelian ?: '0')}}</td>
                <td>{{ $row->Level_Customer}}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
 	</body>
</html>
