<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ Request::root() }}" class="brand-link">
        <img src="logo/logo.png?v={{time()}}" alt="Logo" class="brand-image">
        <span class="brand-text font-weight-light">{{ parse_url(Request::root())['host'] }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="logo/logo.png?v={{time()}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="admincp/account/edit/{{ Auth::user()->id }}" class="d-block">
                    <i class="fas fa-user-edit"></i> {{ Auth::user()->name }}
                </a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="{{__('admin.search')}}" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="admincp" class="nav-link" id="dashboard">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Admin control panel</p>
                    </a>
                </li>
                @if ( Auth::user()->hasAnyRole(['super-admin']) )
                    <li class="nav-item">
                        <a href="admincp/account" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>{{__('admin.account')}}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admincp" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                {{__('admin.decentralization')}}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="admincp/modelroles" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('admin.role')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="admincp/role_permission" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{__('admin.permission')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="admincp/categories" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admincp/posts" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Posts</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
