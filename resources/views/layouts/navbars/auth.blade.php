<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            {{ __('RSUD CIRACAS') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('User') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <li class="{{ $elementActive == 'banner' ? 'active' : '' }}">
                <a href="{{ route('banner.index') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Banner') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'role' ? 'active' : '' }}">
                <a href="{{ route('role.index') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('User Role') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'modul' ? 'active' : '' }}">
                <a href="{{ route('modul.index') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Modul') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'akses_modul' ? 'active' : '' }}">
                <a href="{{ route('akses.index') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Akses Modul') }}</p>
                </a>
            </li>
            <!-- <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li> -->
        </ul>
    </div>
</div>