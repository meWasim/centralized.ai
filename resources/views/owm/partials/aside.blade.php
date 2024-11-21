<aside id="sidebar" class="sidebar d-flex flex-column justify-content-between">
    <!-- Top Sidebar Menu -->
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-house-door-fill"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#management-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-kanban-fill"></i>
                <span>Management</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="management-nav"
                class="nav-content collapse {{ request()->routeIs('hr.*') || request()->routeIs('company.*') ? 'show' : '' }}"
                data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('hr.index') }}" class="{{ request()->routeIs('hr.*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>HR Management</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('company.index') }}"
                        class="{{ request()->routeIs('company.*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i><span>Company Management</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- End Management Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#social-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-globe-central-south-asia"></i>
                <span>Social</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="social-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Facebook</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Instagram</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Email</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>LinkedIn</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>WhatsApp</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Social Nav -->

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('github.*') ? '' : 'collapsed' }}" href="{{route('github.dashboard')}}">
                <i class="bi bi-github"></i>
                <span>Github</span>
            </a>
        </li><!-- End Github Nav -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#ai-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cpu-fill"></i>
                <span>AI</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="ai-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="components-alerts.html">
                        <i class="bi bi-circle"></i><span>Chat GPT</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Geminie</span>
                    </a>
                </li>
                <li>
                    <a href="components-accordion.html">
                        <i class="bi bi-circle"></i><span>Copilot</span>
                    </a>
                </li>
            </ul>
        </li><!-- End AI Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person-workspace"></i>
                <span>Jobs</span>
            </a>
        </li><!-- End Jobs Nav -->


    </ul><!-- End Top Sidebar Menu -->

    <!-- Bottom Sidebar Menu -->
    <ul class="sidebar-nav mt-auto">
        @guest
            <!-- Show when user is not authenticated -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-card-list"></i>
                    <span>Register</span>
                </a>
            </li><!-- End Register Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Login</span>
                </a>
            </li><!-- End Login Nav -->
        @endguest

        @auth
            <!-- Show when user is authenticated -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="#" method="POST" class="d-none">
                    @csrf
                </form>
            </li><!-- End Logout Nav -->
        @endauth
    </ul>

</aside>
