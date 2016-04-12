{{ Html::style('css/contact2.css') }}
@extends('master')
@section('title', 'Kontakt') 
<h1>Kontaktformular </h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>

{!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
<div class="outer">
	<div class="form-group">
		{!! Form::label('Ihr Name') !!}
		<br/>
		{!! Form::text('name', null, 
			array('required', 
				  'class'=>'form-control', 
				  'placeholder'=>'Ihr Name')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('Ihre E-mail Adresse') !!}
		<br/>
		{!! Form::text('email', null, 
			array('required', 
				  'class'=>'form-control', 
				  'placeholder'=>'Ihre E-mail Adresse')) !!}
	</div>

	<div class="form-group">
		{!! Form::label('Anliegen') !!}
		<br/>
		{!! Form::textarea('message', null, 
			array('required', 
				  'class'=>'form-control', 
				  'placeholder'=>'Ihr Anliegen',
				  'id'=>'textarea'
				  )) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Senden', 
		  array('class'=>'btn btn-primary form-control')) !!}
	</div>
</div>
{!! Form::close() !!}