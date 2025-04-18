<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}" class="logo">
                <img src="{{ asset('backend/assets/img/dfl-cs-logo.png') }}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->is('admin.dahboard') ? 'active' : '' }}">

                        <a data-bs-toggle="xcollapse" href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <p>Dashboard</p>
                        </a>
                </li>
                <hr>

                 <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>

                <li class="nav-item {{ request()->is('posts*') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse" href="#base"
                            aria-expanded="{{ request()->is('posts*') ? 'true' : 'false' }}">
                            <i class="fas fa-address-book"></i>
                            <p>Posts</p>
                            <span class="caret"></span>
                        </a>



                    <div class="collapse {{ request()->is('admin.posts*') || request()->routeIs('admin.posts.index') || request()->routeIs('admin.posts.create') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">

                                <li class="{{ request()->routeIs('admin.posts.index') ? 'active' : '' }}">
                                    <a href="{{ route('admin.posts.index') }}"
                                        class="nav-link">
                                        <span class="sub-item">List</span>
                                    </a>
                                </li>
                            <li class="{{ request()->routeIs('admin.posts.create') ? 'active' : '' }}">
                                    <a href="{{ route('admin.posts.create') }}"
                                        class="nav-link">
                                        <span class="sub-item">Create</span>
                                    </a>
                                </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
