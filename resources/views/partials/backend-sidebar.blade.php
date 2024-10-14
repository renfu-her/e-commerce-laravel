<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="https://via.placeholder.com/36x36" alt="image" />
                    <span class="online-status online"></span> <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->role ?? 'Admin' }}
                    </p>
                </div>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.dashboard') }}">
                <i class="icon-menu menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.products.index') }}">
                <i class="icon-handbag menu-icon"></i>
                <span class="menu-title">商品管理</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.categories.index') }}">
                <i class="icon-menu menu-icon"></i>
                <span class="menu-title">分類管理</span>
            </a>
        </li>

        <!-- 更多導航項目 -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="icon-support menu-icon"></i>
                <span class="menu-title">登出</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
