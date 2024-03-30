<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link active" href="{{ url('/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#inquiry-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Inquiry Module</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inquiry-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('inquires.index') }}">
                        <i class="bi bi-circle"></i><span>Inquiry</span>
                    </a>
                </li>
            </ul>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#roles-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Roles & Permissions </span></span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="roles-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('roles.index') }}">
                        <i class="bi bi-circle"></i><span>Roles</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('permissions.index') }}">
                        <i class="bi bi-circle"></i><span>Permissions</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Student Module</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('students.index') }}">
                        <i class="bi bi-circle"></i><span>All Students</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('students.create') }}">
                        <i class="bi bi-circle"></i><span>Student Registeration</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Fee Module <span class="badge bg-primary">New</span></span></span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('get-fee') }}">
                        <i class="bi bi-circle"></i><span>Student Fee</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('generate-invoice') }}">
                        <i class="bi bi-circle"></i><span>Generate Invoice</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#subject-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Subject Module <span class="badge bg-primary">New</span></span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="subject-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('subjects.index') }}">
                        <i class="bi bi-circle"></i><span>All Subjects</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
