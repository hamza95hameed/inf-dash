<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/dashboard"><img src="{{ asset('assets/img/logo.png') }}" alt="akhaia cosmetics" width="75%" height="auto"></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/dashboard">AC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ request()->segment(1) == 'dashboard' ? 'active': ''}}">
                <a class="nav-link" href="/dashboard">
                    <span>Dashboard</span>
                </a>
            </li>
            @unless (auth()->user()->is_admin == 0)                
                <li class="dropdown {{ request()->segment(1) == 'users' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Users</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('users.index') }}">List</a></li>
                        <li><a class="nav-link" href="{{ route('users.create') }}">Add</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'discounts' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-percentage"></i><span>Discounts</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('discounts.index') }}">List</a></li>
                        <li><a class="nav-link" href="{{ route('discounts.create') }}">Add</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'orders' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-percentage"></i><span>Orders</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('orders.index') }}">List</a></li>
                    </ul>
                </li>
            @endunless
            @unless (auth()->user()->is_admin == 1)
                <li class="dropdown {{ request()->segment(1) == 'orders' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-percentage"></i><span>Orders</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('orders.index') }}">List</a></li>
                    </ul>
                </li>
            @endunless
        </ul>
    </aside>
</div>
