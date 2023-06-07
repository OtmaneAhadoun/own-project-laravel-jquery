@extends('layout.master-page')
@section('title',$product->title)
@section('content')
    <div class=" w-full p-2 xl:p-0 flex flex-col py-4 max-w-7xl mx-auto min-h-screen">
        <h1 class=" capitalize py-2 text-sm"><a href="{{url('/#overview')}}">product</a> ><span class=" text-[#999]">{{$product->title}}</span> </h1>
        <div class=" w-full flex flex-wrap">
            <div class=" basis-[400px] p-2 flex flex-col gap-2 grow w-full">
                <img src={{asset('/storage/'.$product->mainImage)}} class="mainImg object-cover shadow w-full h-[500px]" alt="">
                <div class="flex gap-2 overflow-x-auto ">
                    <img src="{{asset('./storage/'.$product->mainImage)}}" class="img shrink-0 opacity-50 cursor-pointer object-cover w-[80px] h-[80px] shadow" src="" alt="">
                    <img src="{{asset('./storage/'.$product->image1)}}" class="img shrink-0 cursor-pointer object-cover w-[80px] h-[80px] shadow" src="" alt="">
                    <img src="{{asset('./storage/'.$product->image2)}}" class="img shrink-0 cursor-pointer object-cover w-[80px] h-[80px] shadow" src="" alt="">
                    <img src="{{asset('./storage/'.$product->image3)}}" class="img shrink-0 cursor-pointer object-cover w-[80px] h-[80px] shadow" src="" alt="">
                    <img src="{{asset('./storage/'.$product->image4)}}" class="img shrink-0 cursor-pointer object-cover w-[80px] h-[80px] shadow" src="" alt="">
                </div>
            </div>
            <div class="basis-[400px] p-2 gap-2 grow-[2] flex flex-col">
                <div class=" flex gap-2 items-center">
                    <h1 class=" font-medium capitalize text-[18px] text-[#333]">{{$product->title}}</h1>
                    <span><span>(</span><span class="quantity">{{$product->quantity}}</span><span>)</span> </span>
                </div>
                <p class="text-[#666] text-[16px]">{{$product->description}}</p>
                <div class=" flex gap-1 items-center">
                    <h1 class=" font-medium capitalize text-lg leading-none text-[16px] text-[#333]">brand:</h1>
                    <h1 class=" capitalize h-full text-[#666] text-[17px]">{{$product->brand->title}}</h1>
                </div>
                <div class=" flex gap-1 items-center">
                    <h1 class=" font-medium capitalize text-lg leading-none text-[16px] text-[#333]">category:</h1>
                    <h1 class=" capitalize h-full text-[#666] text-[17px]">{{$product->category->title}}</h1>
                </div>
                <div class=" flex gap-1 items-center">
                    <h1 class=" font-medium capitalize text-lg leading-none text-[16px] text-[#333]">price:</h1>
                    <h1 class=" capitalize h-full text-[#666] text-[17px]">{{$product->price}}</h1>
                </div>
                <form action="{{route('addToCart')}}" class=" flex gap-2.5 flex-col" method="post">
                    @csrf
                    <input type="text" name="user_id" value='{{auth()->id()}}' hidden>
                    <input type="text" name="product_id" value="{{$product->id}}" hidden>
                    <div class="text-white rounded-full w-fit ">
                        <button type="button" class="plus bg-mained rounded-full inline-flex h-11 w-11 justify-center items-center px-4">+</button>
                        <input name="quantity" class="qtt px-4 text-lg w-16 p-2 pl-6 opacity-90 outline-none text-black pointer-events-none" value="1"/>
                        <button type="button" class="mines pointer-events-none opacity-50  bg-mained rounded-full inline-flex h-11 w-11 justify-center items-center px-4">-</button>
                    </div>
                    <div class=" flex gap-2  text-white">
                        <button type="submit" class=" bg-mained px-6 capitalize p-2 py-3 rounded-full ">add to cart</button>
                            <button formaction="{{route('buynow')}}" class=" bg-[#222] px-6 capitalize p-2 py-3 rounded-full ">buy now</button>
                        </form>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
        <div>
            <h1 class=" font-semibold mt-3 text-3xl capitalize">others buy</h1>
            <div class="p-2 grid-cols-carts justify-center gap-4 grid ">
                @foreach ($productSimilaire as $item)
                @if ($item->quantity==0)
                    @continue
                @endif
                    <x-cart :item=$item></x-cart>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="module">
        let mainImage = $('.mainImg');
        $(".img").each(function () {
            $(this).on('click', function () {
                console.log(mainImage.attr('src'));
                mainImage.attr('src', $(this).attr('src'));
                $(".img").each(function () {
                    $(this).removeClass("opacity-50");
                })
                $(this).addClass("opacity-50");
            });
        });
    </script>
@endsection