<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class test extends Controller
{
    public function test()
    {
        $pdf = Pdf::loadView('welcome');
        return $pdf->stream('welcome');
    }
}
