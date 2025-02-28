<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


// Model Foto
class foto extends Model
{
    //Relations

    protected $fillable = [
        'JudulFoto',
        'DeskripsiFoto',
        'TanggalUnggah',
        'LokasiFile',
        'AlbumID',
        'UserID'
    ];

    protected $primaryKey = 'FotoID';

    public function album()
    {
        return $this->belongsTo(Album::class, 'AlbumID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function comments()
    {
        return $this->hasMany(KomentarFoto::class, 'FotoID');
    }

    public function likes()
    {
        return $this->hasMany(LikeFoto::class, 'FotoID');
    }
}
