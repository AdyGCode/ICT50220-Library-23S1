<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Language extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'code',
        'description'
    ];
}
