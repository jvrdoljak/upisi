<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OdabirSmjera;
use App\Prijava;
use App\Smjer;

class OdabirSmjeraController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'prijava' => 'required',
            'smjer' => 'required',
            'izbor' => 'required',
            'bodovi' => 'required'
        ]);
        OdabirSmjera::create($request->all());
        return redirect()->route('files.show', $request['prijava']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        //dohvacanje ID korisnika koji kreira prijavu
        $prijava = Prijava::select()->where('email', '=', $email )->get();
        $prijava = $prijava[0];
        
        if($prijava->verified == 1){
            //dohvacanje svih smjerova
            $smjerovi = Smjer::all();
        
            return view('odabir.show', compact('prijava'), compact('smjerovi'));
        }
        else
            return view('odabir.show')->withErrors(array(
                "Vaš email nije verificiran.
                Provjerite email-ove, kako biste nastavili s upisom.
                Ukoliko niste dobili email pogledajte neželjenu poštu."));
    }
}
