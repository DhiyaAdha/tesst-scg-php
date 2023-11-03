<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public $table = 'role';

    protected $fillable = [
        'name',
    ];

    // one to many
    public function role_user()
    {
        return $this->hasMany(User::class, 'role_id');
    }

    
}
