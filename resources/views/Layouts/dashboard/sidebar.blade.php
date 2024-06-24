<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="dashboard">
            {{-- <img src="images/logo_3.png" class="img-fluid" alt=""> --}}
            <span>EmployeeHub</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="
                @if (request()->url() == route('dashboard')) active @endif">
                    <a href="dashboard" class="iq-waves-effect collapsed">
                        <i class="ri-dashboard-line"></i><span>Dashboard</span></a>
                </li>
                <li class="
                @if (request()->url() == route('employees.index')) active @endif">
                    <a href="employees" class="iq-waves-effect collapsed">
                        <i class="ri-file-list-line"></i><span>Employees</span></a>
                </li>
                @if (Auth::user()->role == 'admin')
                    <li class="
                @if (request()->url() == route('employees.details')) active @endif">
                        <a href="details" class="iq-waves-effect collapsed">
                            <i class="ri-profile-line"></i><span>Employee Details</span></a>
                    </li>
                @endif
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>
