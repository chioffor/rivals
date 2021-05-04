@extends('user.profile.rivals.layout')

@section('rivals-section')
    <div class="">
        <h4 class="text-center">Invite</h4>
        <hr />
        <div class="row">
            <div class="col">
                <form method="GET" action="/home/rivals/search-user">
                    @csrf
                    <div class="input-group w-75">
                        <input type="search" name="search-user" placeholder="Enter a username" class="form-control">
                        <input type="submit" value="search" class="btn btn-outline-secondary">
                    </div>
                </form>
            </div>
            <div class="col">
                <h5 class="text-center">Users</h5>
                <div class="list-group list-group-flush">
                    @foreach ($users as $user) 
                        <div class="row">
                            <div class="col">                       
                                <!-- <div class="list-group-item border-end-0 border-1 border-top-0 border-bottom-0 border-start-1 d-flex"> -->
                                <div class="">{{ $user->name }}</div>
                            </div>
                            <div class="col">
                                <div class="">{{ $user->team ? $user->team->name : "No team" }}</div>
                            </div>
                            <div class="col">
                                @if ($user->id === $activeUser->id)
                                    <div class=""><a href="" style="text-decoration: none;">profile</a></div>
                                @else
                                    
                                    @if ($activeUser->rivals->contains('id', '===', $user->id))
                                        @switch($activeUser->rivals->where('id', '===', $user->id)->first()->pivot->status)
                                            @case("sent")
                                                <div class=""><a href="/home/rivals/cancel/{{ $user->id }}" style="text-decoration: none;">cancel request</a></div>
                                                @break
                                            @case("pending")
                                                <div class=""><a href="/home/rivals/accept/{{ $user->id }}" style="text-decoration: none;">accept request</a></div>
                                                @break
                                            @case("connected")
                                                <div class="text-muted fw-bold"><a href="" style="text-decoration: none;">rivals</a></div>
                                                @break
                                        @endswitch                               
                                    @else
                                        <div class=""><a href="/home/rivals/invite/{{ $user->id }}" style="text-decoration: none;">invite</a></div>
                                    @endif
                                @endif
                            </div>
                        </div>
                    
                        <!-- <div class="list-group-item">No user</div> -->
                    @endforeach
                </div>
            </div>
            
        </div>
    </div>
@endsection