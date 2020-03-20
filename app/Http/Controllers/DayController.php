<?php

namespace App\Http\Controllers;

use App\Http\Resources\Days;
use App\Models\Day;
use App\Models\Epoch;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index() {
        return new Days(Day::all());
    }

    public function show($id) {
        return new \App\Http\Resources\Day(Day::find($id));
    }

    public function epoch($id) {
        $epoch = Epoch::find($id);
        return new Days($epoch->days);
    }


}
