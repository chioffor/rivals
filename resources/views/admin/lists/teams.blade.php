@extends('admin.admin')

@section('lists')
    <h3 class="mt-2">Teams</h3>
    <form method="POST" action="/teams/add">
        @csrf
        <div class="mt-2 mb-2 input-group w-25 mx-auto">
            <input type="text" name="name" class="form-control border-1" placeholder="Enter a team name">
            <input type="submit" value="add" class="btn btn-outline-secondary">
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Level</th>
                <th scope="col">Date Created</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teams as $team)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $team->name }}</td>
                <td>1</td>
                <td>{{ $team->created_at }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="4">No teams</td>
                </tr>
            @endforelse
            <!-- <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr> -->
        </tbody>
    </table>
@endsection