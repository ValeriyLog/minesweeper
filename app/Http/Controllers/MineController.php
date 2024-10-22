<?php

namespace App\Http\Controllers;

use App\Models\Mine;
use Illuminate\Http\Request;

class MineController extends Controller
{
    public function index()
    {
        $openedBomb = Mine::where('is_mine', true)->where('is_opened', true)->first();
        if ($openedBomb) {
            return view('lose');
        }

        $mines = Mine::all();
        return view('index', compact('mines'));
    }

    public function click($id)
    {
        $mine = Mine::findOrFail($id);
        $mine->is_opened = true;
        $mine->save();

        return back();
    }
}
