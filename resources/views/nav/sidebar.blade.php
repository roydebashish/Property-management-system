<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> --}}
        <div class="sidebar-brand-text mx-3">Mugneu Global</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   
    <div class="sidebar-heading">Sales & Expense</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-sale" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-handshake"></i>
            <span>Sale</span>
        </a>
        <div id="menu-sale" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('sales.create') }}">Sales Entry</a>
                <a class="collapse-item" href="{{ route('sales.index') }}">Sales</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-expense" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-money-bill-wave"></i>
            <span>Expense</span>
        </a>
        <div id="menu-expense" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('expenses.create') }}">Expense Entry</a>
                <a class="collapse-item" href="{{ route('expenses.index') }}">Expenses</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Manage</div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-wrench"></i>
            <span>Configuraltion</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Manage</h6>
                <a class="collapse-item" href="{{ route('countries.index') }}">Country</a>
                <a class="collapse-item" href="{{ route('property.index') }}">Property</a>
                <a class="collapse-item" href="{{ route('expenseType.index') }}">Expense Type</a>
                <a class="collapse-item" href="{{ route('units.index') }}">Units</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">Users & Members</div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-user" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-user-friends"></i>
            <span>Users</span>
        </a>
        <div id="menu-user" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('users.create') }}">Add User</a>
                <a class="collapse-item" href="{{ route('users.index') }}">Users</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu-member" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Members</span>
        </a>
        <div id="menu-member" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('members.create') }}">Add Member</a>
                <a class="collapse-item" href="{{ route('members.index') }}">Members</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->