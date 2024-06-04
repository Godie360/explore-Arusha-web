<li><a href="{{ route('web.index') }}" class="{{ request()->routeIs('web.index') ? 'active' : '' }}">Home</a></li>
<li><a href="#">Explore</a></li>
<li class="has-submenu {{ request()->routeIs('web.vendor.*') ? 'active' : '' }}">
    <a href>Vendors <i class="fas fa-chevron-down"></i></a>
    <ul class="submenu">
        <li><a href="{{ route('web.vendor.registration.index') }}">Registration</a></li>
        <li><a href="#">Verification</a></li>
    </ul>
</li>
<li><a href="#" class="{{ request()->routeIs('') ? 'active' : '' }}">Listing</a></li>
<li><a href="{{ route('web.news.index') }}" class="{{ request()->routeIs('web.news.*') ? 'active' : '' }}">News</a></li>
<li><a href="{{ route('web.complaints.index') }}"
        class="{{ request()->routeIs('web.complaints.*') ? 'active' : '' }}">Complaints</a>
</li>
<li><a href="{{ route('web.contact_us') }}"
        class="{{ request()->routeIs('web.contact_us') ? 'active' : '' }}">Contacts</a>
</li>
