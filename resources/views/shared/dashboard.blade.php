<x-layout module_name="Dashboard">
    <title>Payreto | User Dashboard</title>
    @auth
    <li>
        <span class="font-bold uppercase">
            Welcome {{auth()->user()->name}}
        </span>
    </li>
    @endauth
</x-layout>


