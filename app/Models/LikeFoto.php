<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeFoto extends Model
{
    // protected $primaryKey = 'LikeID';
    protected $table = 'likefoto';  // Pastikan tabelnya sesuai
    protected $primaryKey = 'LikeID';  // Primary key sesuai
    protected $fillable = ['FotoID', 'UserID', 'TanggalLike'];

    public $timestamps = true;

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'FotoID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
