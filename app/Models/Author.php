<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;


class Author extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        "given_name",
        "other_names",
        "family_name",
        "country",
        "date_of_birth",
        "date_of_death",
    ];


}
