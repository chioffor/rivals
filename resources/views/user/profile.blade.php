@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <span class="dot"></span>
                    <!-- <h class="fw-bold">Team</h3> -->
            <p class="fw-bold"><a href="#">{{ $user->team ? $user->team->name : "Choose a team to play" }}</a></p>
            
            <div class="">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="#">Team Info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home/rivals">Rivals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Matches</a>
                    </li>
                </ul>
            </div> 
                             
           
            
        </div>
        
        <div class="">
            @yield('content')
        </div>        
    </div>
@endsection