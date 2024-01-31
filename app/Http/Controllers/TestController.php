<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function getFirstLastName()
    {
        return splitName('Mark Jones');
    }
}
