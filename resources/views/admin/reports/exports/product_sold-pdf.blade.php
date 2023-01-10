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
		<h2>Laporan Barang Terjual</h2>
		<hr>
		<p>Periode : {{ $startDate }} - {{ $endDate }}</p>

        <table>
            <thead>
                <th> Tanggal </th>
                <th> List Barang Terjual </th>
                <th> Harga barang </th>
            </thead>
            <tbody>
                <?php $checker = '' ?>
                <?php $total = 0 ?>
            @foreach ($product_sold_export as $row )
            <?php if($row->TANGGAL != $checker and $checker != '')
            { echo '<tr>
                <td></td>
                <td></td>
                <td><strong>'.'Rp'.$total.'</strong></td>
                </tr>'.'<tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';
                $total = 0; } ?>
            <tr>
                <td><strong>{{ $checker!=$row->TANGGAL ? $row->TANGGAL : '' }}</strong></td>
                <td>{{ $row->LIST_TERJUAL }}</td>
                <?php $total = $total + $row->HARGA ?>
                <td>{{ 'Rp'.$row->HARGA }}</td>
                <?php $checker = $row->TANGGAL ?>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td><strong>{{'Rp'.$total}}</strong></td>
            </tr>
        </tbody>
        </table>
 	</body>
</html>
