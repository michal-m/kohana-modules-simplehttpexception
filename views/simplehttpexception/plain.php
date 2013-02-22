<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?=$code.' '.Arr::get(Response::$messages, $code, $message)?></title>
</head>
<body>
    <h1><?=$code.' '.Arr::get(Response::$messages, $code, $message)?></h1>
</body>
</html>