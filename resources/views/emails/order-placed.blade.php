@component('mail::message')
Ciao {{ $order->client_name }},

Ecco il riepilogo del tuo ordine.
<br>
@component('mail::table')
| Articolo              | Quantità              | Prezzo                |
| -------------         |:-------------:        | ---------------:      |
@foreach ($order_content as $product)
| {{ $product['name'] }} | {{ $product['inCart']}} | {{ $product['price'] }}&euro; |
@endforeach
@endcomponent
<br>
Totale ordine pagato {{ $order->total_price }}&euro;.
<br>
<br>


Grazie,<br>
{{ config('app.name') }}
@endcomponent
