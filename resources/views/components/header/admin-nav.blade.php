<x-nav-link
    :href="route('admins.index')"
    :active="request()->routeIs('admins.index')"
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
                href="#"
                :active="false"
                class="dropdown-item"
            >
                Buscar...
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                href="#"
                :active="false"
                class="dropdown-item"

            >
                Registrar Nuevo
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                href="#"
                :active="false"
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
                :href="route('admins.lp')"
                :active="request()->routeIs('admins.lp')"
                class="dropdown-item"
            >
                Inscripciones por día
            </x-nav-link>
        </li>
    </ul>
</li>