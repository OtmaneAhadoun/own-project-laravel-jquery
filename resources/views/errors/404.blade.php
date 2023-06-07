<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;500;600;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <title>404 not found</title>
</head>
<body>
    <div class="flex font-font items-center justify-center min-h-screen bg-mained  bg-fixed bg-cover bg-bottom error-bg">
	<div class="container">
		<div class="row">
			<div class=" text-gray-50 text-center -mt-52">
				<div class="relative ">
				<h1 class="relative text-9xl tracking-tighter-less text-shadow font-sans font-bold">
					<span>4</span><span>0</span><span>4</span></h1>
					<span class="absolute  top-0   -ml-12  text-gray-200 font-semibold">Oops!</span>
					</div>
				<h5 class="text-gray-200 font-semibold -mr-10 -mt-3">Page not found</h5>
				<p class="text-gray-50 mt-2 mb-6">we are sorry, but the page you requested was not found</p>
				<a href="{{route('error.back')}}"
					class="bg-[#222] transition-all hover:text-gray-50 text-gray-200 cursor-pointer  px-5 py-3 shadow-sm font-medium tracking-wider rounded-full hover:shadow-lg">
					Got to back
				</a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
