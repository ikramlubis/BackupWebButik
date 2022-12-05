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
		<h2>Revenue Report</h2>
		<hr>
		<p>Period : {{ $startDate }} - {{ $endDate }}</p>
		<table>
			<thead>
				<tr>
					<th>Date</th>
					<th>Orders</th>
					<th>Gross Revenue</th>
					<th>Taxes</th>
					<th>Shipping</th>
					<th>Net Revenue</th>
				</tr>
			</thead>
			<tbody>
				@php
					$totalOrders = 0;
					$totalGrossRevenue = 0;
					$totalTaxesAmount = 0;
					$totalShippingAmount = 0;
					$totalNetRevenue = 0;
				@endphp
				@foreach ($revenues as $revenue)
					<tr>
						<td>{{ $revenue->date }}</td>
						<td>{{ $revenue->num_of_orders }}</td>
						<td>{{ $revenue->gross_revenue }}</td>
						<td>{{ $revenue->taxes_amount }}</td>
						<td>{{ $revenue->shipping_amount }}</td>
						<td>{{ $revenue->net_revenue }}</td>
					</tr>

					@php
						$totalOrders += $revenue->num_of_orders;
						$totalGrossRevenue += $revenue->gross_revenue;
						$totalTaxesAmount += $revenue->taxes_amount;
						$totalShippingAmount += $revenue->shipping_amount;
						$totalNetRevenue += $revenue->net_revenue;
					@endphp
				@endforeach

				<tr>
					<td>Total</td>
					<td><strong>{{ $totalOrders }}</strong></td>
					<td><strong>{{ $totalGrossRevenue }}</strong></td>
					<td><strong>{{ $totalTaxesAmount }}</strong></td>
					<td><strong>{{ $totalShippingAmount }}</strong></td>
					<td><strong>{{ $totalNetRevenue }}</strong></td>
				</tr>
			</tbody>
		</table>

        <br>

        <h2>Best Sellers</h2>

        <table>
            <thead>
                 <th>ID</th>
                 <th>Barang</th>
                 <th>Harga</th>
                 <th>Terjual</th>
                 </thead>
                 <tbody>
                 @foreach($laporan as $lapor)
                 <tr>
                    <td>{{ $lapor->id }}</td>
                    <td>{{ $lapor->nama }}</td>
                    <td>{{ $lapor->harga }}</td>
                    <td>{{ $lapor->terjual }}</td>
                 </tr>
                 @endforeach
                 </tbody>
        </table>

        <table>
            <thead>
                <th> Total Barang Terjual </th>
                <th> Total Penjualan </th>
            </thead>
            @foreach ($laporan2 as $lapor2 )
                <tr>
                    <td>{{ $lapor2->Barang_Terjual }}</td>
                    <td>{{ $lapor2->Total_Penghasilan }}</td>
                </tr>
            @endforeach
        </table>
 	</body>
</html>
