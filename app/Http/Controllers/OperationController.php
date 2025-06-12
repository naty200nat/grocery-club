<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Auth::user()->operations()->latest()->get();
        return view('operations.index', compact('operations'));
    }
}
