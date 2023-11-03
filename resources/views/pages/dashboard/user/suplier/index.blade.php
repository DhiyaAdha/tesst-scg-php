@extends('layouts.dashboard.index')

@section('title', ' My Data Suplier')

@section('content')
    <div class="col-6">
        <form>
    <div class="mb-3">
        <label for="inputName" class="form-label" name="name" >Name</label>
        <input type="text" class="form-control" id="inputName" required>
        <!-- Menambahkan atribut 'required' untuk validasi -->
    </div>
    <div class="mb-3">
        <label for="inputEmail" class="form-label" name="email" >Email address</label>
        <input type="email" class="form-control" id="inputEmail" required>
        <!-- Menambahkan atribut 'required' untuk validasi -->
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label" name="password" >Password</label>
        <input type="password" class="form-control" id="inputPassword" required>
        <!-- Menambahkan atribut 'required' untuk validasi -->
    </div>
    <div class="mb-3">
        <label for="inputContact" class="form-label" name="contact" >Contact</label>
        <input type="text" class="form-control" id="inputContact" required>
        <!-- Menambahkan atribut 'required' untuk validasi -->
    </div>
    <div class="mb-3">
        <label for="inputRole" class="form-label" name="role_id" >Role</label>
        <select class="form-select" id="inputRole" aria-label="Default select example" required>
            <option selected>Pilih Jenis Role</option>
            <option value="1">Admin</option>
            <option value="2">Suplier</option>
            <option value="3">Customer</option>
        </select>
        <!-- Menambahkan atribut 'required' untuk validasi -->
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


    </div>
@endsection
