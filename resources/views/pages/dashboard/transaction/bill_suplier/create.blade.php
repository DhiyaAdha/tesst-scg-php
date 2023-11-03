@extends('layouts.dashboard.index')

@section('title', 'Transaction Supplier')

@section('content')
    <div class="col-6">
        <form method="POST" action="{{ route('transaction.suplier') }}">
            @csrf

            <div class="form-group">
                <label for="inputSupplier" class="form-label">Nama Supplier</label>
                <select class="form-control @error('supplier_id') is-invalid @enderror" id="inputSupplier" name="supplier_id"
                    aria-label="Default select example">
                    <option selected disabled>Pilih Nama Supplier</option>
                    @foreach ($suppliers as $k)
                        <option value="{{ $k->supplier->id }}" {{ old('supplier_id') == $k->supplier->id ? 'selected' : '' }}>
                            {{ $k->supplier->name }}
                        </option>
                    @endforeach
                </select>


                @error('supplier_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputItem" class="form-label">Nama Item</label>
                <select class="form-control @error('item_id') is-invalid @enderror" id="inputItem" name="item_id"
                    aria-label="Default select example">
                    <option selected disabled>Pilih Nama Item</option>
                    @foreach ($suppliers as $p)
                        <option value="{{ $p->item->id }}" {{ old('item_id') == $p->id ? 'selected' : '' }}>
                            {{ $p->item->name }}
                        </option>
                    @endforeach
                </select>

                @error('item_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inputQtyReceived" class="form-label">Quantity Received</label>
                <input type="number" class="form-control @error('qty_received') is-invalid @enderror" id="inputQtyReceived"
                    name="qty_received" value="{{ old('qty_received') }}">

                @error('qty_received')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <script>
        // Menggunakan JavaScript untuk validasi angka pada input
        const inputUnitPrice = document.getElementById('inputunit_price');
        const inputQtyItems = document.getElementById('inputqty_items');

        inputUnitPrice.addEventListener('keypress', function(e) {
            const charCode = e.which ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                e.preventDefault();
            }
        });

        inputQtyItems.addEventListener('keypress', function(e) {
            const charCode = e.which ? e.which : e.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                e.preventDefault();
            }
        });
    </script>
@endsection
