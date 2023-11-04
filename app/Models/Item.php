<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'name',
        'desc',
        'unit_price',
        'qty_items',
        'user_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function inbound_transactions()
    {
        return $this->hasMany(InboundTransaction::class, 'item_id');
    }

    public function outbound_transactions()
    {
        return $this->hasMany(OutboundTransaction::class, 'item_id');
    }

    public function canBeDeleted(): bool
    {
        return $this->inbound_transactions()->count() === 0 && $this->outbound_transactions()->count() === 0;
    }
}
