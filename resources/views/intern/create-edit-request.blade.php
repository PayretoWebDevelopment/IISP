<x-layout>
<h1>Request Edit for {{ $user->name }}</h1>

<form action="/users/profile/create-edit-request" method="POST">
    @csrf

    <input type="hidden" name="user_id" value="{{ $user->id }}">

    <div class="form-group">
        <label for="reason">Reason for edit request:</label>
        <textarea name="reason" id="reason" rows="5" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Send Edit Request</button>
</form>
</x-layout>
