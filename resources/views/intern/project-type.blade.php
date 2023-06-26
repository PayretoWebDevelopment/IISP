<x-layout module_name="Project types">
    <head>
        <title></title>

    </head>

    <body>
        <h1 class="text-3xl font-bold">Project Types Input</h1>

        <form method="post" action="/project_types">
            @csrf
            <div id="choices-container">
                <div>
                    <input type="text" name="department" placeholder="Department" />
                    <input type="text" name="name" placeholder="Name" />
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>

        <h2 class="text-3xl font-bold">Existing Project Types:</h2>
        <ul>
            @foreach ($choices as $choice)
                <li>Department: {{ $choice->department }}, Name: {{ $choice->name }}</li>
            @endforeach
        </ul>
    </body>
</x-layout>
