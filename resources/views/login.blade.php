<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;500;600;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>{{$path}}</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="w-full font-font flex items-center justify-center relative h-screen">
        <header class="w-full px-2 xl:px-0 top-0 left-0 absolute shadow-head h-[70px]" >
            <nav class=" max-w-7xl m-auto flex items-center">
                <img class=" w-[170px] h-[70px] object-cover" src={{Storage::url('/synix.png')}} alt="">
            </nav>
        </header>
        <div class=" flex p-2 lg:shadow justify-center rounded-lg h-fit w-[700px] gap-1 ">
            <img class=" hidden rounded-lg lg:flex object-cover w-1/2 max-h-[420px]" src={{Storage::url('loginimg.jpg')}} alt=""/>
            <form method="POST" action={{route('login')}} class=" min-h-[420px] gap-2 lg:w-1/2 flex-col flex px-2 text-black w-full max-w-sm">
                @csrf
                @if (session('created'))
                <div  class=" items-center text-[16px] w-full px-2 py-3 justify-between rounded-lg capitalize bg-green-500 text-white flex">
                    <span class=" flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4L9.55 18Z"/></svg>{{session('created')}}</span>
                    <span id="session-message" class=" p-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/></svg>
                    </span> 
                </div>  
                @elseif(session('unauth'))
                <div class=" items-center text-[16px] w-full px-2 py-3 justify-between rounded-lg capitalize bg-orange-400 text-white flex">
                    <span class=" flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H2v-2c0-2.21 3.58-4 8-4m10-2V7h2v6h-2m0 4v-2h2v2h-2Z"/></svg>{{session('unauth')}}</span>
                    <span id="session-message" class=" p-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/></svg>
                    </span> 
                </div>  
                @elseif(session('error'))
                <div class=" items-center text-[16px] w-full px-2 py-3 justify-between rounded-lg capitalize bg-red-500 text-white flex">
                    <span class=" flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H2v-2c0-2.21 3.58-4 8-4m10-2V7h2v6h-2m0 4v-2h2v2h-2Z"/></svg>{{session('error')}}</span>
                    <span id="session-message" class=" p-1 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/></svg>
                    </span> 
                </div>  
                @endif
                <div class=" flex flex-col gap-1">
                    <label class=" capitalize" for="">email</label>
                    <input name="email" value="{{old('email')}}" class="focus:rounded-l-2xl transition-all rounded-xl p-2.5 border outline-none focus:border-gray-300 " type="text">
                </div>
                <div class=" flex flex-col gap-1">
                    <label class=" capitalize" for="">password</label>
                    <input type="password" name="password" class=" focus:rounded-l-2xl transition-all rounded-xl p-2.5 border outline-none focus:border-gray-300 " type="text">
                </div>
                <button type="submit" class=" hover:rounded-2xl bg-[#222] duration-300 transition-all  inline-flex items-center gap-3 capitalize p-3 text-white w-full justify-center rounded-xl">acces to the account <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.3 17.275q-.3-.3-.288-.725t.313-.725L16.15 13H5q-.425 0-.713-.288T4 12q0-.425.288-.713T5 11h11.15L13.3 8.15q-.3-.3-.3-.713t.3-.712q.3-.3.713-.3t.712.3L19.3 11.3q.15.15.213.325t.062.375q0 .2-.063.375t-.212.325l-4.6 4.6q-.275.275-.687.275t-.713-.3Z"/></svg></button>
                <div class=" flex flex-col py-2 items-center gap-3 capitalize">
                    <a href="" class=" text-sm underline" >forgot password??</a>
                    <a href="" class=" text-sm" > already have account?</a>
                    <a href="{{route('toregister')}}" class=" text-center p-2.5 rounded-xl px-6 border hover:rounded-2xl capitalize  transition-all">get acces</a>
                </div>
            </form>
        </div>
    </div>
    <script>
    const sessionMessage = document.querySelector('#session-message');
    if (sessionMessage) {
        sessionMessage.addEventListener('click', () => {
            sessionMessage.parentElement.remove();
        });
    }
    </script>
</body>
</html>