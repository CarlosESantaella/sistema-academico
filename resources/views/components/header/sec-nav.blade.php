<x-nav-link
    :href="route('secretary.index')"
    :active="request()->routeIs('secretary.index')"
    class="nav-link"
>
    Inicio
</x-nav-link>
<li class="nav-item dropdown">

    <x-nav-link
        href="#"
        :active="false"
        class="nav-link dropdown-toggle"
        role="button" 
        data-bs-toggle="dropdown"
    >
        Alumnos
    </x-nav-link>
    <ul class="dropdown-menu animate__animated animate__fadeIn">
        <li class="nav-item">
            <x-nav-link
                :href="route('secretary.search_students')"
                :active="request()->routeIs('secretary.search_students')"
                class="dropdown-item"
            >
                Buscar...
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.create_student')"
                :active="request()->routeIs('secretary.create_student')"
                class="dropdown-item"
                
            >
                Registrar Nuevo
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.registration')"
                :active="request()->routeIs('secretary.registration')"
                class="dropdown-item"
            >
                Matricula
            </x-nav-link>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.licenses_plates')"
                :active="request()->routeIs('secretary.licenses_plates')"
                class="dropdown-item"
            >
                Inscripciones por día
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.preregistrations')"
                :active="request()->routeIs('secretary.preregistrations')"
                class="dropdown-item"
            >
                Pre-inscripciones por día
            </x-nav-link>
        </li>
    </ul>
</li>
<li class="nav-item dropdown">

    <x-nav-link
        href="#"
        :active="false"
        class="nav-link dropdown-toggle"
        role="button" 
        data-bs-toggle="dropdown"
    >
        Reportes
    </x-nav-link>
    <ul class="dropdown-menu animate__animated animate__fadeIn">
        <li class="nav-item">
            <x-nav-link
                :href="route('secretary.lists-by-course')"
                :active="request()->routeIs('secretary.lists-by-course')"
                class="dropdown-item"
            >
                Listas x curso
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.list-students')"
                :active="request()->routeIs('secretary.list-students')"
                class="dropdown-item"
                
            >
                Listado de alumnos
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.students-school')"
                :active="request()->routeIs('secretary.students-school')"
                class="dropdown-item"
            >
                Estudiantes del colegio
            </x-nav-link>
        </li>
        {{-- <li>
            <hr class="dropdown-divider">
        </li> --}}
        <li>
            <x-nav-link
                :href="route('secretary.tickets-generate')"
                :active="request()->routeIs('secretary.tickets-generate')"
                class="dropdown-item"
            >
                Generador de tickets
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.advisors')"
                :active="request()->routeIs('secretary.advisors')"
                class="dropdown-item"
            >
                Asesores Titulares
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('secretary.indexes')"
                :active="request()->routeIs('secretary.indexes')"
                class="dropdown-item"
            >
                Indices
            </x-nav-link>
        </li>
    </ul>
</li>
{{-- <li class="nav-item dropdown">

    <x-nav-link
        href="#"
        :active="false"
        class="nav-link dropdown-toggle"
        role="button" 
        data-bs-toggle="dropdown"
    >
        Utilidades
    </x-nav-link>
    <ul class="dropdown-menu animate__animated animate__fadeIn">
        <li class="nav-item">
            <x-nav-link
                :href="route('admins.users')"
                :active="request()->routeIs('admins.users')"
                class="dropdown-item"
            >
                Usuarios
            </x-nav-link>
        </li>
    </ul>
</li> --}}