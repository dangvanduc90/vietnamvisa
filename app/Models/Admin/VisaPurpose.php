<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VisaPurpose extends Model
{
    protected $table = 'visa_purposes';

    protected $fillable = [
        'type'
    ];
}
