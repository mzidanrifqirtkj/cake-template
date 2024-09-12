<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Merchant extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'merchants'; // Specify the table name if different

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
