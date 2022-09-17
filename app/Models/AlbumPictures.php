<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumPictures extends Model
{
    use HasFactory;
    protected $fillable = [
        'album_id',
        'picture_name',
        'picture_url'
    ];

    public function albums()
    {

        return $this->belongsTo(Album::class);

    }


}
