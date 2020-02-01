<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            R&AS PANEL
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('panel.index') }}">
            <i class="fas fa-fw fa-clipboard-list"></i>
            <span>Главная</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @foreach($panelMenuCategories as $category)
        <div class="sidebar-heading">
            {{ $category->title }}
        </div>

        @foreach($category->components as $component)
            <li class="nav-item">
                @if(count($component->items) > 0)
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse_{{  md5($component->title) }}" aria-expanded="true" aria-controls="collapse_{{  md5($component->title) }}">
                        <i class="fas fa-fw {{ $component->icon }}"></i>
                        <span>{{ $component->title }}</span>
                    </a>
                    <div id="collapse_{{  md5($component->title) }}" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">{{ $component->description }}</h6>
                            @foreach($component->items as $item)
                                <a class="collapse-item" href="{{ route($item->route) }}">{{ $item->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a class="nav-link" href="{{ route($component->route) }}">
                        <i class="fas fa-fw {{ $component->icon }}"></i>
                        <span>{{ $component->title }}</span>
                    </a>
                @endif
            </li>
        @endforeach
        <hr class="sidebar-divider">
    @endforeach

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->


{{--
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p class="d-lg-none d-md-block">
                            Stats
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        @if(count($user->unreadNotifications )>0)
                            <span class="notification">{{ count($user->unreadNotifications) }}</span>
                        @endif
                        <p class="d-lg-none d-md-block">
                            Some Actions
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @if(count($user->unreadNotifications)>0)
                            @foreach($user->unreadNotifications as $notification)
                                <a class="dropdown-item" href="{{ route("panel.home") }}">{{ trans($notification->data['title']).', '.trans($notification->data['author']) }}</a>
                            @endforeach
                        @else
                            <a class="dropdown-item" href="#">{{ trans('panel.notifications.no_unread') }}</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">person</i>
                        <p class="d-lg-none d-md-block">
                            Account
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>--}}
