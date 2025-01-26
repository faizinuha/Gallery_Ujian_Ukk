<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    // Specify the table name if it's different from the default (plural of model name)
    protected $table = 'albums';

    // Define the primary key if it's different from the default 'id'
    protected $primaryKey = 'AlbumID';

    // Allow mass assignment for the following fields
    protected $fillable = [
        'NamaAlbum',
        'Deskripsi',
        'TanggalDibuat',
        'UserID', // If you want to mass assign the user ID as well
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'AlbumID');
    }
}
