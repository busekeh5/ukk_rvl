<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Foto extends Model
{
    use HasFactory;


    protected $table = 'gallery_foto';
    protected $primaryKey = 'foto_id'; // Jika Anda ingin menentukan primaryKey
    protected $fillable = ['judul_foto', 'deskripsi_foto', 'lokasi_file', 'album_id', 'user_id'];


    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id', 'album_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function komentars()
    {
        return $this->hasMany(KomentarFoto::class, 'foto_id', 'foto_id');
    }
    public function likes()
    {
        return $this->hasMany(LikeFoto::class, 'foto_id', 'foto_id');
    }

}
