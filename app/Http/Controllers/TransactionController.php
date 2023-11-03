<?php

namespace App\Http\Controllers;

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
}
