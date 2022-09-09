extends('layouts.admin')

@section('content')
<div>
    <div>
      <h1 class="txt-oxford">Customer Info</h1>
      <div class="table-responsive">
        <table class="table ">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->client_name}}</td>
                        <td>{{$order->client_surname}}</td>
                        <td>{{$order->client_address}}</td>
                        <td>{{$order->client_phone}}</td>
                        <td>{{$order->client_email}}</td>
                    </tr>
            </tbody>
        </table>
      </div>
        <hr class="py-4">
        <h1 class="mt-4 txt-oxford">Customer Cart</h1>
        <div class="table-responsive">
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
                  @foreach($dishes as $dish)
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
        </div>
        <div class="d-flex justify-content-end">
          <a href="{{route('admin.orders.index')}}" class="btn btn-warning">Back to Orders</a>
        </div>
    </div>
  </div>
@endsection
