<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
class DemoController extends Controller
{
    public function demo()
    {
        $employee= Staff::all();
        return view('demo',compact('employee'));
    }
}
