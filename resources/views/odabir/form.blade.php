<?php
    /* stvaranje niza u koji se spremaju svi smjerovi iz baze */
    $izborSmjera = [];
    foreach($smjerovi as $smjer){
        $izborSmjera[$smjer['id']] = $smjer['naziv'];
    }
    /* stvaranje niza u koji se spremaju podaci korisnika */
    $izborKorisnik[$korisnik['id']] = $korisnik['ime']." ".$korisnik['prezime'];
    /* kreiranje niza koji u koji se spremaju bodovi korisnika */
    $bodovi[$korisnik['prosjek']*100] = $korisnik['prosjek']*100;

?>

{{ Form::select('prijava', $izborKorisnik , null, array('class' => 'form-control mt-2')) }}
{{ Form::select('izbor', array('1' => 'Prvi izbor'), null, array('class' => 'form-control mt-2')) }}
{{ Form::select('smjer', $izborSmjera, null, array('class' => 'form-control mt-2')) }}
{{ Form::select('bodovi', $bodovi, null, array('class' => 'form-control mt-2')) }}
{{ Form::submit('Spremi', array('class' => 'btn btn-primary form-control mt-2')) }}
