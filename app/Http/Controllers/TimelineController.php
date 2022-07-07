<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class TimelineController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();

        return Inertia::render('Timeline', [
            'user' => $user
        ]);
    }
}
