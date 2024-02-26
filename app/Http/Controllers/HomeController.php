<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Foto; // Pastikan menggunakan model yang sesuai


class HomeController extends Controller
{
    public function index()
    {
        $photos = Foto::all(); // Mengambil semua foto dari database
        return view('home', ['photos' => $photos]);
    }
}
