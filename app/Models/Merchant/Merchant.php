<?php

namespace App\Models\Merchant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Merchant extends Model
{
    use HasFactory, Notifiable;
    protected $guard = 'merchant';
}
