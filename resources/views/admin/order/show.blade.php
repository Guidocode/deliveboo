@extends('layouts.admin')

@section('content')
<div>
    <div>
      <h2 class="">Info cliente </h2>

        <ul>
            <li><h5># {{$order->id}}</h5></li>
            <li><h5>Nome: {{$order->client_name}}</h5></li>
            <li><h5>Cognome: {{$order->client_surname}}</h5></li>
            <li><h5>Indirizzo: {{$order->client_address}}</h5></li>
            <li><h5>Telefono: {{$order->client_phone}}</h5></li>
            <li><h5>Email: {{$order->client_email}}</h5></li>
        </ul>

        <hr class="py-4">
        <h2 class="mt-4 ">Articoli acquistati</h2>

          <table class="table">
              <thead>
                <tr>
                  <th scope="col">Articolo</th>
                  <th scope="col">Prezzo per unità</th>
                  <th scope="col">Quantità</th>
                  <th scope="col">Prezzo complessivo</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($order_content as $dish)
                      <tr>
                          <td>{{$dish->name}}</td>
                          <td>{{$dish->price}}€</td>
                          <td>{{$dish->pivot->quantity}}</td>
                          <td>{{$dish->price * $dish->pivot->quantity}}€</td>
                      </tr>
                  @endforeach
                  <td class="font-weight-bold">Totale Ordine: {{ $order->total_price }}€ </td>
              </tbody>
          </table>

        <div class="d-flex justify-content-end">
          <a href="{{route('admin.order.index')}}" class="btn btn-warning">Indietro</a>
        </div>
    </div>
  </div>
@endsection
