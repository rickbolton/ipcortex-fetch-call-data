<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Ipcortex\Ipcortex;

class DemoController extends Controller
{
    public function index()
    {
        $ipcortex = new Ipcortex;
        $response = $ipcortex->fetchCallData();

        dd($response->values);
    }
}
