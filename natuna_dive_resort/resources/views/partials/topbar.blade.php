<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    @auth
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><i class="fas fa-user-circle mr-1 text-gray-400"></i></i>  {{ auth()->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/">
                    <i class="fas fa-home fa-sm fa-fw mr-1 text-gray-400"></i>
                    Landing Page
                </a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-1 text-gray-400"></i>
                        Logout</button>
                </form>                
            </div>
        </li>
    </ul>
    @else
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link mr-2 d-none d-lg-inline text-gray-600 small" href="/login" 
                >
                Login <i class="fas fa-sign-in-alt"></i>
            </a>
        </li>
    </ul>
    @endauth

</nav>