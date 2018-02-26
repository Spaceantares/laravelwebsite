<!DOCTYPE html>
<html lang="en">

<head> 
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="autor" content="">

	<title> My laravel Website </title>

</head>

<body>

	<h2> you have a new message!</h2>

	<p> 
		<strong> Name: </strong> {{ @request->input('name') }}
	</p>

	<p> 
		<strong> E-mail: </strong> {{ @request->input('email') }}

	</p>

	<p> 
		<strong> Massage: </strong> {{ @request->input('meggage') }}
	</p>

</body>

</html>