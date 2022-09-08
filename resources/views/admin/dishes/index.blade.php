@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Menu</h1>
    @if(session('dish_cancellato'))
      <div class="alert alert-success" role="alert">
        <strong>{{ session('dish_cancellato') }}</strong>
      </div>
    @elseif (session('accesso-negato'))
      <div class="alert alert-danger" role="alert">
        <strong>{{ session('accesso-negato') }}</strong>
      </div>
    @endif


    {{-- START TABLE --}}
    <div class="table-wrapper">
      <div class="upper-table d-flex">
        <div>Nome piatto</div>
        <div>Azioni</div>
      </div>

      @if ($dishes->isEmpty())
      <p>Piatti non presenti nel suo Menu</p>

      @else
      @foreach ($dishes as $dish)
      <div class="lower-table">

        <div class="row-table d-flex">
          <p class="title-dish">{{ $dish->name}}</p>
          <div class="d-flex">
            <a class="btn btn-primary" href="{{ route('admin.dishes.show', $dish) }}">MOSTRA</a>
            <a class="btn btn-warning mx-3" href="{{ route('admin.dishes.edit', $dish) }}">MODIFICA</a>
  
            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#modal_box{{ $dish->id }}">CANCELLA
            </button>  
            
            {{-- MODAL  --}}
        
              <div class="modal fade" id="modal_box{{ $dish->id }}" tabindex="-1" role="dialog"  aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
        
                  <div class="modal-content">
        
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Icon Trash Bin</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="x">&times;</span>
                      </button>
                    </div>
        
                    <div class="modal-body">
                       Vuoi eliminare <strong><em> {{ $dish->name}} </em></strong> ?
        
                    </div>
        
                    <div class="modal-footer">
                      <form action="{{ route('admin.dishes.destroy', $dish) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-delete">
                        Si
                      </button>
        
                      <button type="button" class="btn btn_custom" data-dismiss="modal">
                        No
                      </button>
                      </form>
                    </div>
        
                  </div>
                </div>
              </div>
          </div>
          {{-- END OF MODAL --}}
        </div>
        @endforeach

        @endif
      </div>
  </div>
</div>

<style >

  .modal-content{
    background-color: #e8f6e7;
  }
  .modal-header{
   border-bottom: 1px solid black;
  }
  .btn_custom{
    background-color: #F98857;
    border-color: none;
    color:white;
  }

</style>


@endsection
@section('title', 'my-menu')