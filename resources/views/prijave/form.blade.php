{{ Form::text('ime', null, array('placeholder' => 'Ime', 'class' => 'form-control mt-2')) }}
{{ Form::text('prezime', null, array('placeholder' => 'Prezime', 'class' => 'form-control mt-2')) }}
{{ Form::text('ime_oca', null, array('placeholder' => 'Ime oca', 'class' => 'form-control mt-2')) }}
{{ Form::text('email', null, array('placeholder' => 'E-mail (npr. ime.prezime@gmail.com)', 'class' => 'form-control mt-2')) }}
{{ Form::text('prosjek', null, array('placeholder' => 'Prosjek od 5. do 8. razreda osnovne škole (zaokružen na 3 decimale)', 'class' => 'form-control mt-2')) }}

{{ Form::submit('Spremi', array('class' => 'btn btn-primary form-control mt-2')) }}
