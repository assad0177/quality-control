<ul class="nav flex-column pt-3 pt-md-0">
    @if(Illuminate\Support\Str::contains(Route::currentRouteName(),'client'))
            <li class="nav-item">
                <a href="{{ route('client.dashboard') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon me-2">
                        <img src="{{ asset('assets/images/quality-control.jpeg') }}" height="30" width="35" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">
                        Quality Control
                    </span>
                </a>
            </li>
            <li class="nav-item bt-1 {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
                <a href="{{ route('client.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Jobs') }}</span>
                </a>
            </li>

            <li class="nav-item bt-1 {{ request()->routeIs('client.dashboard') ? 'active' : '' }}">
                <a href="{{ route('client.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Invoices') }}</span>
                </a>
            </li>
    @elseif(Illuminate\Support\Str::contains(Route::currentRouteName(),'terminal'))
            <li class="nav-item">
                <a href="{{ route('terminal.dashboard') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon me-2">
                        <img src="{{ asset('assets/images/quality-control.jpeg') }}" height="30" width="35" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">
                        Quality Control
                    </span>
                </a>
            </li>

            <li class="nav-item bt-1 {{ request()->routeIs('terminal.dashboard') ? 'active' : '' }}">
                <a href="{{ route('terminal.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Dashboard') }}</span>
                </a>
            </li>

            <li class="nav-item bt-1 {{ request()->routeIs('terminal.dashboard') ? 'active' : '' }}">
                <a href="{{ route('terminal.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Job History') }}</span>
                </a>
            </li>

    @else
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon me-2">
                        <img src="{{ asset('assets/images/quality-control.jpeg') }}" height="30" width="35" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">
                        Quality Control
                    </span>
                </a>
            </li>

            <li class="nav-item bt-1 {{ request()->routeIs('plan.index') ? 'active' : '' }}">
                <a href="{{ route('plan.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Plan') }}</span>
                </a>
            </li>
            <li class="nav-item bt-1 {{ request()->routeIs('test.index') ? 'active' : '' }}">
                <a href="{{ route('test.index') }}" class="nav-link">
                    <span class="sidebar-icon">
                        <i class="fa fa-list" aria-hidden="true"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Test') }}</span>
                </a>
            </li>
            <li class="nav-item bt-1 {{ request()->routeIs('users.index') ? 'active' : '' }}">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <span class="sidebar-icon me-3">
                        <i class="fas fa-user-alt fa-fw"></i>
                    </span>
                    <span class="sidebar-text">{{ __('Users') }}</span>
                </a>
            </li>
    @endif
</ul>
