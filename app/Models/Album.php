<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{

    protected $fillable = [
        'name',
    ];

    public function pictures()
    {
        return $this->hasMany(AlbumPictures::class);
    }
}
