@extends('layouts.dashboard.index')

@section('title', ' My Data User')
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
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Contact</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Contact</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Hamdan</td>
                            <td>Admin</td>
                            <td>0877***</td>
                            
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Hamdan</td>
                            <td>Suplier</td>
                            <td>0877***</td>
                            
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Hamdan</td>
                            <td>Customer</td>
                            <td>0877***</td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- /.container-fluid -->
