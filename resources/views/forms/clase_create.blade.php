@extends('layouts.admin')

@section('content')
  <div id="main" class="container">
    {{ Form::open([ 'url' => '#', 'class' => 'form-horizontal' ]) }}
      
    {{ Form::close() }}

  </div> <!-- Fin del div main -->
@endsection
