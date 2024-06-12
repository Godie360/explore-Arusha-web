<!DOCTYPE html>
<html lang="en">
<x-admin.head-component />
<body>
    <div class="main-wrapper">
        <x-admin.header-component />
        <x-admin.side-menu-component />
        <div class="page-wrapper">
            {{ $slot }}
        </div>
    </div>
    <div id="overlayer">
        <span class="loader">
            <span class="loader-inner"></span>
        </span>
    </div>
    <x-admin.scripts-component />


</body>

</html>
