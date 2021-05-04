
@include('user.profile')

<div class="card">
    <div class="card-body">
        <!-- <h3 class="fw-bold text-muted mx-auto text-center">Rivals</h3> -->

        <div class="row">
            <div class="col-3">
                <div>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/home/rivals/invite">Invite</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home/rivals/pending-invites">Pending Invites</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home/rivals/sent-invites">Sent Invites</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <div class="col">
                @yield('rivals-section')
            </div>
        </div>
    </div>
</div>



