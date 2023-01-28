<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-light sidebar-left sidebar-p-t" data-perfect-scrollbar>
            <div class="sidebar-heading">Menu</div>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item {{ Route::is('backend.index') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" href="{{ route('backend.index') }}">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">Dashboards</span>
                    </a>
                </li>
                <!-- post section start-->
                <li class="sidebar-menu-item {{ Route::is('backend.category*') || Route::is('backend.post*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#post_menu">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pets</i>
                        <span class="sidebar-menu-text">Post & Category</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse show " id="post_menu">
                        <li class="sidebar-menu-item {{ Route::is('backend.post.index') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.post.index') }}">
                                <span class="sidebar-menu-text">All Post</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Route::is('backend.post.create') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.post.create') }}">
                                <span class="sidebar-menu-text">Create Post</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Route::is('backend.category.index') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.category.index') }}">
                                <span class="sidebar-menu-text">Category</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item ">
                            <a class="sidebar-menu-button" href="{{ route('backend.tag.index') }}">
                                <span class="sidebar-menu-text">Tags</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- post section  end-->
                <!-- all users start-->
                <li class="sidebar-menu-item {{ Route::is('backend.users.*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#users">
                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">pets</i>
                        <span class="sidebar-menu-text">Users</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse show " id="users">
                        <li
                            class="sidebar-menu-item {{ Route::is('backend.users.index') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.users.index') }}">
                                <span class="sidebar-menu-text">All Users</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Route::is('backend.users.create') ? 'active' : '' }} ">
                            <a class="sidebar-menu-button" href="{{ route('backend.users.create') }}">
                                <span class="sidebar-menu-text">Create User</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Route::is('backend.users.trash') ? 'active' : '' }} ">
                            <a class="sidebar-menu-button" href="{{ route('backend.users.trash') }}">
                                <span class="sidebar-menu-text">Trash User</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- all users end-->

                <!-- role and Permission section start-->
                <li class="sidebar-menu-item {{ Route::is('backend.role.*') ? 'active open' : '' }}">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#role_permission">
                        <i
                            class="sidebar-menu-icon sidebar-menu-icon--left material-icons">assignment_ind</i>
                        <span class="sidebar-menu-text"> Role & Permission</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse show " id="role_permission">
                        <li
                            class="sidebar-menu-item {{ Route::is('backend.role.index') ? 'active open' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.role.index') }}">
                                <span class="sidebar-menu-text">All Roles</span>
                            </a>
                        </li>
                        <li
                            class="sidebar-menu-item {{ Route::is('backend.role.create') ? 'active open' : '' }}">
                            <a class="sidebar-menu-button" href="{{ route('backend.role.create') }}">
                                <span class="sidebar-menu-text">Create Role</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- users permission section end-->
            </ul>
            <div class="d-flex align-items-center sidebar-p-a border-bottom sidebar-account">
                <a href="profile.html"
                    class="flex d-flex align-items-center text-underline-0 text-body">
                    <span class="avatar avatar-sm mr-2">
                        @if (auth()->user()->image == true)
                        <img  class="rounded-circle" width="40" height="40" src="{{ asset('storage/users/'.auth()->user()->image) }}" alt="{{ auth()->user()->name }}">

                        @else
                        <img src="{{ Avatar::create(auth()->user()->name)->setDimension(30)->setFontSize(15)->toBase64() }}" alt="{{ auth()->user()->name }}">

                        @endif
                    </span>
                    <span class="flex d-flex flex-column">
                        <strong>{{ auth()->user()->name }}</strong>
                        <small class="text-muted text-uppercase">
                            @foreach (auth()->user()->roles as $role)
                                <span class="badge bg-info text-light">{{ $role->name }}</span>
                            @endforeach
                        </small>
                    </span>
                </a>
                <div class="dropdown ml-auto">
                    <a href="#" data-toggle="dropdown" data-caret="false"
                        class="text-muted"><i class="material-icons">more_vert</i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-item-text dropdown-item-text--lh">
                            <div><strong>{{ auth()->user()->name }}</strong></div>
                            <div>{{ auth()->user()->email }}</div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item active"
                            href="{{ route('backend.index') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('backend.login.user.show') }}"><i
                                class="material-icons">account_circle</i> My profile</a>
                        <a class="dropdown-item" href="{{ route('backend.login.user.show') }}"><i
                                class="material-icons">edit</i> Edit account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i
                                class="material-icons">exit_to_app</i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
