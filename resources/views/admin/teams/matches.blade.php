@extends('admin.teams.layout')

@section('teams-section')
    <div class="">
        <h4 class="text-center">Matches</h4>
        <hr />
        <div>
            
            <ul class="list-group-flush">
                @foreach ($teams as $team)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col my-auto">
                                {{ $team->name }}
                            </div>
                            <div class="col my-auto">
                                VS
                            </div>
                            <div class="col-6">
                                <ul class="list-group list-group-flush">
                                    @forelse ($team->rivals as $rival)
                                        <div class="row">
                                            <div class="col">
                                                <div class="">{{ $rival->name }}</div>
                                            </div>
                                            <div class="col">
                                                <div class="">{{ $rival->pivot->match_date }}</div>
                                            </div>
                                            <div class="col">
                                                <div class="">{{ $rival->pivot->match_time }}</div>
                                            </div>
                                        </div>
                                        
                                    @empty
                                        <li class="list-group-item">No Rivals</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>

@endsection