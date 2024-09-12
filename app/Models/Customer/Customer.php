<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable; // Import Authenticatable trait
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract; // Import interface
use Illuminate\Support\Facades\Hash;

class Customer extends Model implements AuthenticatableContract
{
    use HasFactory, Notifiable, Authenticatable; // Tambahkan Authenticatable

    protected $table = 'customers'; // Specify the table name if different

    protected $fillable = [
        'uuid',        // If you're using UUIDs
        'name',
        'phone',
        'email',
        'username',
        'password',
        'raw_password', // Optional: store unencrypted password if needed
    ];

    protected $hidden = [
        'password',
        'raw_password', // Hide sensitive information
    ];

    // Disable timestamps if not using created_at and updated_at
    public $timestamps = false;

    // Mutator for encrypting password
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}