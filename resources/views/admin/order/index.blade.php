@extends('layouts.admin')

@section('content')
{{-- @dump($orders) --}}
@foreach ($orders as $order)

@dump($order)
<br>
<br>
@endforeach

@endsection
@section('title', 'my-orders')
