@extends('layouts.dashboard.index')

@section('title', 'Transaction Customer')

@section('content')
    <div class="col-6">

        <form method="POST" action="{{ route('transaction.customer') }}">
            @csrf

            <div class="form-group">
                <label for="inputSupplier" class="form-label">Nama Customer</label>
                <select class="form-control @error('customer_id') is-invalid @enderror" id="inputSupplier" name="customer_id"
                    aria-label="Default select example">
                    <option selected disabled>Pilih Nama Customer</option>
                    @foreach ($out_customer as $k)
                        <option value="{{ $k->customer->id }}"
                            {{ old('customer_id') == $k->customer->id ? 'selected' : '' }}>
                            {{ $k->customer->name }}
                        </option>
                    @endforeach
                </select>

                @error('customer_id')
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
                    @foreach ($out_customer as $p)
                        <option value="{{ $p->item->id }}" {{ old('item_id') == $p->item->id ? 'selected' : '' }}>
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
                <label for="inputQtySold" class="form-label">Quantity Sold</label>
                <input type="number" class="form-control @error('qty_sold') is-invalid @enderror" id="inputQtySold"
                    name="qty_sold" value="{{ old('qty_sold') }}">
                @error('qty_sold')
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
