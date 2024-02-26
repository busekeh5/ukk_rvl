<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\KomentarFoto;


class KomentarFotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'foto_id' => 'required|exists:gallery_foto,foto_id',
            'isi_komentar' => 'required|string',
        ]);


        KomentarFoto::create([
            'foto_id' => $request->foto_id,
            'user_id' => auth()->id(),
            'isi_komentar' => $request->isi_komentar,
        ]);


        return back()->with('success', 'Komentar berhasil ditambahkan.');
    }


}
