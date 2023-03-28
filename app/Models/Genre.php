<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Testing\Fluent\Concerns\Has;

class Genre extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        "name",
        "description",
    ];


    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
