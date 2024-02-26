<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class KomentarFoto extends Model
{
    use HasFactory;


    protected $table = 'gallery_komentarfoto';
    protected $primaryKey = 'komentar_id'; // Jika Anda ingin menentukan primaryKey
    protected $fillable = ['foto_id', 'user_id', 'isi_komentar'];


    public function foto()
    {
        return $this->belongsTo(Foto::class, 'foto_id', 'foto_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}