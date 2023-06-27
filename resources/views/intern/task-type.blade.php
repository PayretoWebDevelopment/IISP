<x-layout module_name="Task types">
    <head>
        <title></title>

    </head>

    <body>
        <h1 class="text-3xl font-bold">Task Types Input</h1>

        <form method="post" action="/task-types">
            @csrf
            <div id="choices-container">
                <div>
                    <input type="text" name="name" placeholder="Name" />
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>

        <h2 class="text-3xl font-bold">Existing Task Types:</h2>
        <ul>
            @foreach ($choices as $choice)
                <li>{{ $choice->name }}</li>
            @endforeach
        </ul>
    </body>
</x-layout>
