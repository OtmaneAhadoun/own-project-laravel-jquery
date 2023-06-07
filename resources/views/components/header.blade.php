@props(['items'])
@if (session('success'))
<div class=' w-full h-[40px] gap-2 capitalize inline-flex items-center justify-center text-white bg-green-500'><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M21 7L9 19l-5.5-5.5l1.41-1.41L9 16.17L19.59 5.59L21 7Z"/></svg>{{session('success')}}</div>
@elseif(session('failed'))
<div class=' w-full h-[40px] gap-2 capitalize inline-flex items-center justify-center text-white bg-red-500'>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2L1 21h22M12 6l7.53 13H4.47M11 10v4h2v-4m-2 6v2h2v-2"/></svg>
    {{session('failed')}}</div>
@endif
<div class="header md:flex hidden transition-all w-full h-10 bg-[#222]">
    <div class=" w-full text-[13px] items-center justify-between flex text-[#b2b2b2] h-full px-4 2xl:px-0 max-w-7xl m-auto">
            <h1 class="">Free shipping for standard order over $100</h1>
            <ul class=" flex h-full text-[13px] capitalize">
                <li class=" inline-flex items-center px-5 cursor-pointer border-[#b2b2b2]">help & faqs</li>
                <li class=" inline-flex items-center px-5 cursor-pointer border-[#b2b2b2]">support</li>
                <li class=" inline-flex gap-6 items-center pl-5 border-[#b2b2b2]">
                    <a href="" class=" underline">en</a>
                    <a href="" class=" underline">fr</a>
                    <a href="" class=" underline">ar</a>
                </li>
            </ul>
        </div>
    </div>
    <header class=" z-[100] transition-all bg-white sticky top-0 h-[70px]  w-full">
        <div class=" h-screen searchSection backdrop-blur-sm invisible fixed p-2 top-0 z-[1000] bg-[#00000080] w-full">
            <div class="searchContainer overflow-hidden opacity-0 translate-y-[-100%] transition-all duration-300 max-w-xl flex flex-col gap-1 p-1 md:mt-20 rounded-3xl w-full h-[50%] bg-white m-auto ">
                <div class="flex gap-1 p-[2px] w-full border rounded-full ">
                    <input id="searchedValue" placeholder="Search..." class=" min-w-[150px] p-2 px-4 grow outline-none" type="text">
                    <button id="submitSearchedValue" class=" capitalize p-2.5 bg-mained rounded-full text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m19.6 21l-6.3-6.3q-.75.6-1.725.95T9.5 16q-2.725 0-4.612-1.888T3 9.5q0-2.725 1.888-4.612T9.5 3q2.725 0 4.612 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l6.3 6.3l-1.4 1.4ZM9.5 14q1.875 0 3.188-1.313T14 9.5q0-1.875-1.313-3.188T9.5 5Q7.625 5 6.312 6.313T5 9.5q0 1.875 1.313 3.188T9.5 14Z"/></svg></button>
                </div>
                <div class=" relative searchResult overflow-y-auto overflow-x-hidden gap-1 flex flex-col h-full w-full ">
                        <h1 class=" absolute capitalize m-auto inset-0 w-fit h-fit">
                            search for product...
                        </h1>
                </div>
            </div>
        </div>
        <div class=" px-4 z-10 2xl:px-0 max-w-7xl w-full flex items-center justify-between h-full m-auto">
            <img class=" shrink-0 object-cover w-[150px] -translate-x-11 md:w-[170px]  h-[65px]" src={{Storage::url('synix.png')}} alt="">
            <ul class=" md:flex hidden capitalize font-[500] justify-start gap-6">
                <li class=" hover:text-mained transition-all cursor-pointer text-[15.5px]"><a href="{{url('/')}}">home</a> </li>
                <li class=" hover:text-mained transition-all cursor-pointer text-[15.5px]"><a href="{{url('/#overview')}}"> shop</a></li>
                <li class=" relative hover:text-mained transition-all cursor-pointer text-[15.5px] inline-flex">Features
                    <span class=" absolute left-[60%] text-[10px] px-2 capitalize top-[-70%] rounded bg-rose-500 text-white">hot</span>
                </li>
                <li class=" hover:text-mained transition-all cursor-pointer text-[15.5px]">blog</li>
                <li class=" hover:text-mained transition-all cursor-pointer text-[15.5px]">about</li>
                <li class=" hover:text-mained transition-all cursor-pointer text-[15.5px]">contact</li>
            </ul>
            <ul class=" flex gap-4">
                <li class="openSearch hover:text-mained transition-all cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg></li>
                <li class="cart hover:text-mained pb-1 transition-all cursor-pointer relative">
                    <span class=" rounded-full pb-[2px] border-2 border-white w-5 h-5 absolute inline-flex justify-center items-center text-white text-[12px] pt-[2px] -top-[10px] -right-2 bg-mained">
                    @auth
                        {{count($items)}}
                    @endauth
                @guest
                    {{count(session()->get('cart',[]))}}
                @endguest</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zM1 2v2h2l3.6 7.59l-1.35 2.45c-.16.28-.25.61-.25.96c0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12l.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49A1.003 1.003 0 0 0 20 4H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2z"/></svg>
                </li>
                <li class=" hover:text-mained transition-all cursor-pointer relative">
                    <span class=" w-5 border-2 border-white h-5 rounded-full absolute inline-flex justify-center items-center text-white text-[12px] font-medium -top-[10px] -right-2 bg-mained">0</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3Z"/></svg>
                </li>
                <li class="profile cursor-pointer relative">
                    @guest
                    <div class="p-3 z-[150] py-3 hidden profile_info rounded bg-white rounded-tr-none absolute flex-col gap-2 w-[200px] shadow-sm right-0 top-[130%] border">
                        <span class=" absolute h-[10px] w-[10px] right-[6px] bg-white top-[-6px] border-t border-l rotate-45"></span>
                        <h1 class=" text-center font-[400] capitalize">be our custmer</h1>
                        <a href={{route('tologin')}} class="capitalize rounded-full p-2.5 w-full bg-mained text-white text-center text-[15px] font-[400] ">log in</a>
                        <small class=" w-full text-center capitalize leading-none">or</small>
                        <a href="{{route('toregister')}}" class="p-2.5 text-center capitalize hover:bg-[#333] hover:text-white transition-all duration-500 text-[15px] font-[400] rounded-full text-black bg-[#e6e6e6]">create account</a> 
                    </div>
                    @endguest
                    @auth
                    <div class="px-1 z-[150] hidden profile_info rounded-sm bg-white absolute flex-col w-[200px] shadow-xl right-0 top-[130%] border">
                        <span class=" absolute h-[10px] w-[10px] right-[6px] bg-white top-[-6px] border-t border-l rotate-45"></span>
                        <h1 class=" px-4 font-[400] py-2 capitalize w-full border-b ">{{Auth()->user()->name}}</h1>
                        <ul class=" flex-col flex gap-1 pt-2 pb-1 text-[15px] capitalize">
                            <li class=" py-1.5 hover:text-mained transition-all duration-500 px-4">profile</li>
                            <li class=" w-full" ><a href="{{route('orders.index')}}" class=" px-4 py-1.5 hover:text-mained transition-all w-full duration-500 block" >orders</a></li>
                            <li class=" pt-1.5 pb-2.5 hover:text-mained transition-all duration-500 px-4">history</li>
                            <li class=" hover:text-mained transition-all duration-500 py-2 border-t text-center px-4"><a class=" inline-flex justify-between items-center w-full h-full" href="{{route('logout')}}">log out <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/></svg></a> </li>
                        </ul>       
                    </div>     
                    @endauth
                    <svg class="hover:text-mained transition-all" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10s10-4.48 10-10S17.52 2 12 2zM7.35 18.5C8.66 17.56 10.26 17 12 17s3.34.56 4.65 1.5c-1.31.94-2.91 1.5-4.65 1.5s-3.34-.56-4.65-1.5zm10.79-1.38a9.947 9.947 0 0 0-12.28 0A7.957 7.957 0 0 1 4 12c0-4.42 3.58-8 8-8s8 3.58 8 8c0 1.95-.7 3.73-1.86 5.12z"/><path fill="currentColor" d="M12 6c-1.93 0-3.5 1.57-3.5 3.5S10.07 13 12 13s3.5-1.57 3.5-3.5S13.93 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z"/></svg>
                </li>
                <li class="listt md:hidden flex  hover:text-mained transition-all cursor-pointer relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 18h4v-2h-4v2zM3 6v2h18V6H3zm3 7h12v-2H6v2z"/></svg>
                </li>
            </ul>
        </div>
        <ul class="navdrop pb-20 relative translate-y-[-150%] md:hidden w-full capitalize flex-col transition-all duration-300 font-[500] flex text-lg p-6 gap-3 text-white bg-mained">
            <li class=" hover:pl-1 transition-all cursor-pointer text-[15.5px]"><a href="{{url('/')}}">home</a></li>
            <li class=" hover:pl-1 transition-all cursor-pointer text-[15.5px]"><a href="{{url('/#overview')}}">shop</a> </li>
            <li class=" hover:pl-1 transition-all cursor-pointer text-[15.5px]">Features</li>
            <li class=" hover:pl-1 transition-all cursor-pointer text-[15.5px]">blog</li>
            <li class=" hover:pl-1 transition-all cursor-pointer text-[15.5px]">about</li>
            <li class=" hover:pl-1 transition-all cursor-pointer text-[15.5px]">contact</li>
            <span class=" absolute hide text-white p-2 cursor-pointer hover:text-gray-200 right-2 top-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/></svg></span>
            <div class=" h-14 px-4 font-normal left-0 bottom-0 absolute w-full bg-[#222] items-center text-[#b2b2b2] tew flex justify-between text-[13px]">
                <span>free shipping rabat,Sale,Temara</span>
                <ul class="flex text-[13px]">
                    <li><a class="px-4 border-r border-[#b2b2b2]" href="">fr</a></li>
                    <li><a class="px-4" href="">en</a> </li>
                </ul>
            </div>
        </ul>
    </header>