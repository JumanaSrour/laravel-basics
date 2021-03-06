<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mechanic;

class MechanicController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 10;
        $mechanics=Mechanic::with('cars')->paginate($paginate);
        // dd($mechanics);

        return view('mechanic.index')->with('mechanics', $mechanics);
    }
}
