<h1>Contact </h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Ihr Name') !!}
    {!! Form::text('name', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Ihr Name')) !!}
</div>

<div class="form-group">
    {!! Form::label('Ihre E-mail Adresse') !!}
    {!! Form::text('email', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Ihre E-mail Adresse')) !!}
</div>

<div class="form-group">
    {!! Form::label('Anliegen') !!}
    {!! Form::textarea('message', null, 
        array('required', 
              'class'=>'form-control', 
              'placeholder'=>'Ihr Anliegen')) !!}
</div>

<div class="form-group">
    {!! Form::submit('Senden', 
      array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}