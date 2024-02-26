<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\LikeFoto;
use App\Models\Foto;


class LikeFotoController extends Controller
{
    public function toggleLike(Request $request)
    {
        $user_id = auth()->id();
        $foto_id = $request->foto_id;
        $like = LikeFoto::where('foto_id', $foto_id)->where('user_id', $user_id)->first();


        if ($like) {
            // User already liked the foto, so remove the like
            $like->delete();
        } else {
            // User hasn't liked the foto yet, so add a new like
            LikeFoto::create([
                'foto_id' => $foto_id,
                'user_id' => $user_id,
            ]);
        }


        return back();
    }


}
