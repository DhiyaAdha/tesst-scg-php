<?php

namespace App\Models;

use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OutboundTransaction extends Model
{
    protected $table = 'outbound_transactions';

    protected $fillable = [
        'item_id',
        'outbound_date',
        'qty_sold',
        'customer_id',
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

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
