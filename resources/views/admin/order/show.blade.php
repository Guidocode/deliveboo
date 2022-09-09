@extends('layouts.admin')

@section('content')
@foreach ($order_content as $item)
    {{ $item->name }} {{ $item->pivot->quantity }}
    <br>
    <br>
@endforeach
@endsection
