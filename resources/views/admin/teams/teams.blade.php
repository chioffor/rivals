@extends('admin.teams.layout')

@section('teams-section')
    <div class="">
        <h4 class="text-center">Teams</h4>
        <div class="row">            
            <div class="col">
                <h4>Add a Team</h4>
                <form method="POST" action="/teams/add">
                    @csrf
                    <input type="text" placeholder="Team name" class="border-1" name="name">
                    <input type="submit" value="add">
                </form>
            </div>
            <div class="col">
                <h6 class="text-center fw-bold">{{ $teams->count() }} - Teams</h6>
                <ul>
                    @forelse ($teams as $team)
                        <li>{{ $team->name }}</li>
                    @empty
                        <li class="text-muted">No Teams</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

@endsection