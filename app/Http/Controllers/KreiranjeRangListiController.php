<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OdabirSmjera;
use App\Prijava;
use App\Smjer;

class KreiranjeRangListiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Smjer::select()->get();

        return view('kreiranjeranglisti.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($smjerId)
    {
        $korisnici = [];
        $prijaveNaSmjer = OdabirSmjera::select()->where('smjer', '=', $smjerId)->orderBy('bodovi', 'desc')->get();
        foreach($prijaveNaSmjer as $prijavaNaSmjer){
            $korisnici[$prijavaNaSmjer['prijava']] = Prijava::select('ime', 'prezime','ime_oca', 'prosjek')->where('id', '=', $prijavaNaSmjer['prijava'])->get();
        }
        $nazivSmjera = Smjer::select('naziv')->where('id', '=', $smjerId)->get();
        $nazivSmjera = $nazivSmjera[0]['naziv'];

        return view('kreiranjeranglisti.show', compact('korisnici'), compact('nazivSmjera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
