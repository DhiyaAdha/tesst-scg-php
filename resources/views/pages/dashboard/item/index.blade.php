@extends('layouts.dashboard.index')

@section('title', ' My Report Item')
<!-- Begin Page Content -->
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables Item</h1>
    <p class="mb-4">DataTables menampilkan data data item <a target="_blank"
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
                            <th>Nama Produk</th>
                            <th>Unit Price</th>
                            <th>Qty Item</th>
                            <th>User Input</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Unit Price</th>
                            <th>Qty Item</th>
                            <th>User Input</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->unit_price }}</td>
                                <td>{{ $item->qty_items }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>
                                    @if ($item->status === 'ada')
                                        <span class="badge bg-success text-white">{{ $item->status }}</span>
                                    @else
                                        <span class="badge bg-danger text-white">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                    <a href="{{ route('item.detail', ['id' => $item->id]) }}"
                                        class="btn btn-warning">Edit</a>
                                    <form action="{{ route('item.destroy', ['id' => $item->id]) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete this data?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- /.container-fluid -->
