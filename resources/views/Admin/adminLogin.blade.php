<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;500;600;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class=" font-font w-full h-screen flex items-center justify-center">
        <form action="{{route('admin.login')}}" method="POST" class=" p-4 flex gap-2 flex-col rounded-sm shadow-md max-w-sm w-full">
            @csrf
            @if (session('error'))
                <div class=" w-full  flex justify-between items-center p-2 rounded-sm capitalize bg-red-500 text-white">
                    {{session('error')}}
                    <span class=" p-1 alert cursor-pointer ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/></svg>
                    </span>
                </div>
            @endif
            <div class=" flex gap-1 flex-col ">
                <label for="" class=" capitalize">email</label>
                <input type="text" value="{{old("email")}}" name="email" class=" outline-none w-full p-2 border rounded-sm">
                @error('email')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class=" flex gap-1 flex-col ">
                <label for="" class=" capitalize">password</label>
                <input type="password" name="password" class=" outline-none w-full p-2 border rounded-sm">
                @error('password')
                    <span class=" text-sm text-red-500">{{$message}}</span>
                @enderror
            </div>
            <button class=" px-4 capitalize py-2 self-end bg-mained rounded-sm text-white">login</button>
        </form>
    </div>
    <script>
        const sessionMessage = document.querySelector('.alert');
        if (sessionMessage) {
            sessionMessage.addEventListener('click', () => {
                sessionMessage.parentElement.remove();
            });
        } 
    </script>

</body>
</html>