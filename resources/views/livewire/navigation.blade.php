<div class="header header-light head-shadow">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape ">
            <div class="nav-header ">
                <a class="nav-brand ms-0" href="{{ route('home') }}"  wire:navigate>
                    <img src="{{ asset('images/real-estate-logo-design-vector.jpg') }}" class="logo" alt="">
                </a>

                <div class="mobile_nav">
                    <ul>
                        <li class="list-buttons">
                            <a href="{{ route('create.estate') }}"  wire:navigate><i class="fas fa-user-alt me-2"></i>Register Property</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">

                <ul class="nav-menu nav-menu-social align-to-right">
                    <li class="list-buttons ms-2">
                        <a href="{{ route('create.estate') }}"  wire:navigate><i class="fas fa-user-alt me-2"></i>Register Property</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

