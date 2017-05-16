<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class TestOneController extends Controller
{
    public function sort_array()
    {
        $cars = ["Volvo", "BMW", "SAAB"];
        sort($cars);
        var_dump($cars);
    }
    
}
