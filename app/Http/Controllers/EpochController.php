<?php

namespace App\Http\Controllers;

use App\Http\Resources\Epochs;
use App\Models\Day;
use App\Models\Epoch;
use Illuminate\Http\Request;

class EpochController extends Controller
{
    public function index() {
        return new Epochs(Epoch::all());
    }

    public function show($id) {
        return new \App\Http\Resources\Epoch(Epoch::find($id));
    }

    public function current() {
        $epoch = Epoch::whereDate('start_at', '<=', date('Y-m-d'))
            ->whereDate('end_at', '>=', date('Y-m-d'))
            ->first();

        return new \App\Http\Resources\Epoch($epoch);
    }
}
