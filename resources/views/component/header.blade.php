<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ url('/dashboard') }}" class="logo d-flex align-items-center">
            {{-- <img src="{{ asset('admin/assets/img/logo.png') }}" alt=""> --}}
            <span class="d-none d-lg-block">Brain Academy</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if(Auth::user()->user_image)
                        <img src="{{ asset('storage/images/' . Auth::user()->user_image) }}" alt="Profile" class="rounded-circle">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" alt="Profile" class="rounded-circle">
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('user-profile') }}"><i class="bi bi-person"></i><span>My Profile</span>
                        </a>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" id="logout-from" method="POST">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center" id="logout-btn" href="javascript:void(0);"><i class="bi bi-box-arrow-right"></i><span>Logout</span></button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
</header>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#logout-btn').click(function(){
            $('#logout-from').submit();
        });
    });
</script>
