<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Meow;


class TimelineController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        $all_meows = Meow::with('users')->get();

        return Inertia::render('Timeline', [
            'user' => $user,
            'all_meows' => $all_meows
        ]);
    }

    public function detail(Request $request){
        $user = Auth::user();
        $all_meows = Meow::whereBelongsTo($user, 'users')->with('users')->get();

        return Inertia::render('Timeline', [
            'user' => $user,
            'all_meows' => $all_meows
        ]);
    }
}
