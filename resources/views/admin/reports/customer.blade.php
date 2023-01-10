@extends('layouts.admin')


@section('content')
	<div class="container">
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-default">
                        <div class="card-header card-header-border-bottom">
                            <h2>Laporan Customer</h2>
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
                           <div class="table-responsive">
                                <table class="table table-bordered table-striped">
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
                           </div>
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
