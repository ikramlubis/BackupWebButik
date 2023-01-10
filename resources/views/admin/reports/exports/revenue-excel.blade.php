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
				<td>{{ $revenue->date, 'd M Y' }}</td>
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
			<td>{{ $totalOrders }}</td>
			<td>{{ $totalGrossRevenue }}</td>
			<td>{{ $totalTaxesAmount }}</td>
			<td>{{ $totalShippingAmount }}</td>
			<td>{{ $totalNetRevenue }}</td>
		</tr>
	</tbody>
</table>

<table>
    <thead>
        <tr>
        <th>ID</th>
        <th>Barang</th>
        <th>Harga</th>
        <th>Terjual</th>
        </tr>
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
        <tr>
        <th> Total Barang Terjual </th>
        <th> Total Penjualan </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan2 as $lapor2 )
        <tr>
            <td>{{ $lapor2->Barang_Terjual }}</td>
            <td>{{ $lapor2->Total_Penghasilan }}</td>
        </tr>
        @endforeach
</tbody>
</table>

<table>
    <thead>
        <tr>
        <th> Id </th>
        <th> Nama Produk </th>
        <th> Stok </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($laporan3 as $lapor3 )
        <tr>
            <td>{{ $lapor3->id }}</td>
            <td>{{ $lapor3->name }}</td>
            <td>{{ $lapor3->quantity }}</td>
        </tr>
        @endforeach
</tbody>
</table>
