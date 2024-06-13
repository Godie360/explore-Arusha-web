<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="index.html">
                <img src="{{ asset('arusha-logo.png') }}" class="img-fluid logo" alt />
            </a>
            <a href="index.html">
                <img src="{{ asset('arusha-logo.png') }}" class="img-fluid logo-small" alt />
            </a>
        </div>
        <div class="siderbar-toggle">
            <label class="switch" id="toggle_btn">
                <input type="checkbox" />
                <span class="slider round"></span>
            </label>
        </div>
    </div>
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title m-0">
                    <h6>Home</h6>
                </li>

                <li>
                    <a href="{{ route('admin.dashboard.index') }}"
                        class="{{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}"><i
                            class="fe fe-grid"></i>
                        <span>Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"
                        class="{{ request()->routeIs(['admin.news.*', 'admin.news-categories.*']) ? ' subdrop' : '' }}"><i
                            class="fe fe-file-text"></i>
                        <span>News & Updates</span>
                        <span class="menu-arrow"><i class="fe fe-chevron-right"></i></span>
                    </a>
                    <ul
                        style="display:{{ request()->routeIs(['admin.news.*', 'admin.news-categories.*']) ? 'block' : 'none' }}; !important">
                        <li>
                            <a href="{{ route('admin.news.index') }}"
                                class="{{ request()->routeIs(['admin.news.index', 'admin.news.edit', 'admin.news.show']) ? 'active' : '' }}">All
                                News</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.news.create') }}"
                                class="{{ request()->routeIs(['admin.news.create']) ? 'active' : '' }}">Add News</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.news-categories.index') }}"
                                class="{{ request()->routeIs('admin.news-categories.*') ? 'active' : '' }}">Categories</a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i
                            class="fe fe-log-out"></i> <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
