@extends('layouts.admin')

@section('content')
@foreach ($orders as $order)

{{ $order }}
<br>
<br>
@endforeach

@endsection
@section('title', 'my-orders')
