@extends('layout.master-page',['items'=>$items,'total'=>$total])
@section('content')
<div class="max-w-7xl flex mx-auto px-4 flex-col 2xl:px-0">
        <h1 class=" capitalize text-sm py-4 text-[#999]"><a href="{{url('/#overview')}}" class=" text-[#666]">product</a>  > shopping bag</h1>
        <div class="flex flex-wrap items-start content-start gap-10 min-h-[820px] ">
            <form action="{{route('updateCart')}}" class=" overflow-x-auto lg:overflow-x-hidden  basis-[700px] grow flex flex-col border " method="post">
                @csrf
                <table>
                    <thead class=" z-30 h-fit w-full ">
                        <tr class=" w-full  text-left flex border-b h-fit">
                            <th class="py-2  w-[400px] text-[16px] pl-2 text-[#555] font-semibold ">Product</th>
                            <th class="py-2 border-l max-w-[150px] w-full text-[16px] pl-2 text-[#555] font-semibold ">Price</th>
                            <th class="py-2 border-l max-w-[170px] w-full text-[16px] pl-2 text-[#555] font-semibold ">Quantity</th>
                            <th class="py-2 border-l max-w-[150px] w-full text-[16px] pl-2 text-[#555] font-semibold ">Total</th>
                        </tr>
                    </thead>
                    <tbody class="w-full max-h-[500px] overflow-y-auto  flex flex-col">
                        @auth
                        @foreach ($items as $item)
                          <tr class=" item text-[#555] py-6 border-b w-full items-center flex">
                            <td class="w-[400px] p-2 flex gap-1">
                                <a href="{{route('dropFromCart',$item->product->id)}}" class=" min-w-[70px] relative group h-[70px]">
                                    <div class=" text-white opacity-0 cursor-pointer pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 flex justify-center items-center absolute inset-0 bg-[#00000080]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275q-.275-.275-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275L12 13.4Z"/></svg>
                                    </div>
                                    <img class=" w-full h-full shrink-0 object-cover" src={{asset('storage/'.$item->product->mainImage) }} alt="">
                                </a>
                              <h1 class=" overflow-hidden capitalize  elips">{{$item->product->title}}</h1>
                            </td>
                            <td class="py-2 max-w-[150px] w-full pl-2">{{$item->product->price}}</td>
                            <td class="py-2 relative justify-evenly w-[170px] content-start flex gap-1 pl-2">
                                <button type="button" class="w-10 viewMines  h-10 text-white p-2 bg-mained px-4 rounded-full">-</button>
                                <small class="max absolute px-2 bg-white top-[-20%] left-[26%]">Max:{{$item->product->quantity}}</small>
                              <input name="{{$item->id}}" class="max-w-[60px] pl-6 pointer-events-none text-lg viewQuantity outline-none" value="{{$item->quantity}}" type="text" class="">
                              <button type="button" class="w-10 viewPlus h-10 {{$item->quantity==$item->product->quantity ? 'pointer-events-none':''}} text-white p-2 bg-mained px-4 rounded-full">+</button>
                            </td>
                            <td class="pl-2 py-2 max-w-[150px] w-full ">{{$item->quantity* str_replace("DH","",$item->product->price)}}DH</td>
                          </tr>  

                        @endforeach                
                        @endauth
                        @guest
                        @foreach ($items as $item)
                        <tr class=" item text-[#555] py-6 border-b w-full items-center flex">
                            <td class="w-[400px] p-2 flex gap-1">
                                <a href="{{route('dropFromCart',$item['product']->id)}}" class=" min-w-[70px] relative group h-[70px]">
                                    <div class=" text-white opacity-0 cursor-pointer pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 flex justify-center items-center absolute inset-0 bg-[#00000080]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275q-.275-.275-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7q.275-.275.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275q.275.275.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275L12 13.4Z"/></svg>
                                    </div>
                                    <img class=" w-full h-full shrink-0 object-cover" src={{asset('storage/'.$item['product']->mainImage) }} alt="">
                                </a>
                              <h1 class=" overflow-hidden capitalize  elips">{{$item['product']->title}}</h1>
                            </td>
                            <td class="py-2 max-w-[150px] w-full pl-2">{{$item['product']->price}}</td>
                            <td class="py-2 relative justify-evenly w-[170px] content-start flex gap-1 pl-2">
                                <button type="button" class="w-10 viewMines  h-10 text-white p-2 bg-mained px-4 rounded-full">-</button>
                                <small class="max absolute px-2 bg-white top-[-20%] left-[26%]">Max:{{$item['product']->quantity}}</small>
                              <input name="{{$item['product']->id}}" class="max-w-[60px] pl-6 pointer-events-none text-lg viewQuantity outline-none" value="{{$item['quantity']}}" type="text" class="">
                              <button type="button" class="w-10 viewPlus h-10 {{$item['quantity']==$item['product']->quantity ? 'pointer-events-none':''}} text-white p-2 bg-mained px-4 rounded-full">+</button>
                            </td>
                            <td class="pl-2 py-2 max-w-[150px] w-full ">{{$item['quantity']*str_replace("DH","",$item['product']->price)}}DH</td>
                          </tr>  
                          @endforeach
                        @endguest
                      </tbody>
                    <tfoot class=" h-20 flex px-2 items-center justify-between ">
                        <tr class=" w-full flex justify-between">
                            <td class=" flex gap-2 items-center">
                                <input class=" w-[190px] outline-none px-4 p-2.5 rounded-full border placeholder:text-[#c9c9c9]" placeholder="Code..." type="text">
                                <button class=" capitalize text-white p-2.5 px-6 rounded-full bg-mained " >applay coupan</button>
                            </td>
                            <td>
                                <button class=" capitalize p-2.5 px-6 border rounded-full bg-[#f3f3f3] hover:bg-mained transition-all hover:border-transparent duration-300 hover:text-white ">update cart</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            <div class=" capitalize gap-1 px-6 py-4 flex grow shrink-0 flex-col border w-full  mx-auto max-w-sm  ">
                <h1 class=" text-xl font-semibold">cart total</h1>
                <h3 class=" py-2 border-b border-dashed text-xl">final total: {{$total}}DH</h3>
                <form action="{{route('createOrder')}}" method="POST" class=" flex py-2 gap-2 flex-col">
                    @csrf
                    <div class=" flex gap-1 flex-col">
                        <label class="text-sm" for="">phone number</label>
                        <input type="number" @auth
                            value="{{ old('phoneNumber') ?: auth()->user()->phonenumber }}"
                        @endauth @guest
                            value="{{ old('phoneNumber')}}"
                        @endguest  name="phoneNumber" class=" rounded-xl outline-none focus:border-gray-300 px-3 bg-[#fafafa] border p-2.5" type="text">
                        @error('phoneNumber')
                                <small class="text-red-400">{{$message}}</small>
                        @enderror
                    </div>
                    <div class=" flex gap-1 flex-col">
                        <label class=" text-sm" for="">city</label>
                        <select name="city" class=" capitalize rounded-xl outline-none focus:border-gray-300 px-3 bg-[#fafafa] border p-3" id="">
                            <option disabled selected>Your City</option>
                            @foreach ($cities as $city)
                                <option {{auth()->user()->city==$city? "selected" :""}} value="{{$city}}">{{$city}}</option>
                            @endforeach
                        </select>
                        @error('city')
                        <small class="text-red-400">{{$message}}</small>
                        @enderror
                    </div>
                    <div class=" flex gap-1 flex-col">
                        <label class=" text-sm" for="">address</label>
                        <textarea name="address" class="rounded-xl h-40 resize-none outline-none focus:border-gray-300 px-3 bg-[#fafafa] border p-2" type="text">@auth{{ old('address') ?: auth()->user()->address }}@endauth @guest{{ old('address') }}@endguest</textarea>
                        @error('address')
                        <small class="text-red-400">{{$message}}</small>
                        @enderror
                    </div>
                    <hr class=" border-dashed">
                    <div class=" w-full pt-2 flex gap-1">
                        <button type="submit" class=" text-center py-2.5 px-4 text-white bg-mained rounded-full capitalize grow">put order</button>
                        <a href="{{url('/#overview')}}" class=" text-center py-2.5 px-4 text-white bg-[#222] rounded-full capitalize grow">back shop</a> 
                    </div>
                </form>
            </div>
        </div>
</div>
@endsection