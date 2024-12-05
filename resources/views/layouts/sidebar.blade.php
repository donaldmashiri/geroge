<div class="col-md-3">
    <div class="card">
        <h5 class="card-title bg-secondary p-2">Menu</h5>
        <div class="card-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/home">
                        <i class="bi bi-person-circle"></i> Profile
                    </a>
                </li>

                {{-- @if(auth()->user()->role_id == 1 || auth()->user()->role_id == 2) --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">
                            <i class="bi bi-people-fill"></i> User Management
                        </a>
                    </li>
                {{-- @endif --}}

                {{-- @if(auth()->user()->role_id == 2 || auth()->user()->role_id == 3) --}}

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('asset.index') }}">
                        <i class="bi bi-tools"></i> Assets
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('gate-passes.create') }}">
                        <i class="bi bi-plus-circle"></i> Request Gate pass
                    </a>
                </li>

                 @if(auth()->user()->role == 'admin' || auth()->user()->role == 'manager')
                <li class="nav-item">
                    <a class="nav-link text-warning" href="{{ route('gate-passes.pending') }}">
                        <i class="bi bi-hourglass-split"></i> Pending Approval
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-success" href="{{ route('gate-passes.index') }}">
                        <i class="bi bi-calendar-check"></i> All Gate Pass
                    </a>
                </li>

                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dispatches.index') }}">
                        <i class="bi bi-tools"></i> Dispatches
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link fw-bolder" href="{{ route('report') }}">
                        <i class="bi bi-file-earmark-text"></i> Reports
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


                {{-- @endif --}}

            </ul>
        </div>
    </div>
</div>
