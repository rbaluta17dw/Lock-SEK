<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')

	<title>@yield('title')</title>
</head>
<body>
	<header>
		@include('includes.header')
	</header>
			@yield('content')
			<footer class="pb_footer bg-light" role="contentinfo">
		@include('includes.footer')
		</footer>
		@yield('loader')
		@include('includes.scripts')
</body>
</html>
