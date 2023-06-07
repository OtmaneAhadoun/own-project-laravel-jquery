@props(['item'])
<div class="cursor-pointer product-animate group gap-2 flex flex-col relative">

    <div class=" w-full h-[300px] overflow-hidden bg-slate-200">
        <img class=" object-cover w-full h-full transition-all duration-500 group-hover:scale-110" src={{asset("/storage/".$item->mainImage)}} alt="">
    </div>
<div class=" flex-col flex">
    <div class="flex text-[#999] items-center justify-between">
        <h1 class="  hover:text-mained transition-all text-[15.5px] whitespace-nowrap capitalize overflow-hidden text-ellipsis ">{{$item->title}} </h1>
        <svg xmlns="http://www.w3.org/2000/svg" class=" shrink-0" width="16" height="16" viewBox="0 0 24 24"><path fill="currentColor" d="m12.1 18.55l-.1.1l-.11-.1C7.14 14.24 4 11.39 4 8.5C4 6.5 5.5 5 7.5 5c1.54 0 3.04 1 3.57 2.36h1.86C13.46 6 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5c0 2.89-3.14 5.74-7.9 10.05M16.5 3c-1.74 0-3.41.81-4.5 2.08C10.91 3.81 9.24 3 7.5 3C4.42 3 2 5.41 2 8.5c0 3.77 3.4 6.86 8.55 11.53L12 21.35l1.45-1.32C18.6 15.36 22 12.27 22 8.5C22 5.41 19.58 3 16.5 3Z"/></svg>
    </div>
    <span class=" text-[15.5px] text-[#666]">{{$item->price}}</span>
</div>
<a class=" opacity-0 translate-y-[40px] hover:bg-[#333] hover:text-white transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0 absolute rounded-full capitalize bg-white text-[#333] p-2 px-4 bottom-[70px] text-[15px] font-[400] left-[50%] translate-x-[-50%] " href="{{route('show',$item->slug)}}">quick view</a>
</div>