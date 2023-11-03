<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Item;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use App\Models\InboundTransaction;
use App\Models\OutboundTransaction;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    // one to many
    public function status_user()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function entry_item()
    {
        return $this->hasMany(Item::class, 'user_id');
    }

    public function entry_inbound()
    {
        return $this->hasMany(InboundTransaction::class, 'user_id');
    }

    public function entry_outbound()
    {
        return $this->hasMany(OutboundTransaction::class, 'user_id');
    }

    // public function user_supplier()
    // {
    //     return $this->hasMany(User::class, 'supplier_id');
    // }

    // public function user_customer()
    // {
    //     return $this->hasMany(User::class, 'customer_id');
    // }


    
}
