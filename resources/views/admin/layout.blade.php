@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">                
            <div class="">
                <p class="fw-bold">Admin</p>
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="true" href="/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams">Teams</a>
                    </li>
                </ul>
            </div>
            <!--  -->
        </div>
    </div>
    <hr />
@endsection('content')