<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageToSend extends Model
{
    use HasFactory;

    protected $fillable = [
        'client',
        'email',
        'item'
    ];
}
