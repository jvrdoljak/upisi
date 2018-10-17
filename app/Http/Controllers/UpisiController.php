<?php

namespace App\Http\Controllers;

//use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UpisiController extends Controller
{
    /**
     * Početna stranica za upise.
     *
     * @return Response
     */
    // public function index()
    // {
    //     return view('upisi.index', []);
    // }

    /**
     * Home stranica za UPISE.
     *
     * @return Response
     */
    public function dashboard()
    {
        return view('upisi.dashboard', []);
    }

    /**
     * Lista prijava.
     *
     * @return Response
     */
    public function list()
    {
        return view('upisi.list', []);
    }

    /**
     * Demo stranica za UPISI layout.
     *
     * @return Response
     */
    public function demo()
    {
        return view('upisi.demo', []);
    }
}