@props(['item'])
<div class=" flex gap-2 ">
    @isset($item['product'])
    <div class="relative group shrink-0 w-20 bg-slate-900 h-20">
        <img class=" shrink-0 w-full  object-cover h-full" 
            src="{{asset('storage/'.$item['product']->mainImage)}}"alt="">
        
        <a href="{{route('dropFromCart',$item['product']->id)}}" class=" pointer-events-none opacity-0 group-hover:opacity-100 transition-all group-hover:pointer-events-auto group-hover:cursor-pointer flex cursor-pointer inset-0 items-center justify-center absolute bg-[#00000080]">
            <svg class=" text-[#dfdfdf]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275q-.275-.275-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275L12 13.4Z"/></svg>
        </a>
    </div>
    <div class=" flex flex-col justify-around">
        <h1 class=" text-sm elips">{{$item['product']->title}}</h1>
        <h3 class=" text-[#888] text-sm"> {{$item['quantity']}}*{{$item['product']->price}}</h3>
    </div>
    @endisset
    @unless ($item['product'])
    <div class="relative group shrink-0 w-20 bg-slate-900 h-20">
        <img class=" shrink-0 w-full  object-cover h-full"
            src="{{asset('storage/'.$item->product->mainImage)}}"alt="">
        
        <a href="{{route('dropFromCart',$item->product->id)}}" class=" pointer-events-none opacity-0 group-hover:opacity-100 transition-all group-hover:pointer-events-auto group-hover:cursor-pointer flex cursor-pointer inset-0 items-center justify-center absolute bg-[#00000080]">
            <svg class=" text-[#dfdfdf]" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275q-.275-.275-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275L12 13.4Z"/></svg>
        </a>
    </div>
    <div class=" flex flex-col justify-around">
        <h1 class=" text-sm elips">{{$item->product->title}}</h1>
        <h3 class=" text-[#888] text-sm"> {{$item->quantity}}*${{$item->product->price}}.00</h3>
    </div>    
    @endunless
</div>