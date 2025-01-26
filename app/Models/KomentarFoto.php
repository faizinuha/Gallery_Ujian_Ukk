<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class KomentarFoto extends Model
{
    protected $primaryKey = 'KomentarID';
    protected $fillable = ['FotoID', 'UserID', 'IsiKomentar','TanggalKomentar']; // Use IsiKomentar instead of Komentar

    public function __construct()
    {
        $this->table = 'komentar_foto'; // Make sure it matches your table name
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'FotoID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }
}
