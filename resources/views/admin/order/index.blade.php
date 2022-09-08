@extends('layouts.admin')

@section('content')
{{-- @dump($orders) --}}
@foreach ($orders as $order)

{{ $order->client_name }}
<br>
<br>
@endforeach

@endsection
@section('title', 'my-orders')
