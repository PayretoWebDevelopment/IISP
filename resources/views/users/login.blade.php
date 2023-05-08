<title>Payreto | Login</title>

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
    <p class="mb-4">Log into your account</p>
</header>

<form method="POST" action="/users/authenticate">
    @csrf

    <div class="mb-6">
        <label for="username" class="inline-block text-lg mb-2">Username</label>
        <input type="username" class="border border-gray-200 rounded p-2 w-full" name="username" value="{{ old('username') }}" />

        @error('username')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
            Password
        </label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" value="{{ old('password') }}" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Sign In
        </button>
    </div>

    <div class="mt-8">
        <p>
            Forgot your password?
            <a href="/">Notify Us</a>
        </p>
    </div>
</form>
