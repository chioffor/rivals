@extends('admin.admin')

@section('lists')
    <h3 class="mt-2">Users</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Team</th>
                <th scope="col">Date Joined</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $user->name }}</td>
                    <td>
                        @if ($user->team)
                            {{ $user->team->name }}
                        @else
                            <span class="text-muted">No team set yet</span>
                        @endif
                        
                    </td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No users</p>
                </tr>
            @endforelse
            
        </tbody>
    </table>
@endsection