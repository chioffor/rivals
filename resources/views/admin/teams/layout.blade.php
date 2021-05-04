
@include('admin.layout')

<div class="container">

    <div class="row">
        <div class="col">
            <div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/teams/teams">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams/fix-a-match">Fix a Match</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/teams/matches">Matches</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="col-10">
            @yield('teams-section')
        </div>
    </div>
</div>



