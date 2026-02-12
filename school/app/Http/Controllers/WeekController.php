<?php

namespace App\Http\Controllers;

use App\Models\Week;
 class WeekController extends Controller
{

public function index(){
    $weeks = Week::all();
    return view("weeks.index",compact("weeks"));
}

}