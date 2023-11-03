<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InboundTransaction;
use App\Models\OutboundTransaction;

class TransactionController extends Controller
{
    public function index()
    {
        $inbounds = InboundTransaction::all();
        // dd($inbounds);

        $outbounds = OutboundTransaction::all();

        return view('pages.dashboard.transaction.index', compact('inbounds', 'outbounds'));
    }

    public function create_inbound()
    {
        $suppliers = InboundTransaction::all();
        // dd($inboundTransaction);

        return view('pages.dashboard.transaction.bill_suplier.create', compact('suppliers'));
    }

    public function store_bill_suplier(Request $request)
    {
        $validatedData = $request->validate([
            'qty_received' => 'required|integer',
            'item_id' => 'required|exists:items,id',
            'supplier_id' => 'nullable|exists:users,id',
            'customer_id' => 'nullable|exists:users,id',
        ]);

        $inboundTransaction = new InboundTransaction();
        $inboundTransaction->inbound_date = $request->inbound_date ?? now();
        $inboundTransaction->qty_received = $request->qty_received;
        $inboundTransaction->item_id = $request->item_id;
        $inboundTransaction->user_id = 1; // Ambil ID user yang melakukan aksi

        if ($request->filled('supplier_id')) {
            $inboundTransaction->supplier_id = $request->supplier_id;
        }

        $inboundTransaction->save();

        return redirect()->route('dashboard.transaction')->withSuccess('Inbound transaction created successfully!');
    }

    public function create_outbound()
    {
        $out_customer = OutboundTransaction::all();
        // dd($out_customer);

        return view('pages.dashboard.transaction.bill_customer.create', compact('out_customer'));
    }

    public function store_bill_customer(Request $request)
    {
        $validatedData = $request->validate([
            'qty_sold' => 'required|integer',
            'item_id' => 'required|exists:items,id',
            'customer_id' => 'nullable|exists:users,id',
        ]);

        $outboundTransaction = new OutboundTransaction();
        $outboundTransaction->outbound_date = now(); // Tambahkan logic tanggal di sini sesuai kebutuhan Anda.
        $outboundTransaction->qty_sold = $request->qty_sold;
        $outboundTransaction->item_id = $request->item_id;
        $outboundTransaction->user_id = 1; // Ambil ID user yang melakukan aksi

        if ($request->filled('customer_id')) {
            $outboundTransaction->customer_id = $request->customer_id;
        }

        $outboundTransaction->save();

        return redirect()->route('dashboard.transaction')->withSuccess('Outbound transaction created successfully!');
    }





}
