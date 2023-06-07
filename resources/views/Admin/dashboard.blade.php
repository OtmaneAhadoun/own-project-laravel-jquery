<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;500;600;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>dashboard</title>
    @vite(['resources/css/app.css','resources/js/admin.js','resources/js/jquery.js'])
</head>
<body class=" font-font overflow-hidden relative flex ">
    @if (session('added'))
        <div class=" z-50 translate-x-[130%] opacity-0 transition-all duration-300 bg-green-500 capitalize absolute w-[300px] top-4 right-4 alert p-3 rounded-sm text-white">{{session('added')}}
        <span class="p-1 absolute right-2 top-[50%] translate-y-[-50%] cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg></span>
      </div>
    @elseif(session('rejected'))
        <div class=" z-50 translate-x-[130%] opacity-0 transition-all duration-300 bg-red-500 capitalize absolute w-[300px] top-4 right-4 alert p-3 rounded-sm text-white">{{session('rejected')}}
        <span class="p-1 absolute right-2 top-[50%] translate-y-[-50%] cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg></span>
      </div>
    @endif 
    <div class="border-r z-10 w-[100px] pb-2 bg-white relative items-center flex-col h-screen flex justify-between ">
        <div class=" flex justify-between overflow-hidden items-center border-b">
          <img class="shrink-0 object-cover w-[160px] -translate-x-2 h-[90px]" src={{Storage::url('synix.png')}} alt="">
        </div>
        <ul class="  absolute top-[50%]  translate-y-[-50%] w-full px-[2px] flex-col text-[13px] flex gap-[2px] ">
            <li class="p-2 px-2 items-center flex bg-gray-50 relative flex-col cursor-pointer text-black w-full rounded-sm gap-1 text-sm tracking-wider font-medium capitalize"><span class="absolute w-1 h-[60px] left-0 translate-y-[-50%] top-[50%] rounded-sm-full bg-mained"></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 8V4q0-.425.288-.713T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9h-6q-.425 0-.713-.288T13 8ZM3 12V4q0-.425.288-.713T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13H4q-.425 0-.713-.288T3 12Zm10 8v-8q0-.425.288-.713T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21h-6q-.425 0-.713-.288T13 20ZM3 20v-4q0-.425.288-.713T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21H4q-.425 0-.713-.288T3 20Z"/></svg>dashoard</li>
            <li class="p-2 px-2 items-center flex bg-gray-50 relative flex-col cursor-pointer text-black w-full rounded-sm gap-1 text-sm tracking-wider font-medium capitalize"><span class="absolute w-1 h-[60px] left-0 translate-y-[-50%] top-[50%] rounded-sm-full bg-mained"></span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M17.25 16.5q0-.2-.15-.35t-.35-.15q-.2 0-.35.15t-.15.35v3q0 .2.15.35t.35.15q.2 0 .35-.15t.15-.35v-3Zm1.5 0v3q0 .2.15.35t.35.15q.2 0 .35-.15t.15-.35v-3q0-.2-.15-.35t-.35-.15q-.2 0-.35.15t-.15.35ZM7 9h10q.425 0 .713-.288T18 8q0-.425-.288-.713T17 7H7q-.425 0-.713.288T6 8q0 .425.288.713T7 9Zm11 14q-2.075 0-3.538-1.463T13 18q0-2.075 1.463-3.538T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23ZM3 21.875V5q0-.825.588-1.413T5 3h14q.825 0 1.413.588T21 5v6.675q-.475-.225-.975-.375T19 11.075V5H5v14.05h6.075q.125.775.388 1.475t.687 1.325q-.125.025-.263-.038t-.237-.162l-.8-.8q-.15-.15-.35-.15t-.35.15l-.8.8q-.15.15-.35.15t-.35-.15l-.8-.8q-.15-.15-.35-.15t-.35.15l-.8.8q-.15.15-.35.15t-.35-.15l-.8-.8q-.15-.15-.35-.15t-.35.15l-.8.8l-.35.225ZM7 17h4.075q.075-.525.225-1.025t.375-.975H7q-.425 0-.713.288T6 16q0 .425.288.713T7 17Zm0-4h6.1q.95-.925 2.213-1.463T18 11H7q-.425 0-.713.288T6 12q0 .425.288.713T7 13Zm-2 6.05V5v14.05Z"/></svg><h1>orders</h1></li>
            <li class="p-2 px-2 items-center flex bg-gray-50 relative flex-col cursor-pointer text-black w-full rounded-sm gap-1 text-sm tracking-wider font-medium capitalize"><span class="absolute w-1 h-[60px] left-0 translate-y-[-50%] top-[50%] rounded-sm-full bg-mained"></span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 2048 2048"><path fill="currentColor" d="m1344 2l704 352v785l-128-64V497l-512 256v258l-128 64V753L768 497v227l-128-64V354L1344 2zm0 640l177-89l-463-265l-211 106l497 248zm315-157l182-91l-497-249l-149 75l464 265zm-507 654l-128 64v-1l-384 192v455l384-193v144l-448 224L0 1735v-676l576-288l576 288v80zm-640 710v-455l-384-192v454l384 193zm64-566l369-184l-369-185l-369 185l369 184zm576-1l448-224l448 224v527l-448 224l-448-224v-527zm384 576v-305l-256-128v305l256 128zm384-128v-305l-256 128v305l256-128zm-320-288l241-121l-241-120l-241 120l241 121z"/></svg><h1>products</h1></li>
            <li class="p-2 px-2 items-center flex bg-gray-50 relative flex-col cursor-pointer text-black w-full rounded-sm gap-1 text-sm tracking-wider font-medium capitalize"><span class="absolute w-1 h-[60px] left-0 translate-y-[-50%] top-[50%] rounded-sm-full bg-mained"></span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9A3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42c-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3a3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3a3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.536 5.536 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13v-1.75M0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9c-.59.68-.95 1.62-.95 2.65V20H0m24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65c2.56.34 4.45 1.51 4.45 2.9V20Z"/></svg><h1>users</h1></li>
        </ul>
            <a href="{{route('admin.logout')}}" class=" hover:text-mained transition-all font-medium pb-2 inline-flex gap-1 flex-row-reverse capitalize">logout<svg class=" rotate-180" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg> </a>
    </div>

    <div class=" w-full max-h-screen overflow-auto">
        <header class="px-2 flex justify-end w-full h-[50px] border border-l-transparent">
            <nav class=" h-full flex items-center">
              <ul>
                <li class=" p-1.5 rounded-sm group transition-all relative hover:bg-gray-100 cursor-pointer">
                  <div class="p-1 hidden flex-col rounded-sm transition-all group-hover:flex bg-white right-0 z-50 top-[105%] border shadow-lg absolute w-[300px] min-h-[30px]  max-h-[500px]">
                    <span class=" w-3 -z-[1] h-3 border absolute border-l-0 border-b-0 left-[93%] -top-[6px] -rotate-45 bg-white"></span>
                    @forelse ($DeletedProducts as $product)
                        <div class=" w-full gap-1 p-2 rounded-sm hover:bg-gray-100 items-center flex">
                          <div class="-space-x-2 shrink-0 flex justify-center">
                            <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$product->mainImage) }} alt="">
                            <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$product->image1) }} alt="">
                            <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$product->image2) }} alt="">
                            <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$product->image3) }} alt="">
                          </div>
                          <div class=" flex w-full gap-1 flex-col">
                            <small class=" absolute text-[12px] top-0 left-3 text-[#b5b5b5]">{{$product->deleted_at->diffForHumans()}}</small>
                            <a href="{{route('product.restoreProduct',$product->id)}}" class=" rounded-sm text-center tracking-wider p-1 w-full text-white bg-green-500 capitalize text-sm">restore</a>
                            <a href="{{route('product.forceDelete',$product->id)}}" class=" rounded-sm text-center tracking-wider p-1 w-full text-white bg-red-500 capitalize text-sm">delete</a>
                          </div>
                        </div>
                    @empty
                        <h1 class=" capitalize text-[#555] text-sm tracking-wider absolute inset-0 w-fit h-fit m-auto">no product deleted yet</h1>
                    @endforelse
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3a9 9 0 0 0-9 9H1l3.89 3.89l.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42A8.954 8.954 0 0 0 13 21a9 9 0 0 0 0-18zm-1 5v5l4.28 2.54l.72-1.21l-3.5-2.08V8H12z"/></svg>
                </li>
              </ul>
            </nav>
        </header>
        <div class="grid w-full md:grid-cols-2 p-2 gap-4 mt-4 xl:grid-cols-4 ">
          <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
              <div class="p-4 bg-green-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                      </path>
                  </svg></div>
              <div class="px-4 text-gray-700">
                  <h3 class="text-sm tracking-wider">Total Member</h3>
                  <p class="text-3xl">12,768</p>
              </div>
          </div>
          <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
              <div class="p-4 bg-blue-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2">
                      </path>
                  </svg></div>
              <div class="px-4 text-gray-700">
                  <h3 class="text-sm tracking-wider">Total Post</h3>
                  <p class="text-3xl">39,265</p>
              </div>
          </div>
          <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
              <div class="p-4 bg-indigo-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z">
                      </path>
                  </svg></div>
              <div class="px-4 text-gray-700">
                  <h3 class="text-sm tracking-wider">Total Comment</h3>
                  <p class="text-3xl">142,334</p>
              </div>
          </div>
          <div class="flex items-center bg-white border rounded-sm overflow-hidden shadow">
              <div class="p-4 bg-red-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4">
                      </path>
                  </svg></div>
              <div class="px-4 text-gray-700">
                  <h3 class="text-sm tracking-wider">Server Load</h3>
                  <p class="text-3xl">34.12%</p>
              </div>
          </div>
      </div>
        <div class=" w-full flex-wrap p-2 gap-1 flex ">
            <div class=" flex basis-[800px] grow-[1.5] gap-1 flex-col   ">
              <div class=" flex gap-1">
                <div class=" relative delete shrink-0 cursor-pointer bg-mained text-white hover:bg-[#5c6ace] transition-all flex items-center justify-center p-2.5 px-3 rounded-sm ">
                  <div  class=" w-[200px] hidden flex-col gap-1 overflow-auto deleteSection top-[110%] left-0 p-1 bg-white z-[99] absolute h-[250px] border shadow-lg rounded-sm">
                    @if (count($brands))
                    <a href="{{route('brands.dropAll')}}" class="rounded-sm relative transition-all p-2 group text-sm tracking-wider  hover:bg-red-500 hover:text-white text-[#555] flex justify-between items-center">
                      <h1 class=" capitalize">drop all brands</h1>
                      <span class=" p-1 capitalize top-[105%] invisible opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100 absolute whitespace-nowrap left-[50%] translate-x-[-50%] z-50 px-3 w-fit text-[12px] tracking-wider text-white bg-[#222] rounded-sm">
                        delete all realited product
                        <span class=" absolute translate-x-[-50%] border-[8px] border-transparent border-b-[#222] left-[50%] -top-[50%] rounded-sm"></span> 
                      </span>
                    </a>
                    @endif
                    @forelse ($brands as $brand)
                    <div class=" rounded-sm px-2 text-sm tracking-wider  text-[#555] flex justify-between items-center hover:bg-gray-100">
                      <h1>{{$brand->title}}</h1>
                      <a href="{{route('brand.delete',$brand->id)}}" class=" p-2 pr-0 hover:text-red-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                      </a>
                    </div>
                    @empty
                    <h1 class=" text-[#555] text-sm tracking-wider absolute inset-0 m-auto capitalize w-fit h-fit">no brand yet</h1>
                    @endforelse
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9 19v-2h12v2H9Zm0-6v-2h12v2H9Zm0-6V5h12v2H9ZM5 20q-.825 0-1.413-.588T3 18q0-.825.588-1.413T5 16q.825 0 1.413.588T7 18q0 .825-.588 1.413T5 20Zm0-6q-.825 0-1.413-.588T3 12q0-.825.588-1.413T5 10q.825 0 1.413.588T7 12q0 .825-.588 1.413T5 14Zm0-6q-.825 0-1.413-.588T3 6q0-.825.588-1.413T5 4q.825 0 1.413.588T7 6q0 .825-.588 1.413T5 8Z"/></svg>
                </div> 
                <form action="{{route("addBrand")}}" method="POST" class=" flex grow gap-1 ">
                  @csrf
                    <input type="text" placeholder="brand..." name="brand" class="outline-none placeholder:capitalize @error('brand') border-red-500 @enderror w-full p-2 rounded-sm border">
                    <button class=" shrink-0 text-ellipsis whitespace-nowrap overflow-hidden cursor-pointer capitalize text-sm tracking-wider text-white-300 bg-mained text-white hover:bg-[#5c6ace] transition-all flex items-center justify-center p-2.5 px-3 rounded-sm ">
                      add mark
                    </button> 
                </form>
                <div class=" relative delete shrink-0 cursor-pointer bg-mained text-white hover:bg-[#5c6ace] transition-all flex items-center justify-center p-2.5 px-3 rounded-sm ">
                  <div  class=" w-[200px] hidden flex-col gap-1 overflow-y-auto deleteSection top-[110%] left-0 p-1 bg-white z-[99] absolute h-[250px] border shadow-lg rounded-sm">
                    @if (count($categories))
                    <a href="{{route('categories.dropAll')}}" class="rounded-sm relative transition-all p-2 group text-sm tracking-wider  hover:bg-red-500 hover:text-white text-[#555] flex justify-between items-center">
                      <h1 class=" capitalize">drop all categories</h1>
                      <span class=" p-1 capitalize top-[105%] invisible opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100 absolute whitespace-nowrap left-[50%] translate-x-[-50%] z-50 px-3 w-fit text-[12px] tracking-wider text-white bg-[#222] rounded-sm">
                        delete all realited product
                        <span class=" absolute translate-x-[-50%] border-[8px] border-transparent border-b-[#222] left-[50%] -top-[50%] rounded-sm"></span> 
                      </span>
                    </a>
                    @endif
                    @forelse ($categories as $category)
                    <div class=" rounded-sm px-2 text-sm tracking-wider  text-[#555] flex justify-between items-center hover:bg-gray-100">
                      <h1>{{$category->title}}</h1>
                      <a href="{{route('category.delete',$category->id)}}" class=" p-2 pr-0 hover:text-red-500 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                      </a>
                    </div>
                    @empty
                    <h1 class=" text-[#555] text-sm tracking-wider absolute inset-0 m-auto capitalize w-fit h-fit">no category yet</h1>
                    @endforelse
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9 19v-2h12v2H9Zm0-6v-2h12v2H9Zm0-6V5h12v2H9ZM5 20q-.825 0-1.413-.588T3 18q0-.825.588-1.413T5 16q.825 0 1.413.588T7 18q0 .825-.588 1.413T5 20Zm0-6q-.825 0-1.413-.588T3 12q0-.825.588-1.413T5 10q.825 0 1.413.588T7 12q0 .825-.588 1.413T5 14Zm0-6q-.825 0-1.413-.588T3 6q0-.825.588-1.413T5 4q.825 0 1.413.588T7 6q0 .825-.588 1.413T5 8Z"/></svg>
                </div> 
                <form action="{{route("addCategory")}}" method="POST" class="flex grow gap-1 ">
                  @csrf
                    <input type="text" placeholder="category..." name="category" class="outline-none w-full placeholder:capitalize @error('category') border-red-500 @enderror p-2 rounded-sm border">
                    <button class=" relative shrink-0 text-ellipsis whitespace-nowrap overflow-hidden cursor-pointer capitalize text-sm tracking-wider text-white-300 bg-mained text-white hover:bg-[#5c6ace] transition-all flex items-center justify-center p-2.5 px-3 rounded-sm ">
                        add category
                    </button> 
                </form>
              </div>
                <div class=" flex flex-wrap gap-1 w-full">
                  <div class=" flex grow-[9] gap-1 ">
                    <input id="search" type="search" placeholder="Search..." class="outline-none w-full p-2 rounded-sm border">
                  </div>
                    <button class=" shrink-0 text-ellipsis whitespace-nowrap overflow-hidden text-sm grow tracking-wider justify-center showAddarea capitalize inline-flex items-center gap-2 p-2.5 rounded-sm bg-mained hover:bg-[#5c6ace] transition-all text-white">add product</button>
                  </div>
                <table id="search-results" class=" min-w-[700px]  w-full border">
                    <thead class=" z-30 h-fit w-full ">
                        <tr class=" w-full text-center capitalize flex border-b h-fit">
                            <th class="py-2 w-full pl-2 text-sm tracking-wider font-medium ">Title</th>
                            <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">Price</th>
                            <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">Quantity</th>
                            <th class="py-2 border-l shrink-0 text-sm tracking-wider pl-2 font-medium w-[200px] ">images</th>
                            <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">brand</th>
                            <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">category</th>
                            <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">date</th>
                            <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">operations</th>
                        </tr>
                    </thead>
                    <tbody  class="w-full h-[535px] overflow-y-auto flex flex-col">
                      @foreach ($products as $item)
                      <tr class=" text-center  text-[#555] py-2 border-b w-full items-center flex">
                        <td class="py-2 grow capitalize w-full pl-2 overflow-hidden "><h1 class="elips text-sm tracking-wider text-left">{!!$item->title!!}</h1></td>
                        <td class="py-2 max-w-[190px] w-full text-sm tracking-wider pl-2">{{$item->price}}</td>
                        <td class="py-2 max-w-[190px] @if ($item->quantity==0) text-red-500 @endif w-full relative text-sm tracking-wider pl-2">
                          {{$item->quantity }}
                          @if ($item->quantity==0)
                          <span class="absolute -top-3 left-0 bg-red-500 rounded-full flex h-3 w-3">
                            <span class="animate-ping bg-red-400 absolute inline-flex rounded-lg h-full w-full rounded-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h--500"></span>
                          </span> 
                          @endif
                        </td>
                        <td class=" -space-x-2 w-[200px] shrink-0 flex grow justify-center">
                                  <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$item->mainImage) }} alt="">
                                  <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$item->image1) }} alt="">
                                  <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$item->image2) }} alt="">
                                  <img loading='lazy' class=" border-2 border-[#5c6ace] rounded-full h-12 w-12 object-cover" src={{asset('storage/'.$item->image3) }} alt="">
                        </td>
                        <td class="py-2 max-w-[190px] inline-flex justify-center overflow-hidden w-full pl-2"><h1 class="elips text-sm tracking-wider text-left">{{$item->brand->title}}</h1></td>
                        <td class="py-2 max-w-[190px] inline-flex justify-center overflow-hidden w-full pl-2"><h1 class="elips text-sm tracking-wider text-left">{{$item->category->title}}</h1></td>
                        <td class="py-2 max-w-[190px] w-full text-sm tracking-wider pl-2">{{$item->created_at->diffForHumans() }}</td>
                        <td class="py-2 text-[#555] max-w-[190px] flex gap-2 items-center justify-center w-full pl-2">
                          <button class=" relative delete">
                            <div class="w-[200px] z-50 hidden deleteSection flex-col shadow-lg justify-between p-1 h-[95px] b absolute bg-white top-[100%] right-0 rounded-sm border">
                              <h1 class=" text-sm capitalize tracking-wider">are you realry want to delet this product?</h1>
                              <a href="{{route('product.delete',$item->id)}}" class=" p-2 w-full rounded-sm bg-red-500 text-white capitalize">delete</a>
                            </div>
                            <svg class=" text-black hover:text-mained transition-all" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                          </button>
                          <button><svg class=" text-black hover:text-mained transition-all" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><path d="M5.325 43.5h8.485l31.113-31.113l-8.486-8.485L5.325 35.015V43.5Z"/><path stroke-linecap="round" d="m27.952 12.387l8.485 8.485"/></g></svg></button>
                        </td>
                      </tr>  
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                          <td class=" border-t p-1">
                            {{$products->links()}}
                          </td> 
                      </tr> 
                    </tfoot>
                </table>
            </div>
            <div class="flex relative p-1 gap-1 flex-col rounded-sm-sm grow basis-[400px] h-[715px] overflow-auto border">
              <div class=" flex items-center border-b pb-1 justify-between">
                <h1 class=" capitalize tracking-wider">orders</h1>
                <div class=" flex gap-1 items-center">
                  <button class=" text-ellipsis whitespace-nowrap overflow-hidden  p-2 rounded-sm bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M8 14q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm4 0q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm4 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14ZM5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Z"/></svg>
                  </button>
                  <button class=" text-ellipsis whitespace-nowrap overflow-hidden  p-2 rounded-sm bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M10 21h4c0 1.1-.9 2-2 2s-2-.9-2-2m11-2v1H3v-1l2-2v-6c0-3.1 2-5.8 5-6.7V4c0-1.1.9-2 2-2s2 .9 2 2v.3c3 .9 5 3.6 5 6.7v6l2 2m-4-8c0-2.8-2.2-5-5-5s-5 2.2-5 5v7h10v-7Z"/></svg>
                  </button>
                </div>
              </div>
             

              @forelse ($orders as $order)
                @if (count($order->order_items))
                <div class=" relative w-full p-2 flex justify-between items-center border">
                  <div class=" flex flex-col gap-1 capitalize">
                    <h1  class="text-[15px] tracking-wider">{{$order->user->name}}</h1>
                    <h2 class="text-[15px] tracking-wider">{{$order->delivery->phoneNumber}}</h2>
                    <h2 class="text-[15px] tracking-wider">total:{{$order->total}}</h2>
                    <h2 class="text-[15px] tracking-wider">Status: {!! $order->status ? '<span class="text-green-500">Confirmed</span>' : '<span class="text-orange-500">Not yet</span>' !!}</h2>
                  </div>
                  <small class=" absolute top-1 right-2 text-gray-500">{{$order->created_at->diffForHumans()}}</small>
                  <div class=" flex -space-x-2 ">
                  @foreach ($order->order_items as $item)
                    <div class="w-10 h-10 rounded-full border-2 relative border-[#6c7ae0]"> <img src="{{asset('storage/'.$item->product->mainImage)}}" class=" rounded-full w-full h-full object-cover " src="" alt=""></div>
                  @endforeach
                  </div>
                  <div class=" flex gap-1">
                    <a href="{{route('order.confirm',$order->id)}}" class="cursor-pointer @if($order->status) opacity-50 pointer-events-none @endif p-2 rounded-sm bg-green-400 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M9 16.2L4.8 12l-1.4 1.4L9 19L21 7l-1.4-1.4L9 16.2z"/></svg></a>
                    <a href="{{route('order.cancel',$order->id)}}" class="cursor-pointer p-2 rounded-sm bg-red-400 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41z"/></svg></a>
                  </div>
                </div>
                @endif   
              @empty
                <h1 class="text-sm tracking-wider absolute inset-0 w-fit h-fit capitalize pb-9 m-auto">no order yet</h1> 
              @endforelse
            </div>
        </div>
    </div>
    
    <div class=" addarea overflow-y-auto  z-50 fixed flex invisible p-2 translate-all duration-100  w-full h-full bg-[#00000080] items-center">
        <form method="post" enctype="multipart/form-data" class="px-3 lunch overflow-y-auto max-h-[calc(100vh-30px)] w-full pt-3 relative transition-all max-w-lg mx-auto opacity-0 rounded-sm bg-white py-2" action="{{route('store')}}">
          @csrf
              <div class=" w-full  flex gap-2 flex-col">
              <div class=" w-full flex flex-col gap-1">
                <label class=" text-sm font-[400] capitalize" for="" class=" text-sm capitalize">
                  title
                </label>
                <input
                  name="title"
                  class=" outline-none border rounded-sm p-2  grow"
                  type="text"
                />
              </div>
              <div class=" w-full flex-wrap flex gap-2">
                <div class="flex gap-1 grow basis-[150px] w-full flex-col">
                  <label class=" text-sm font-[400] capitalize" for="" class=" text-sm capitalize">
                    price
                  </label>
                  <input
                    name="price"
                    class="outline-none border rounded-sm p-2 "
                    type="number"
                  />
                </div>
                <div class="flex gap-1 grow basis-[150px] w-full flex-col">
                  <label class=" text-sm font-[400] capitalize" for="" class=" text-sm capitalize">
                    quantity
                  </label>
                  <input
                    name="quantity"
                    class=" outline-none border rounded-sm p-2 "
                    type="number"
                  />
                </div>
              </div>
              <div class=" flex gap-1 w-full flex-col">
                <label class=" text-sm font-[400] capitalize" for="" class=" text-sm capitalize">
                  brand
                </label>
                <select
                  class=" border rounded-sm  p-2 bg-white "
                  name="brand_id"
                  id=""
                >
                @foreach ($brands as $brand)
                  <option  value="{{$brand->id}}">{{$brand->title}}</option>
                @endforeach
                </select>
              </div>
              <div class=" flex gap-1 w-full flex-col">
                <label class=" text-sm font-[400] capitalize" for="" class=" text-sm capitalize">
                  category
                </label>
                <select
                  class="capitalize border rounded-sm  p-2 bg-white "
                  name="category_id"
                  id=""
                >
                @foreach ($categories as $category)
                  <option  value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
                </select>
              </div>
              <div class=" flex flex-col gap-1">
                <label for="" class=" text-sm capitalize" class=" capitalize">description</label>
                <textarea
                  name="description"
                  class=" outline-none w-full h-[140px] rounded-sm border resize-none p-2"
                ></textarea>
              </div>
              <div class="flex flex-wrap gap-2">
                <div class=" w-full basis-[200px] grow flex flex-col gap-1">
                  <label for="mainImage" class=" text-sm capitalize">main image</label>
                  <label
                    for="mainImage"
                    class="image grow h-[170px] relative hover:border-[#6c7ae0] transition-all cursor-pointer border-2 border-dashed rounded-sm group"
                  >
                  <img src="" class=" hidden object-cover inset-0 left-0 top-0 h-full w-full rounded-sm" alt="">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      strokeWidth={1.5}
                      stroke="currentColor"
                      class=" absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-6 h-6 text-mained opacity-0 transition-all group-hover:opacity-100"
                    >
                      <path
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        d="M12 6v12m6-6H6"
                      />
                    </svg>
                  </label>
                  <input
                    type="file"
                    class="hidden"
                    name="mainImage"
                    id="mainImage"
                  />
                </div>
                <div class=" w-full basis-[200px] grow flex flex-col gap-1">
                  <label for="" class=" text-sm capitalize">other images</label>
                  <div class=" flex grow flex-col gap-1">
                    <div class=" w-full grow gap-2 flex">
                      <label
                        for="image1"
                        class="image w-full h-[90px] grow relative hover:border-[#6c7ae0] transition-all cursor-pointer border-2 border-dashed rounded-sm group"
                      >
                    <img src="" class=" hidden object-cover inset-0 left-0 top-0 h-full w-full rounded-sm" alt="">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          strokeWidth={1.5}
                          stroke="currentColor"
                          class=" absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-6 h-6 text-mained opacity-0 transition-all group-hover:opacity-100"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M12 6v12m6-6H6"
                          />
                        </svg>
                      </label>
                      <input
                        hidden
                        type="file"
                        name="image1"
                        id="image1"
                      />
                      <div class=" w-full  grow gap-2 flex">
                        <label
                          for="image2"
                          class="image w-full h-[90px] grow relative hover:border-[#6c7ae0] transition-all cursor-pointer border-2 border-dashed rounded-sm group"
                        >
                          <img src="" class=" hidden object-cover inset-0 left-0 top-0 h-full w-full rounded-sm" alt="">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            strokeWidth={1.5}
                            stroke="currentColor"
                            class=" absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-6 h-6 text-mained opacity-0 transition-all group-hover:opacity-100"
                          >
                            <path
                              strokeLinecap="round"
                              strokeLinejoin="round"
                              d="M12 6v12m6-6H6"
                            />
                          </svg>
                        </label>
                        <input
                          class="hidden"
                          type="file"
                          name="image2"
                          id="image2"
                        />
                      </div>
                    </div>
                  </div>
                  <div class=" flex grow flex-col gap-1">
                    <div class=" w-full grow gap-2 flex">
                      <label
                        for="image3"
                        class="image w-full h-[90px] grow relative hover:border-[#6c7ae0] transition-all cursor-pointer border-2 border-dashed rounded-sm group"
                      >
                        <img src="" class=" hidden object-cover inset-0 left-0 top-0 h-full w-full rounded-sm" alt="">
                        <svg
                          xmlns="http://www.w3.org/2000/svg"
                          fill="none"
                          viewBox="0 0 24 24"
                          strokeWidth={1.5}
                          stroke="currentColor"
                          class=" absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-6 h-6 text-mained opacity-0 transition-all group-hover:opacity-100"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            d="M12 6v12m6-6H6"
                          />
                        </svg>
                      </label>
                      <input
                        class="hidden"
                        type="file"
                        name="image3"
                        id="image3"
                      />
                      <div class=" w-full  grow gap-2 flex">
                        <label
                          for="image4"
                          class="image w-full h-[90px] grow relative hover:border-[#6c7ae0] transition-all cursor-pointer border-2 border-dashed rounded-sm group"
                        >
                        <img src="" class=" hidden object-cover inset-0 left-0 top-0 h-full w-full rounded-sm" alt="">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            strokeWidth={1.5}
                            stroke="currentColor"
                            class=" absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%] w-6 h-6 text-mained opacity-0 transition-all group-hover:opacity-100"
                          >
                            <path
                              strokeLinecap="round"
                              strokeLinejoin="round"
                              d="M12 6v12m6-6H6"
                            />
                          </svg>
                        </label>
                        <input
                          class=" hidden"
                          type="file"
                          name="image4"
                          id="image4"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class=" flex gap-2">
              </div>
              <div class=" w-full flex justify-end">
                <button
                  class="bg-mained text-white rounded-sm capitalize font-outfit font-medium px-8 py-2.5 text-sm"
                >
                  lunch
                </button>
              </div>
            </div>
          </form>
    </div>
    <script type="module">
        $(document).ready(()=>{
          $('.alert').removeClass('translate-x-[130%] opacity-0').delay(3000).fadeOut(500);
          $('.alert').find("span").on('click',function () {
            $('.alert').remove();
          })
          $('.lunch').on('submit',function(e){
            const titleValue =$('input[name="title"]').val();
            const priceValue =$('input[name="price"]').val();
            const quantityValue =$('input[name="quantity"]').val();
            const brand_idValue =$('select[name="brand_id"]').val();
            const category_idValue =$('select[name="category_id"]').val();
            const descriptionValue = $('textarea[name="description"]').val();
            const mainImageValue = $('input[name="mainImage"]').val();
            const image1Value = $('input[name="image1"]').val();
            const image2Value = $('input[name="image2"]').val();
            const image3Value = $('input[name="image3"]').val();
            const image4Value = $('input[name="image4"]').val();
            console.log(titleValue);
            if(!image4Value || !image3Value || !titleValue || !priceValue || !quantityValue || !brand_idValue || !category_idValue || !brand_idValue || !mainImageValue || !image1Value || !image2Value){
              e.preventDefault();
              if($('.alert'))
              $('.alert').remove();
              $(this).prepend('<div class="bg-red-500 alert capitalize p-2 relative rounded-sm text-white">all fields are required <span class="p-1 absolute right-2 top-[50%] translate-y-[-50%] cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z"/></svg></span> </div>');
              $('.alert').find("span").on('click',function () {
                $('.alert').remove();
              })
            }
          })
          function reginerate(){
            $('.delete').each(function() {
                $(this).on('click', function(e) {
                  const deleteSection = $(this).find('.deleteSection');
                  deleteSection.toggleClass('hidden flex');
                  deleteSection.on('click',function (e) { e.stopPropagation(); })
                  e.stopPropagation();
                  $(document).on('click', function() {
                    deleteSection.addClass('hidden').removeClass('flex');
                    $(document).off('click');
                  });
                });
              });
          }
          reginerate()
          function loadData() {
            const searchedValue=$("#search").val()
              $(document).on('input','#search',function(){
                $.ajax({
                  type: "post",
                  url: "{{route('search')}}",
                  data: {"value":$(this).val(),'_token':"{{csrf_token()}}"},
                  dataType: "html",
                  success: function (response) {
                    $('#search-results').html(response)
                    reginerate()
                  }
                });
            });
            $(document).on('click','#ajax_links_search a',function(e){
            e.preventDefault()
            const value=$("#search").val()
            $.ajax({
              type: "post",
              url: $(this).attr('href'),
              data: {value,'_token':"{{csrf_token()}}"},
              dataType: "html",
              success: function (response) {
                console.log(value);
                $('#search-results').html(response)
                reginerate()
              }
            });
            })
          }
          loadData();
        })
    </script>
</body>
</html>