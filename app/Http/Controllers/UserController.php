<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // dd($users);
        return view('pages.dashboard.user.index', compact('users'));
    }

    public function create_suplier()
    {
        return view('pages.dashboard.user.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'contact' =>
                'required|numeric|digits_between:10,15',
                'role_id' => 'required',
            ],
            [ // Set pesan error jika validasi tidak terpenuhi
                'name.required' => 'Nama mentor tidak boleh kosong',
                'contact.required' => 'No hp tidak boleh kosong',
                'contact.numeric' => 'No hp harus berupa angka',
                'contact.digits_between' => 'No hp minimal 10 dan maksimal 15 angka',
                'email.required' => 'Email tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'role_id.required' => 'Role tidak boleh kosong',
            ]
        );

        // Simpan data ke dalam database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->contact = $request->contact;
        $user->role_id = $request->role_id;
        // dd($user);
        $user->save();
        // Tampilkan Sweet Alert setelah data berhasil ditambahkan
        Alert::success('Success', 'Data berhasil ditambahkan!');

        return redirect()->route('data.user');
    }
}
