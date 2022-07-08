<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Meow;


class MeowController extends Controller
{
    public function store(Request $request){
        $user = Auth::user();

        $validated = $request->validate([
            'message' => ['required', 'max:250']
        ]);

        Meow::create([
            'message' => $request->input('message'),
            'user_id' => $user->id
        ]);

        return redirect()->route('timeline');
    }
}
