@forelse ($products as $product)
<a href="{{route('show',str_ireplace("strong","",$product->slug))}}" class="rounded-sm w-full flex p-1 hover:bg-gray-100 transition-all gap-1">
    <div class=" shrink-0 flex flex-col">
        <img src="{{asset("/storage/".$product->mainImage) }}" class=" shrink-0 object-cover w-[100px] h-[100px]" alt="">
    </div>
    <div class=" overflow-hidden flex flex-col gap-[2px]">
        <h1 class=" capitalize text-md overflow-hidden elips2">{!!$product->title!!}</h1>
        <div class=" flex gap-2">
            <h1 class=" capitalize text-[15.5px]">category:{{$product->category->title}}</h1>
            <h1 class=" capitalize text-[15.5px] border-l-2 pl-2">brand:{{$product->brand->title}}</h1>
        </div>
        <h1 class=" capitalize w-full">price:{{$product->price}}</h1>
    </div>
</a>
@empty
<h1 class=" absolute capitalize m-auto inset-0 w-fit h-fit">
    @if ($value)
    no item has been selected with this <strong class=" normal-case">"{{$value}}"</strong></h1>
    @else
        search for product...
    @endif
</h1>
@endforelse