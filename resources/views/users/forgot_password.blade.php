<title>Payreto IISP | Login</title>

<head>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
</head>

<body>
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img class="w-auto h-15 sm:h-14" src="{{ asset('images/logo.png') }}" alt="PayretoLogo">
                        </div>

                        <p class="mt-3 text-gray-500">Enter your email address to receive a password reset prompt</p>
                    </div>

                    <div class="mt-8">
                        <form method="POST" action="/users/forgot/send_mail">
                            @csrf
                            <div class="m-5">
                                <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                                <input type="email" name="email" id="email" placeholder="Your email"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg"
                                    value="{{ old('email') }}" />

                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="m-5">
                                <label for="name" class="block mb-2 text-sm text-gray-600">Your Name</label>
                                <input type="text" name="name" id="name" placeholder="Your name"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg"
                                    value="{{ old('name') }}" />

                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <br>

                            <button type="submit"
                                class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                Submit </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url(https://www.payreto.com/wp-content/uploads/2021/03/Homepage-1.png)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">IISP</h2>

                        <p class="max-w-xl mt-3 text-gray-300">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. In
                            autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam temporibus
                            molestiae
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
