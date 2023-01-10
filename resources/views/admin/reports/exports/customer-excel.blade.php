<table>
        <thead>
            <tr>
            <th> No </th>
            <th> Username </th>
            <th> E-mail </th>
            <th> Total Pesanan </th>
            <th> Pembelian </th>
            <th> Level Customer </th>
            </tr>
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
