<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ApiPendidikanController extends Controller
{
    public function getAll()
    {
        // Mengambil semua data pendidikan
        $pendidikan = Pendidikan::all();

        // Mengembalikan response JSON dengan status code 200 (OK)
        return Response::json($pendidikan, 200);
    }
}
