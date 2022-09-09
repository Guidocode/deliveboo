@extends('layouts.admin')

@section('content')
{{-- @dump($orders) --}}
{{-- {{ $orders }} --}}
{{-- <a class="btn btn-primary" href="{{ route('admin.order.show', $orders[0]) }}">{{ $orders[0]->client_name }}</a> --}}

@foreach ($orders as $order)

<a class="btn btn-primary" href="{{ route('admin.order.show', $order->id) }}">
    {{ $order->client_name }}
</a>



@endforeach

@endsection
@section('title', 'my-orders')
