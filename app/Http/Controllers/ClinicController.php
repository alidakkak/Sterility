<?php

namespace App\Http\Controllers;

use App\Models\AboutClinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index(){
        return AboutClinic::all();
    }

    public function store(Request $request) {
         return AboutClinic::create($request->all());
    }
}
