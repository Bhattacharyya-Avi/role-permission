<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.role.list')}}">
                    <span data-feather="file"></span>
                    Roles
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('permission.list')}}">
                    <span data-feather="file"></span>
                    Permission
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('assign.permission.list')}}">
                    <span data-feather="file"></span>
                    Assign permission
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('user.list')}}">
                    <span data-feather="file"></span>
                    User list
                </a>
            </li>

            @if(hasAnyPermission('create.product'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('create.product')}}">
                        <span data-feather="file"></span>
                        create product
                    </a>
                </li>
            @endif

            @if (hasAnyPermission('view.product'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('view.product')}}">
                        <span data-feather="file"></span>
                        view product
                    </a>
                </li>
            @endif

        </ul>

    </div>
</nav>
