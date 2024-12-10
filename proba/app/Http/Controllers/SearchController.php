<?php

namespace App\Http\Controllers;

use App\Models\Kurs; // Koristi se za model Kurs
use App\Models\Korisnik; // Koristi se za model Korisnik
use App\Models\Profesor; // Koristi se za model Profesor
use App\Models\Komentar; // Koristi se za model Komentar
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Validacija korisničkog unosa
        $request->validate([
            'query' => 'required|string',
        ]);

        // Pretraga u bazi
        $courses = Kurs::where('title', 'LIKE', '%' . $request->input('query') . '%')
            ->orWhere('description', 'LIKE', '%' . $request->input('query') . '%')
            ->get();

        $users = Korisnik::where('name', 'LIKE', '%' . $request->input('query') . '%')
            ->orWhere('email', 'LIKE', '%' . $request->input('query') . '%')
            ->get();

        $professors = Profesor::where('name', 'LIKE', '%' . $request->input('query') . '%')
            ->get();

        $comments = Komentar::where('content', 'LIKE', '%' . $request->input('query') . '%')
            ->get();

        // Povratak odgovora kao JSON
        return response()->json([
            'courses' => $courses,
            'users' => $users,
            'professors' => $professors,
            'comments' => $comments,
        ]);
    }
}
