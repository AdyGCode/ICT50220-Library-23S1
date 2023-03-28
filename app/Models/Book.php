<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Book extends Model
{
    use HasFactory;
    use HasUuid;

    protected $fillable = [
        "title",
        "sub_title",
        "series",
        "isbn13",
        "edition",
        "is_fiction",
        "language",
        "published",
        "format",
        "publisher_id",
        "uuid",
    ];

    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }
}
