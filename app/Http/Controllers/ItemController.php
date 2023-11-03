<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        // dd($items);

        return view('pages.dashboard.item.index', compact('items'));
    }

    public function create()
    {
        return view('pages.dashboard.item.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required|unique:items', // Pastikan deskripsi unik
            'unit_price' => 'required|numeric',
            'qty_items' => 'required|numeric',
            'status' => 'required|in:ada,habis' // Pastikan status sesuai dengan pilihan yang telah ditentukan
        ], [
            'name.required' => 'Nama barang tidak boleh kosong',
            'desc.required' => 'Deskripsi barang tidak boleh kosong',
            'desc.unique' => 'Deskripsi barang harus unik', // Pesan error untuk deskripsi yang tidak unik
            'unit_price.required' => 'Harga barang tidak boleh kosong',
            'unit_price.numeric' => 'Harga barang harus berupa angka',
            'qty_items.required' => 'Jumlah barang tidak boleh kosong',
            'qty_items.numeric' => 'Jumlah barang harus berupa angka',
            'status.required' => 'Status barang tidak boleh kosong',
            'status.in' => 'Status barang harus ada atau habis' // Pesan error jika status tidak valid
        ]);

        // Simpan data ke dalam database
        $item = new Item();
        $item->name = $request->name;
        $item->desc = $request->desc;
        $item->unit_price = $request->unit_price;
        $item->qty_items = $request->qty_items;
        $item->status = $request->status;
        $item->user_id = 1;
        $item->save();

        // Redirect atau kembali ke halaman yang diinginkan setelah menyimpan data
        return redirect()->route('data.item')->withSuccess('Data berhasil ditambahkan!');
    }
}
