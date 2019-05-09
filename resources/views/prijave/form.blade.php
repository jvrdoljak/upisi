{{ Form::text('ime', null, array('placeholder' => 'Ime', 'class' => 'form-control mt-2')) }}
{{ Form::text('prezime', null, array('placeholder' => 'Prezime', 'class' => 'form-control mt-2')) }}
{{ Form::text('ime_oca', null, array('placeholder' => 'Ime oca', 'class' => 'form-control mt-2')) }}
{{ Form::text('email', null, array('placeholder' => 'E-mail(ime.prezime@skole.hr)', 'class' => 'form-control mt-2')) }}
{{ Form::text('prosjek', null, array('placeholder' => 'Prosjek (zaokružen na 3 decimale)', 'class' => 'form-control mt-2')) }}

{{ Form::submit('Spremi', array('class' => 'btn btn-primary form-control mt-2')) }}
