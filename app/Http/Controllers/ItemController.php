<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function detail($id)
    {
        $item = Item::find($id);
        // dd($item);

        // Pastikan item ditemukan sebelum menampilkan detailnya
        if ($item) {
            return view('pages.dashboard.item.detail', compact('item'));
        } else {
            return redirect()->route('data.item')->with('error', 'Item not found');
        }
    }


    public function update(Request $request, $id)
    {
        $item = Item::find($id);

        // Pastikan item ditemukan sebelum mengupdate
        if ($item) {
            $validatedData = $request->validate([
                'name' => 'required',
                'desc' => 'required|unique:items,desc,' . $id,
                'unit_price' => 'required|numeric',
                'qty_items' => 'required|numeric',
                'status' => 'required|in:ada,habis'
            ], [
                'name.required' => 'Nama barang tidak boleh kosong',
                'desc.required' => 'Deskripsi barang tidak boleh kosong',
                'desc.unique' => 'Deskripsi barang harus unik',
                'unit_price.required' => 'Harga barang tidak boleh kosong',
                'unit_price.numeric' => 'Harga barang harus berupa angka',
                'qty_items.required' => 'Jumlah barang tidak boleh kosong',
                'qty_items.numeric' => 'Jumlah barang harus berupa angka',
                'status.required' => 'Status barang tidak boleh kosong',
                'status.in' => 'Status barang harus ada atau habis'
            ]);

            $item->name = $request->name;
            $item->desc = $request->desc;
            $item->unit_price = $request->unit_price;
            $item->qty_items = $request->qty_items;
            $item->status = $request->status;
            $item->user_id = 1; // Misalnya user dengan ID 1 sedang mengelola item ini
            $item->save();

            Alert::success('Success', 'Data berhasil diupdate!')->showConfirmButton('OK', '#3085d6');
            return redirect()->route('data.item', ['id' => $id]);
        } else {
            Alert::error('Error', 'Item not found')->showConfirmButton('OK', '#3085d6');
            return back();
        }
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if ($item) {
            if ($item->canBeDeleted()) {
                // If there are no relations, proceed with the deletion
                $item->delete();
                Alert::success('Success', 'Data berhasil dihapus!')->showConfirmButton('OK', '#3085d6');
                return redirect()->route('data.item');
            } else {
                // If the item has relations, display an alert message
                Alert::error('Error', 'Item memiliki relasi dengan fitur Transaksi')->showConfirmButton('OK', '#3085d6');
                return back();
            }
        } else {
            Alert::error('Error', 'Item not found')->showConfirmButton('OK', '#3085d6');
            return back();
        }
    }

}
