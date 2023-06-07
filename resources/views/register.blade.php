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
                <img class=" w-[170px] h-[70px] object-cover -translate-x-11" src={{Storage::url('/synix.png')}} alt="">
            </nav>
        </header>
        <div class=" w-full h-[calc(100vh-70px)] p-2.5 pt-8 sm:p-0 flex items-center">
            <form action="{{route('register')}}" class=" rounded-xl max-w-xl flex flex-col gap-2 p-3 shadow m-auto" method="POST">
                @csrf
                <div class="flex gap-2 flex-wrap">
                    <div class=" w-full basis-[200px] grow gap-1 flex flex-col">
                        <label for="" class=" capitalize">username</label>
                        <input value="{{old('name')}}" name="name" class="outline-none w-full p-2.5 border rounded-xl" type="text">
                        @error('name')
                            <small class=" text-red-500">{{$message}}</small>
                        @enderror
                    </div>
                    <div class=" w-full basis-[200px] grow gap-1 flex flex-col">
                        <label for="" class=" capitalize">phone number</label>
                        <input value="{{old('phonenumber')}}" name="phonenumber" class=" outline-none w-full p-2.5 border rounded-xl" type="text">
                        @error('phonenumber')
                        <small class=" text-red-500">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="flex gap-1 flex-col">
                    <label for="" class=" capitalize">email</label>
                    <input value="{{old('email')}}" name="email" class=" outline-none w-full border rounded-xl p-2.5 resize-none" name=""/>
                    @error('email')
                    <small class=" text-red-500">{{$message}}</small>
                    @enderror
                </div>
                <div class="flex gap-2  flex-wrap">
                    <div class=" w-full basis-[200px] grow gap-1 flex flex-col">
                        <label for="" class=" capitalize">password</label>
                        <input type="password"  name="password"class="  outline-none w-full p-2.5 border rounded-xl" type="text">
                        @error('password')
                        <small class=" text-red-500">{{$message}}</small>
                        @enderror
                    </div>
                    <div class=" w-full gap-1 basis-[200px] grow flex flex-col">
                        <label for="" class=" capitalize">confirm password</label>
                        <input type="password" name="password_confirmation" class=" outline-none w-full p-2.5 border rounded-xl" type="text">
                    </div>
                </div>
                <div class="flex gap-1 flex-col">
                    <label for="" class=" capitalize">city</label>
                    <select name="city" class=" outline-none w-full p-[13px] border rounded-xl">
                        <option selected disabled class=" capitalize">Your City</option>
                        @foreach ($cities as $city)
                            <option value="{{$city}}">{{$city}}</option>
                        @endforeach
                    </select>
                    @error('city')
                    <small class=" text-red-500">{{$message}}</small>
                    @enderror
                </div>
                <div class="flex gap-1 flex-col">
                    <label for="" class=" capitalize">address</label>
                    <textarea name="address" class=" outline-none w-full h-28 border rounded-xl p-2.5 resize-none" name="" id="">{{old('address')}}</textarea>
                    @error('address')
                    <small class=" text-red-500">{{$message}}</small>
                    @enderror
                </div>
                <button type="submit" class=" hover:rounded-2xl bg-[#222] duration-300 transition-all  inline-flex items-center gap-3 capitalize p-3 text-white w-full justify-center rounded-xl">acces to the account <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13.3 17.275q-.3-.3-.288-.725t.313-.725L16.15 13H5q-.425 0-.713-.288T4 12q0-.425.288-.713T5 11h11.15L13.3 8.15q-.3-.3-.3-.713t.3-.712q.3-.3.713-.3t.712.3L19.3 11.3q.15.15.213.325t.062.375q0 .2-.063.375t-.212.325l-4.6 4.6q-.275.275-.687.275t-.713-.3Z"/></svg></button>
            </form>
        </div>
    </div>
</body>
</html>