<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route("panel.home") }}" class="simple-text logo-normal">
            {{ strtoupper(trans('panel.title')) }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{ route("panel.home") }}">
                    <i class="material-icons">home</i>
                    <p>{{ trans('panel.menu.home') }}</p>
                </a>
            </li>
{{--            <li class="nav-item">
                <a class="nav-link" href="{{ route("panel.pf.index") }}">
                    <i class="material-icons">account_box</i>
                    <p>{{ trans('panel.menu.personal_file') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route("panel.application.index") }}">
                    <i class="material-icons">account_box</i>
                    <p>{{ trans('panel.menu.application') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route("panel.curators") }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ trans('panel.menu.curators') }}</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="">
                    <i class="material-icons">library_books</i>
                    <p>Typography</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                    <i class="material-icons">bubble_chart</i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                    <i class="material-icons">location_ons</i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./rtl.html">
                    <i class="material-icons">language</i>
                    <p>RTL Support</p>
                </a>
            </li>
            <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>--}}
        </ul>
    </div>
</div>
