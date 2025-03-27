<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
	<!-- resources/views/layouts/app.blade.php or another Blade file -->

	@if (Auth::check())
    	<!-- If the user is logged in, show the logout link -->
	    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
	        Logout
	    </a>

	    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	        @csrf
	    </form>
	@endif


    <h1>Welcome to the Home Page!</h1>
    <p>You are successfully logged in.</p>

</body>
</html>
