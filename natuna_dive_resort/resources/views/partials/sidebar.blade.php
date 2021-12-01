<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Natuna Dive Resort</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ ($title === 'Dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Components
    </div>
    <!-- Nav Item - Trip -->
    <li class="nav-item {{ ($title === 'Package') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/package">
            <i class="fas fa-suitcase"></i>
            <span>Package</span></a>
    </li>

    <!-- Nav Item - Rooms-->
    <li class="nav-item {{ ($title === 'Room') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/room">
            <i class="fas fa-bed"></i>
            <span>Room</span></a>
    </li>

    <!-- Nav Item - Rooms-->
    <li class="nav-item {{ ($title === 'Trip') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/trip">
            <i class="fas fa-hiking"></i>
            <span>Trip</span></a>
    </li>
    <!-- Nav Item - Rooms-->
    <li class="nav-item {{ ($title === 'Event') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/event">
            <i class="fab fa-accusoft"></i>
            <span>Event</span></a>
    </li>

    <!-- Nav Item - Commentar -->
    <li class="nav-item {{ ($title === 'Message') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard/message">
            <i class="fas fa-envelope"></i>
            <span>Message</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>