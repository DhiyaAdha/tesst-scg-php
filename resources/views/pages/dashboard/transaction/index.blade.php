@extends('layouts.dashboard.index')

@section('title', ' My Report Transaction')
<!-- Begin Page Content -->
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="{{ url('https://datatables.net') }}">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Inbound</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Suplier</th>
                            <th>Nama Item</th>
                            <th>Jumlah Item</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Suplier</th>
                            <th>Nama Item</th>
                            <th>Jumlah Item</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($inbounds as $key => $inbound)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $inbound->supplier->name }}</td>
                                <td>{{ $inbound->item->name }}</td>
                                <td>{{ $inbound->qty_received }}</td>
                                <td>{{ $inbound->user_recap->name }}</td>
                                <td>{{ $inbound->inbound_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi Outbound</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Nama Item</th>
                            <th>Jumlah Terjual</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Nama Item</th>
                            <th>Jumlah Terjual</th>
                            <th>Nama Petugas</th>
                            <th>Tanggal</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($outbounds as $key => $outbound)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $outbound->customer->name }}</td>
                                <td>{{ $outbound->item->name }}</td>
                                <td>{{ $outbound->qty_sold }}</td>
                                <td>{{ $outbound->user_recap->name }}</td>
                                <td>{{ $outbound->outbound_date }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
@endsection
<!-- /.container-fluid -->
