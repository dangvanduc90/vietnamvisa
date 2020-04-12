<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'phone', 'email', 'title', 'type', 'content', 'status', 'address',
    ];
}
