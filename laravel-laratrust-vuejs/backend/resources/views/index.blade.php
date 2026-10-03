<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
	<noscript>
		<strong>We're sorry but this application doesn't work properly without
			JavaScript enabled. Please enable it to continue.</strong>
	</noscript>

	<div id="app"></div>
</body>
</html>
