<?php

namespace App\Http\Controllers;

use App\Utilities\Generator;
use Illuminate\Support\Facades\DB;

class CustomReportController extends Controller
{
    public function generate()
    {
        $data = DB::table('users')->get();

        return Generator::xlsx()
            ->fromBlade('sample')
            ->setData($data)
            ->render(['name', 'email'])
            ->generate();
    }

    public function sample()
    {
        return view('sample');
    }
}
