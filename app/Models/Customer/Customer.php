<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory;
    use HasFactory, Notifiable;
    protected $table = 'customers'; // Specify the table name if different

    protected $fillable = [
        'uuid',        // If you're using UUIDs
        'name',
        'phone',
        'email',
        'username',
        'password',
        'raw_password', // Add this if you need to store the unencrypted password
    ];

    protected $hidden = [
        'password',
        'raw_password', // Hide sensitive information
    ];
}
