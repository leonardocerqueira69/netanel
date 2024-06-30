@extends('layouts.main')

@section('content')

@foreach($diretores as $diretor)
    <p>{{ $diretor->nome }}</p>
    
@endforeach

@endsection('content')