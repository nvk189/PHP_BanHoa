<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">FLOWERSHOP</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a id="nav-item" class="nav-link " href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Trang chủ</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Chuc nang
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item ">
        <a id="nav-item" class="nav-link " href="/order">
            <i class="fas fa-shopping-cart"></i>
            <span class="  ">Đặt hàng</span>
        </a>

    </li>
    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/type">
            <i class="fas fa-boxes"></i>
            <span>Loại sản phẩm</span>
        </a>

    </li>
    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/products">
            <i class="fas fa-barcode"></i>
            <span> sản phẩm</span>
        </a>

    </li>
    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/customer">
            <i class="fas fa-users"></i>
            <span class="">Khách hàng</span>
        </a>

    </li>
    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/users">
            <i class="fas fa-users"></i>
            <span class="">Tài khoản</span>
        </a>

    </li>
    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/suppliers">
            <i class="fas fa-truck"></i>
            <span>Nhà cung cấp</span>
        </a>

    </li>

    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/import">
            <i class="fas fa-file-import"></i>
            <span>Nhập hàng</span>
        </a>

    </li>
    <li class="nav-item">
        <a id="nav-item" class="nav-link " href="/thongke">
            <i class="fas fa-fw fa-cog"></i>
            <span>Thống kê</span>
        </a>

    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->

    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <script>
        function toggleSidebar() {
            const navItems = document.getElementById("nav-item");
            for (const navItem of navItems) {
                navItem.addEventListener("click", function() {
                    navItems.forEach((item) => item.classList.remove("active"));
                    this.classList.add("active");
                });
            }
        }
        toggleSidebar()
    </script>

</ul>