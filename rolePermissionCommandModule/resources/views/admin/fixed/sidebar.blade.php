<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            @if(hasAnyPermissions('admin.dashboard'))
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.dashboard')}}">
                        <span data-feather="home"></span>
                        Dashboard
                    </a>
                </li>
            @endif
            @if(hasAnyPermissions('order.list'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('order.list')}}">
                        <span data-feather="file"></span>
                        Orders
                    </a>
                </li>
            @endif
            @if(hasAnyPermissions('product.list'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product.list')}}">
                        <span data-feather="file"></span>
                        Products
                    </a>
                </li>
            @endif
            @if(hasAnyPermissions('user.list'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.list')}}">
                        <span data-feather="file"></span>
                        Employee
                    </a>
                </li>
            @endif
            @if(hasAnyPermissions('category.list'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category.list')}}">
                        <span data-feather="file"></span>
                        Category
                    </a>
                </li>
            @endif
            @if(hasAnyPermissions('role.list'))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('role.list')}}">
                        <span data-feather="file"></span>
                        Role
                    </a>
                </li>
            @endif
        </ul>
    </div>
</nav>
