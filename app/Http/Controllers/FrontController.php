<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measure;

class FrontController extends Controller
{
    public function index()
    {
        $measure = Measure::get()->toArray();
        dd($measure);
        return view('welcome');
    }
}
