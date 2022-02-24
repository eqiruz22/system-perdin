<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ZoneController extends Controller
{
    public function index()
    {
        return view('zone.index');
    }

    public function create()
    {
        return view('zone.create');
    }
}