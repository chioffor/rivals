@extends('admin.teams.layout')

@section('teams-section')
    <div class="">
    <h4 class="text-center">Fix a Match</h4>
    <hr />
        <div class="row">
            <div class="col">
                <form method="POST" action="/teams/fix" id="fix-match">
                    @csrf
                    <h5 class="fw-bold">Select Teams</h5>
                    <div class="row text-center input-group">
                        <div class="col">
                            <select class="form-select" aria-label="Team1" form="fix-match" name="team1">
                                <option selected>Team 1</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>                                
                                @endforeach
                            </select>
                        </div>
                        <div class="col my-auto">
                            <span class="fw-bold">VS</span>
                        </div>
                        <div class="col">
                            <select class="form-select" aria-label="Team2" form="fix-match" name="team2">
                                <option selected>Team 2</option>
                                @foreach ($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>                                
                                @endforeach
                            </select>
                        </div>                        
                        <div class="col">
                            <div class="input-group date">
                                <input type="date" class="form-control" name="date">                                
                            </div>
                        </div> 
                        <div class="col">
                            <div class="">
                                <input type="time" class="form-control" name="time">
                            </div>
                        </div> 
                        <div class="col-2 mx-auto my-auto btn">
                            <input type="submit" value="SET">
                        </div>                    
                    </div>
                </form>
            </div>
        </div> 
        <hr />
        <div class="row">
            <h5 class="fw-bold">Match</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Team 1</th>
                        <th scope="col">VS</th>
                        <th scope="col">Team 2</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $team1 ? $team1 : '-' }}</td>
                        <td>-</td>
                        <td>{{ $team2 ? $team2 : '-'}}</td>
                        <td>{{ $matchDate ? $matchDate : '01-01-2021' }}</td>
                        <td>{{ $matchTime ? $matchTime : '00:00' }}</td>
                        <td><a href="#">delete</a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>           
    </div>
    

@endsection