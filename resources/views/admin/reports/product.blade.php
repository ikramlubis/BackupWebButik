@extends('layouts.admin')


@section('content')
	<div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Laporan Produk</h2>
                        </div>
                        <div class="card-body">
                            <form action="" class="mb-5">
                                <div class="row">
                                    {{-- <div class="col-lg-3">
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control datepicker" readonly="" value="{{ !empty(request()->input('start')) ? request()->input('start') : '' }}" name="start" placeholder="from">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <input type="text" class="form-control datepicker" readonly="" value="{{ !empty(request()->input('end')) ? request()->input('end') : '' }}" name="end" placeholder="to">
                                        </div>
                                    </div> --}}

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <select name="export" class="form-control">
                                                <option value="xlsx">excel</option>
                                                <option value="pdf">pdf</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group mx-sm-3 mb-2">
                                            <button type="submit" class="btn btn-primary btn-default">Go</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <h3>Jumlah Produk</h3>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
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
                                        <td>{{ $row->quantity }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                           </div>

                           <br>

                           <h3>Best Sellers</h3>

                           <div class="table-responsive">
                                <table class="table table-bordered table-striped">
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

                           <br>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
<script src="{{ asset('backend/plugins/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
    </script>
@endpush
