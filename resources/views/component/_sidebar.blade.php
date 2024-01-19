<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-4 mb-3">
            <div class="logo">
                <img class="mb-1 rounded-circle" src="{{ asset('assets') }}/img/logo.png" alt="" width="50" height="50" >
                <a href="">PPDB Shinkai</a>
            </div>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('assets') }}/img/logo.png" alt="" width="50" height="50">
        </div>
        <ul class="sidebar-menu">
            <li><a class="nav-link <?= $page == 'dashboard' ? 'active' : '' ?>" href="/"><i class="fa-solid fa-house"></i> <span>Dashboard</span></a></li>
            {{-- <li><a class="nav-link <?= $page == 'user' ? 'active' : '' ?>" href="/user"><i class="fa-solid fa-user"></i> <span>User</span></a></li> --}}
            <li class="nav-item dropdown <?= $page == 'user' || $page == 'sort-by-gender' || $page == 'sort-by-jurusan' ? 'active' : '' ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fa-solid fa-hands-holding-child"></i>
                    <span>User Management</span></a>
                <ul class="dropdown-menu">
                    <li class=" <?= $page == 'user' ? 'active' : '' ?>"><a class="nav-link" href="/user"><i class="fa-solid fa-user-gear"></i> <span>User</span></a></li>
                    <li class=" <?= $page == 'filter-by-gender' ? 'active' : '' ?>"><a class="nav-link" href="/gender"><i class="fa-solid fa-user"></i> <span>Filter by Gender</span></a></li>
                    <li class=" <?= $page == 'filter-by-jurusan' ? 'active' : '' ?>"><a class="nav-link" href="/jurusan"><i class="fa-solid fa-users"></i> <span>Filter by Jurusan</span></a></li>
                </ul>
            </li>
            {{-- <li><a class="nav-link <?= $page == 'supplier' ? 'active' : '' ?>" href="/supplier"><i class="fa-solid fa-box"></i> <span>Supplier</span></a></li>
            <li><a class="nav-link <?= $page == 'project' ? 'active' : '' ?>" href="/project"><i class="fas fa-project-diagram" style="color: #000000;"></i> <span>Project</span></a></li> --}}
        </ul>
    </aside>
</div>
