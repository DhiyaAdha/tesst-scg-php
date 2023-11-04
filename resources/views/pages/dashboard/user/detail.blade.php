@extends('layouts.dashboard.index')

@section('title', 'My Data Suplier')

@section('content')
    <div class="col-6">
        <form method="POST" action="{{ route('user.update') }}">
            @csrf
             @method('PUT')
            <input type="hidden" name="id" value="{{ $user->id }}"> <!-- Menyimpan ID pengguna yang akan diperbarui -->
            <div class="mb-3">
                <label for="inputName" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name"
                    value="{{ $user->name }}" >
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                    name="email" value="{{ $user->email }}" >
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                    name="password" >
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputContact" class="form-label">Contact</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="inputContact"
                    name="contact" value="{{ $user->contact }}" >
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('contact')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputRole" class="form-label">Role</label>
                <select class="form-control @error('role_id') is-invalid @enderror" id="inputRole" name="role_id"
                    aria-label="Default select example" >
                    <option selected disabled>Pilih Jenis Role</option>
                    <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>Admin</option>
                    <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>Suplier</option>
                    <option value="3" {{ $user->role_id == '3' ? 'selected' : '' }}>Customer</option>
                </select>
                <!-- Menambahkan atribut '' untuk validasi -->
                @error('role_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
