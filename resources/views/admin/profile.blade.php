@extends('layouts.admin')

@section('content')

<div class="my_section">

  <h1>My-profile</h1>
  <h6>General Information of <strong>{{Auth::user()->name }}</strong></h6>
  <span>Welcome back!</span>
  
  <div class="d-flex justify-content-start align-items-center">
    <div class="my_profile">
      <div class="user">
        <div>
          <i class="fa-solid fa-user"></i>
          <span class="h4">user: <span class="special">{{ Auth::user()->name }}</span></span>
        </div>
        
        <div>
          <i class="fa-solid fa-envelope"></i>
          <span class="h4">email: <span class="special">{{ Auth::user()->email }}</span></span>
        </div>
    
        <div>
          <i class="fa-solid fa-location-dot"></i>
          <span class="h4">address: <span class="special">{{ Auth::user()->address }}</span></span>
        </div>
        
        <div>
          <i class="fa-solid fa-hashtag"></i>
          <span class="h4">vat-number: <span class="special">{{ Auth::user()->vat_number }}</span></span>
        </div>
        
        <div>
          <i class="fa-solid fa-mobile-screen"></i>
          <span class="h4">phone: <span class="special">{{ Auth::user()->phone }}</span></span>
        </div>
        
        <div>
          <i class="fa-solid fa-pen-to-square"></i>
          <span class="h4">Last profile updated at: <span class="special">{{ Auth::user()->updated_at }}</span></span>
        </div>
        
      </div> 
    </div>
    {{-- END My PROFILE --}}
     
    {{-- IMG --}}
    <div class="profile-photo my-4">
          
      @if (Auth::user()->image)
      <img class="profile_img" src="{{ asset('storage/' . Auth::user()->image) }}" alt="Immagine utente">
    
      @elseif (Auth::user()->image_db)
      <img class="profile_img" src="{{ Auth::user()->image_db }}" alt="Immagine db">
    
      @else
      <img class="profile_img" src="{{ asset('storage/uploads/restaurant-default.jpg') }}" alt="immagine default ristorante">
      @endif
    
    </div>
    {{-- END IMG --}}
  </div>
  
</div>



@endsection
@section('title', 'my-profile')