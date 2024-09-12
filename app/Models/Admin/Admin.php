<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'admin'; // Specify the table name if different

    protected $fillable = [
        'uuid',        // If you're using UUIDs
        'name',
        'phone',
        'username',
        'password',
        'raw_password', // Add this if you need to store the unencrypted password
    ];

    protected $hidden = [
        'password',
        'raw_password', // Hide sensitive information
    ];

    // Optionally, you can define relationships and other model methods here
}