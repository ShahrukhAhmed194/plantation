
    
<!-- Sidebar Start -->
<aside class="left-sidebar">
<!-- Sidebar scroll-->
<div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
    <a href="/home" class="text-nowrap logo-img">
        <img src="{{ asset('assets/modernize/images/logos/dark-logo.svg')}}" class="dark-logo"  width="180" alt="" />
    </a>
    <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
    </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
    <ul id="sidebarnav">
        <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
            <a href="{{url('/home')}}" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                <i class="ti ti-gift"></i>
                </div>
                <span class="hide-menu">New</span>
            </a>
            </li>
            <li class="sidebar-item">
            <a href="{{url('/request/user-personal')}}" class="sidebar-link">
                <div class="round-16 d-flex align-items-center justify-content-center">
                <i class="ti ti-list"></i>
                </div>
                <span class="hide-menu">List</span>
            </a>
            </li>
        </ul>
    </ul>
    </nav>
    <div class="fixed-profile p-3 bg-light-secondary rounded sidebar-ad mt-3">
    <div class="hstack gap-3">
        <div class="john-img">
        <img src="{{ asset('assets/modernize/images/profile/user-1.jpg')}}" class="rounded-circle" width="40" height="40" alt="">
        </div>
        <div class="john-title">
        <h6 class="mb-0 fs-4 fw-semibold">{{auth()->user()->name}}</h6>
        <span class="fs-2 text-dark">{{auth()->user()->type}}</span>
        </div>
        <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
        <i class="ti ti-power fs-6"></i>
        </button>
    </div>
    </div>  
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
<!--  Main wrapper -->
<div class="body-wrapper">
<!--  Header Start -->
<header class="app-header"> 
    <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
            <i class="ti ti-menu-2"></i>
        </a>
        </li>
    </ul>
    <div class="d-block d-lg-none">
        <img src="{{ asset('assets/modernize/images/logos/dark-logo.svg')}}" class="dark-logo" width="180" alt="" />
        <img src="{{ asset('assets/modernize/images/logos/light-logo.svg')}}" class="light-logo"  width="180" alt="" />
    </div>
    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="p-2">
        <i class="ti ti-dots fs-7"></i>
        </span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <div class="d-flex align-items-center justify-content-between">
        <a href="javascript:void(0)" class="nav-link d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
            <i class="ti ti-align-justified fs-7"></i>
        </a>
        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
            
            <li class="nav-item dropdown">
            <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="d-flex align-items-center">
                <div class="user-profile-img">
                    <img src="{{ asset('assets/modernize/images/profile/user-1.jpg')}}" class="rounded-circle" width="35" height="35" alt="" />
                </div>
                </div>
            </a>
            <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="profile-dropdown position-relative" data-simplebar>
                <div class="py-3 px-7 pb-0">
                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                </div>
                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                    <img src="{{ asset('assets/modernize/images/profile/user-1.jpg')}}" class="rounded-circle" width="80" height="80" alt="" />
                    <div class="ms-3">
                    <h5 class="mb-1 fs-3">{{auth()->user()->name}}</h5>
                    <span class="mb-1 d-block text-dark">De{{auth()->user()->type}}signer</span>
                    <p class="mb-0 d-flex text-dark align-items-center gap-2">
                        <i class="ti ti-mail fs-4"></i> {{auth()->user()->email}}
                    </p>
                    </div>
                </div>
                <div class="d-grid py-4 px-7 pt-8">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Logout</button>
                    </form>
                </div>
                </div>
            </div>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</header>
<!--  Header End -->
</div>