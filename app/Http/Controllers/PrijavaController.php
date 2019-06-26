<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prijava;
use App\OdabirSmjera;
use App\Files;
use App\Http\Controllers\FilesController;

use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use File;

class PrijavaController extends Controller
{
    protected $salt;
    public function __construct()
    {
        $salt = "SALT-12345qwertz";
        $this->middleware('auth')->except(array('create','store','verificateEmail'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prijave = Prijava::latest()->where('verified','=', 1)->paginate(10);
        return view('prijave.index', compact('prijave'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prijave.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'email' => 'required|max:255|unique:prijava',
            'ime' => 'required|max:255',
            'ime_oca' => 'required|max:255',
            'prezime' => 'required|max:255',
            'prosjek' => 'required',
        ]);
        
        $prijava = array(
            'email' => $request['email'],
            'ime'   => $request['ime']. ' ' . $request['prezime']
        );
        $hash = md5($request['ime'] . $request['prezime'] . $request['email'] . $this->salt);
        if($this->sendVerificationEmail($prijava, $hash)){
            Prijava::create($request->all());
            return redirect()->route('odabirsmjera.show', $request['email']);
        }else{
            return redirect()->route('prijave.create')->
                            with('error', 'Verifikacijski email se ne može poslati, pokušajte kasnije.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fileNames = array(array());
        $prijava = Prijava::find($id);
        $files = Files::select()->where('prijava_id', '=', $id)->get();
        $i = 0;
        foreach($files as $file){
            $fileNames[$i]['original'] = $file->original_name;
            $fileNames[$i++]['unique'] = $file->unique_name;
        }
        return view('prijave.show', compact('prijava'), compact('fileNames'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prijava = Prijava::find($id);
        return view('prijave.edit', compact('prijava'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'email' => 'required|max:255',
            'ime' => 'required|max:255',
            'ime_oca' => 'required|max:255',
            'prezime' => 'required|max:255',
            'prosjek' => 'required',
        ]);
        Prijava::find($id)->update($request->all());
        return redirect()->route('prijave.index')
                        ->with('success', 'Prijava uspješno izmjenjena');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $files = Files::select()->where('prijava_id', '=', $id)->get();
        foreach($files as $file){
            if(File::exists($path = public_path('\pdfs\\'.$file->unique_name)))
                File::delete($path);
        }
        $files = Files::select()->where('prijava_id', '=', $id)->delete();
        OdabirSmjera::select()->where('prijava', '=', $id)->delete();
        Prijava::find($id)->delete();
        return redirect()->route('prijave.index')
                        ->with('success','Prijava uspješno pobrisana');
    }

    /**
     * 
     * Function sends verification email with link for api.
     * 
     * Arguments are 
     * 1. array with: email and name
     * 2. hash
     * 
     * Returns bool
     */
    public function sendVerificationEmail($prijava, $hash){
        $data = array(
            'ime'   => $prijava['ime'],
            'email' => $prijava['email'],
            'hash'  => $hash
        );
        try{
            Mail::send('emails.verification', $data, function($message) use ($prijava) {
                $message->to( $prijava['email'] , $prijava['ime'] )->subject
                ('Molimo potvrdite vaš email.');
                $message->from('no-reply@upisi.xyz','upisi.xyz');
            });
        } catch(\Swift_TransportException $e){
            return false;
        }
        return true;
    }

    /**
     * 
     * Function does verification email
     * 
     * Functions returns redirection to odabirsmjera route
     */
    public function verificateEmail($email, $hash){
        $prijava = Prijava::select()->where('email', '=', $email)->first();
        
        if(md5($prijava->ime . $prijava->prezime . $prijava->email . $this->salt) == $hash){
            $prijava->verified = 1;
            $prijava->save();
            return redirect()->route('odabirsmjera.show', $prijava->email);
        }
        else
            echo 'Email verifikacija nije uspjela';
    }
}
