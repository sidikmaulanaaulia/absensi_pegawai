<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="">Logout</button>
</form>
<a href="{{ route('profile.edit') }}">Profile</a>
