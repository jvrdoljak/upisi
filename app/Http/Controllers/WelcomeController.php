<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    /**
     * Početna stranica.
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome.index', []);
    }
}