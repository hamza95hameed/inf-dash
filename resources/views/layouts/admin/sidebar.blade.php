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
                    <span>{{ __('messages.dashboard') }}</span>
                </a>
            </li>
            @unless (auth()->user()->is_admin == 0)                
                <li class="dropdown {{ request()->segment(1) == 'users' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>{{ __('messages.users') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('users.index') }}">{{ __('messages.list') }}</a></li>
                        <li><a class="nav-link" href="{{ route('users.create') }}">{{ __('messages.add')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'discounts' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-percentage"></i><span>{{ __('messages.discounts') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('discounts.index') }}">{{ __('messages.list') }}</a></li>
                        <li><a class="nav-link" href="{{ route('discounts.create') }}">{{ __('messages.add')}}</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'orders' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cart-arrow-down"></i><span>{{ __('messages.orders') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('orders.index') }}">{{ __('messages.list') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'withdraws' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-alt"></i><span>{{ __('messages.withdraws') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('withdraws.index') }}">{{ __('messages.historical') }}</a></li>
                    </ul>
                </li>
            @endunless
            @unless (auth()->user()->is_admin == 1)
                <li class="dropdown {{ request()->segment(1) == 'discounts' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-percentage"></i><span>{{ __('messages.discounts') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('discounts.index') }}">{{ __('messages.list') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'orders' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-cart-arrow-down"></i><span>{{ __('messages.orders') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('orders.index') }}">{{ __('messages.list') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ request()->segment(1) == 'withdraws' ? 'active': ''}}">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-money-bill-alt"></i><span>{{ __('messages.withdraws') }}</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ route('withdraws.index') }}">{{ __('messages.historical') }}</a></li>
                        <li><a class="nav-link" href="{{ route('withdraws.create') }}">{{ __('messages.withdraw-request')}}</a></li>
                    </ul>
                </li>
            @endunless
        </ul>
    </aside>
</div>
