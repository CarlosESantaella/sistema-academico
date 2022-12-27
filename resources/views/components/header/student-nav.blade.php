<x-nav-link :href="route('students.edit', ['student' => auth()->user()->clave])" :active="request()->routeIs('students.edit')" class="nav-link">
    Inicio
</x-nav-link>
<x-nav-link :href="route('students.certs')" :active="request()->routeIs('students.certs')" class="nav-link">
    Certificados
</x-nav-link>
