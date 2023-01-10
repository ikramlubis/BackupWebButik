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
		<h2>Laporan Stok Produk</h2>
		<hr>

        <table>
            <thead>

                <th> No </th>
                <th> Nama Barang </th>
                <th> Jumlah Barang </th>

            </thead>
            <tbody>
            @foreach ($laporan2 as $row )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <?php if($row->quantity <= 3) {
                    echo "<td style='color: red'>".$row->quantity.'&nbsp; &nbsp; &nbsp; (SEGERA STOK ULANG!)</td>';  }
                    else { echo '<td>'.$row->quantity.'</td>';}
                    ?>
            </tr>
            @endforeach
        </tbody>
        </table>

        <br>
        <br>
        <br>

        <h3>PRODUK BEST SELLER</h3>

            <table>
                <thead>
                    <th> ID </th>
                    <th> Nama </th>
                    <th> Harga </th>
                    <th> Terjual </th>
                </thead>
                <tbody>
                @foreach ($laporan1 as $row )
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->harga}}</td>
                    <td>{{ $row->terjual}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
       </div>
 	</body>
</html>
