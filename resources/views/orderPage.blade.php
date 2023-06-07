@extends('layout.master-page',['items'=>$items,'total'=>$total,'data'=>$data])
@section('title','orders')
@section('content')
<div class=" max-w-7xl mx-auto px-2 2xl:px-0 w-full min-h-screen  ">
    <h1 class=" capitalize text-sm py-3 text-[#999]"><a href="{{url('/#overview')}}" class=" text-[#666]">home</a>  > orders</h1>
    @foreach ($data as $order)
    <div class="w-full flex px-2 flex-wrap mt-2 gap-3 border p-2 ">
        <div class="w-full basis-[400px]  grow-[99]  flex-col gap-1  ">
            <div class=" w-full h-full flex flex-col justify-between ">
                <div class=" relative w-full flex p-1 gap-3 items-center flex-col ">
                    @foreach ($order->order_items as $item)
                    <div class=" flex flex-col w-full ">
                        <div class=" flex w-full gap-2 text-[16px] relative items-center">
                            <span class=" absolute w-7 h-7 inline-flex justify-center items-center border-2 border-white rounded-full bg-mained text-[13px] -top-2 -left-2 text-white">{{$item->quantity}}</span>
                            <img class="w-[90px] shrink-0 h-[90px] object-cover"  src="{{asset('storage/'.$item->product->mainImage)}}" src="" alt="">
                            <div class=" flex flex-col gap-1 overflow-hidden">
                                <h1 class="elips2">{{$item->product->title}} {{$item->quantity}}</h1> 
                                <ul class=" text-[15px] flex-col capitalize flex gap-1 ">
                                    <li class=" pr-2">category:<span>{{$item->product->category->title}}</span></li>
                                    <li class=" pr-2 ">price:<span>{{$item->product->price}}</span></li>
                                </ul> 
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>    
                <div class=" w-full border-t lg:pb-8 justify-between py-2 mt-2 flex items-center"
                >
                <div class=" flex gap-1 capitalize text-lg ">
                    <h1 class=" ">status: @if ($order->status)
                        <h1 class=" text-green-400 ">confirmed</h1> 
                        @else  
                        <h1 class=" text-yellow-400 ">peending...</h1> 
                        @endif</h1>
                    </div>
                    <span class=" text-lg capitalize text-md">
                        
                        total:{{$order->total}}</span>
                    </div>
                </div>
            </div>
            <div class="p-2 border flex-col flex gap-1 basis-[400px] h-fit grow ">
                <h1 class=" capitalize font-medium text-lg text-black pb-2 border-b border-dashed">information:</h1>
                <div class=" pl-2 mt-2">
                    <h1 class=" capitalize font-medium">address:</h1>
                    <p class=" text-gray-500 font-[300] leading-[1.45]">{{$order->delivery->address}}</p>
                </div>
                <div class=" pl-2">
                    <h1 class=" capitalize font-medium">time:</h1>
                    <p class=" text-gray-500 font-[300]">{{$order->created_at->diffForHumans()}}</p>
                </div>
                <div class=" pl-2">
                    <h1 class=" capitalize font-medium">delivry:</h1>
                    <p class=" text-gray-500 font-[300]">{{$order->created_at->addDays(4)->diffForHumans()}}</p>
                </div>
                <div class=" pl-2">
                    <h1 class=" capitalize font-medium">City:</h1>
                    <p class=" text-gray-500 font-[300]">{{$order->delivery->city}}</p>
                </div>
                <div class=" pl-2">
                    <h1 class=" capitalize font-medium">livraison:</h1>
                    <p class=" text-gray-500 font-[300]"> livraison cost <strong >60DH</strong>  for {{$order->delivery->city}}</p>
                    <h1 class=" capitalize text-lg font-medium">
                        total:{{$order->total}} 
                    </h1>
                </div>
                <hr class=" border-dashed my-2">
                <div class=" flex gap-1 items-center">
                    <button class=" grow capitalize bg-mained py-3 rounded-full text-white">print facture</button>
                    @if (!$order->status)
                    <a href="{{route('order.drop',$order->id)}}" class=" grow capitalize bg-red-500 py-3 rounded-full text-white text-center">cancel order</a>   
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection