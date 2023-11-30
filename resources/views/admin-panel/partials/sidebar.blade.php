<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('admin-assets/images/logo.png') }}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin-assets/images/logo-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('admin-assets/images/logo-dark.png') }}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('admin-assets/images/logo-dark-sm.png') }}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{ route('admin.account.edit', Auth::user()->name) }}">
                <img src="{{ asset('admin-assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">{{ Auth::user()->name }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.banner.index') }}" class="side-nav-link">
                    <i class="ri-image-line"></i>
                    <span> Banner </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.about') }}" class="side-nav-link">
                    <i class="ri-image-line"></i>
                    <span> Haqqımızda </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebar-services" class="side-nav-link">
                    <i class="ri-customer-service-2-fill"></i>
                    <span> Xidmətlər </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebar-services">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.services.index') }}">Əsas Məzmun</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.service-contents.index') }}">Alt Məzmun</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebar-projects" class="side-nav-link">
                    <i class="ri-todo-line"></i>
                    <span> Layihələr </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebar-projects">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.project-categories.index') }}">Kateqoriyalar</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.projects.index') }}">Layihələr</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.customers.index') }}" class="side-nav-link">
                    <i class="ri-team-fill"></i>
                    <span> Müştərilər </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.menu.index') }}" class="side-nav-link">
                    <i class="ri-team-fill"></i>
                    <span> Menyu </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebar-career" class="side-nav-link">
                    <i class="ri-file-user-line"></i>
                    <span> Karyera </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebar-career">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.vacancy.index') }}">Vakansiyalar</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.applications.index')}}">Müraciətlər</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.messages.index') }}" class="side-nav-link">
                    <i class="ri-chat-3-fill"></i>
                    <span> Mesajlar </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.settings') }}" class="side-nav-link">
                    <i class="ri-settings-2-line"></i>
                    <span> Tənzimləmələr </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.users.index') }}" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> İstifadəçilər </span>
                </a>
            </li>





        </ul>
        <!--- End Sidemenu -->

    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
