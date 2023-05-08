<x-layout>
    <title>Payreto | User Dashboard</title>
    @auth
    <li>
        <span class="font-bold uppercase">
            Welcome {{auth()->user()->name}}
        </span>
    </li>
    @endauth
</x-layout>


