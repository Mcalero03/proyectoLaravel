<div class="hidden space-x-8 sm; -my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"> 
    {{ __('Dashboard') }}
    </x-nav-link> 
     <x-nav-link :href="route('proyectos.index')" :active="request()->routeIs('proyectos.index')"> 
    {{ __('Proyectos') }}
    </x-nav-link>
</div> 
