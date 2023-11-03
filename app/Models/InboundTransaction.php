<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InboundTransaction extends Model
{
    protected $table = 'inbound_transactions';

    protected $fillable = [
        'item_id',
        'inbound_date',
        'qty_received',
        'supplier_id',
        'user_id'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function user_recap()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(User::class, 'supplier_id', 'id');
    }
}
