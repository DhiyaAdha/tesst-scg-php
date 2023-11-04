@extends('layouts.dashboard.index')

@section('title', ' My Detail Item')

@section('content')
    <div class="col-6">
        <form method="POST" action="{{ route('item.update', ['id' => $item->id]) }}">
            @csrf
            <div class="mb-3">
                <label for="inputName" class="form-label">Product Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                    value="{{ $item->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputDesc" class="form-label">Description</label>
                <textarea class="form-control @error('desc') is-invalid @enderror" id="inputDesc" name="desc">{{ $item->desc }}</textarea>
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('desc')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Unit Price</label>
                <input type="text" class="form-control @error('unit_price') is-invalid @enderror" id="inputunit_price"
                    name="unit_price" value="{{ $item->unit_price }}">
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('unit_price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputContact" class="form-label">Quantity Item</label>
                <input type="text" class="form-control @error('qty_items') is-invalid @enderror" id="inputqty_items"
                    name="qty_items" value="{{ $item->qty_items }}">
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('qty_items')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputStatus" class="form-label">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" id="inputStatus" name="status"
                    aria-label="Default select example">
                    <option selected disabled>Choose Item Status</option>
                    <option value="ada" {{ $item->status === 'ada' ? 'selected' : '' }}>Available</option>
                    <option value="habis" {{ $item->status === 'habis' ? 'selected' : '' }}>Out of Stock</option>
                </select>
                <!-- Menambahkan atribut 'required' untuk validasi -->
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <button type="submit" class="btn btn-primary">Update</button>
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
