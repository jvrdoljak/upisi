<?php

namespace App\Http\Controllers;

//use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\OdabirSmjera;
use App\Prijava;
use App\Smjer;
use App\Predmet;

class UpisiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $counts['prijava'] = Prijava::select()->count('id');
        $counts['smjer'] = Smjer::select()->count('id');
        $counts['predmet'] = Predmet::select()->count('id');
        return view('upisi.administration', compact('counts'));
    }
}