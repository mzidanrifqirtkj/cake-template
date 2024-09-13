<?php

namespace App\Models\Merchant;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Merchant extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable, Authenticatable;
    protected $table = 'merchants'; // Specify the table name if different

    protected $fillable = [
        'uuid',        // If you're using UUIDs
        'email',
        'username',
        'password',
        'raw_password', // Add this if you need to store the unencrypted password
    ];

    protected $hidden = [
        'password',
        'raw_password', // Hide sensitive information
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
