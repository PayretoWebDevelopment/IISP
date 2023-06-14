<x-layout>
    @if ($from_user->isAdmin())
        <title>Payreto | Edit Employee Information</title>
        <h1 class="text-2xl font-bold mb-4">Contact {{$employee->name}} </h1>
        <form action="/admin/contact-user/send-mail" method="POST">
            @csrf
            <input type="hidden" name="to_id" value="{{$employee->id}}">
            <div class="mb-4">
                <label for="position" class="block text-gray-700 font-bold mb-2">Your email subject:</label>
                <input type="text" name="subject" id="subject" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Place your email subject here.">
            </div>
            <div class="mb-4">
                <label for="position" class="block text-gray-700 font-bold mb-2">Your email body:</label>
                <input type="text" name="body" id="body" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Hi, {{$employee->name}}!">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save Changes</button>
                <a href="/users/profile/{{$employee->id}}" class="text-blue-500 hover:text-blue-700 font-bold">Cancel</a>
            </div>
        </form>
    </form>
    @endif
</x-layout>