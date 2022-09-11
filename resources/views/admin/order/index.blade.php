@extends('layouts.admin')

@section('content')
<div><h1 class="">I tuoi ordini</h1></div>
<div class="overflow-auto vh-40">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID ordine</th>
            <th scope="col">Nome</th>
            <th scope="col">Cognome</th>
            <th scope="col">Totale</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td class="align-middle">{{$order->id}}</td>
                    <td class="align-middle">{{$order->client_name}}</td>
                    <td class="align-middle">{{$order->client_surname}}</td>
                    <td class="align-middle">{{$order->total_price}}€</td>
                    <td class="align-middle"><a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-warning">VEDI DETTAGLI</a></td>
                </tr>
            @empty
                <tr colspan="4">Nessun ordine presente</tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
@section('title', 'my-orders')

