<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OdabirSmjera;
use App\Prijava;
use App\Smjer;

use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KreiranjeRangListiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('makeRankingLists');
    }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($smjerId)
    {
        if(Prijava::select()->where('upisani_smjer', '=', $smjerId)->count() > 0){
            $prijave = Prijava::select()->where('upisani_smjer', '=', $smjerId)
                                        ->orderBy('prosjek', 'desc')
                                        ->get();
            $nazivSmjera = Smjer::select('naziv')->where('id', '=', $smjerId)
                                                 ->get();
            $nazivSmjera = $nazivSmjera[0]['naziv'];

            return view('kreiranjeranglisti.show', compact('prijave'), compact('nazivSmjera'));
        }
        else{
            return view('kreiranjeranglisti.show')->withErrors(array(
                "Rang lista za još nije dostupna."
            ));
        }
    }
    /**
     * Funtion makes ranking list.
     * 
     * returns message
     */
    public function makeRankingLists(){
        if(Prijava::select()->where('upisani_smjer','!=',null)->count() > 0)
            return redirect()->route('upisi.administration')
                            ->with('success', 'Rang liste su već kreirane');
        else{
            $smjerovi = Smjer::select()->get();
            $prijave = Prijava::select()->orderBy('id', 'desc')->get();
            $prijave_smjerovi = OdabirSmjera::select()->orderBy('prijava', 'desc')->get();
            
            foreach($prijave_smjerovi as $prijava_smjer)
                foreach($prijave as $prijava)
                    if($prijava->id == $prijava_smjer->prijava){
                        $prijava->upisani_smjer = $prijava_smjer->smjer;
                        $prijava->save();
                    }

            return redirect()->route('upisi.administration')
                            ->with('success', 'Rang liste su uspješno kreirane');
        }
    }

    /**
     * Funkcion destroy ranking lists
     * 
     * returns message
     */
    public function destroyRankingLists(){
        if(Prijava::select()->where('upisani_smjer','!=',null)->count() == 0)
            return redirect()->route('upisi.administration')
                            ->with('success', 'Rang liste su prazne');
        else{
            $prijave = Prijava::select()->get();
            foreach($prijave as $prijava){
                $prijava->upisani_smjer = null;
                $prijava->save();
            }
            return redirect()->route('upisi.administration')
                            ->with('success', 'Rang liste su pobrisane');
        }
    }
    /**
     * Function sends notification email
     * 
     * returns message
     */
    public function sendNotificationEmails($notification){
        if($notification == "rankinginformation"){
            $smjerovi = Smjer::select('id', 'naziv')->get();
            $prijave = Prijava::select()->get();
            foreach($prijave as $prijava){
                if(($prijava->upisani_smjer != null) && ($prijava->verified == 1)){
                    $nazivUpisanogSmjera = "";
                    $id_smjera = 0;
                    foreach($smjerovi as $smjer){
                        if($prijava->upisani_smjer == $smjer->id){
                            $nazivUpisanogSmjera = $smjer->naziv;
                            $id_smjera = $smjer->id;
                        }
                    }
                    $data = array(
                        'nazivUpisanogSmjera'   =>  $nazivUpisanogSmjera,
                        'ime'                   =>  $prijava->ime." ".$prijava->prezime,
                        'id_smjera'             =>  $id_smjera
                    );
                    Mail::send('emails.rankinginformation.truenotification', $data, function($message) use ($prijava) {
                        $message->to( $prijava->email , $prijava->ime." ".$prijava->prezime )->subject
                        ('Obavijest o upisu u srednju školu.');
                        $message->from('no-reply@upisi.xyz','upisi.xyz');
                    });
                }
                elseif(($prijava->upisani_smjer == null) && ($prijava->verified == 1)){
                    $data = array(
                        'ime'   =>  $prijava->ime." ".$prijava->prezime,
                    );
                    Mail::send('emails.rankinginformation.falsenotification', $data, function($message) use ($prijava) {
                        $message->to( $prijava->email , $prijava->ime." ".$prijava->prezime )->subject
                        ('Obavijest o upisu u srednju školu.');
                        $message->from('no-reply@upisi.xyz','upisi.xyz');
                    });
                }
                else
                    continue;
            }
            return redirect()->route('upisi.administration')
                                ->with('success', 'Email-ovi su uspješno poslani');
            }
            return view('welcome.index', []);
    }
}
