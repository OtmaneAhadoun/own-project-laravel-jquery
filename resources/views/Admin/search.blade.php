<thead class=" z-30 h-fit w-full ">
  <tr class=" w-full text-center capitalize flex border-b h-fit">
      <th class="py-2 w-full pl-2 grow text-sm tracking-wider font-medium ">Title</th>
      <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">Price</th>
      <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">Quantity</th>
      <th class="py-2 border-l w-[200px] shrink-0 text-sm tracking-wider pl-2 font-medium ">images</th>
      <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">brand</th>
      <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">category</th>
      <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">date</th>
      <th class="py-2 border-l max-w-[190px] w-full tracking-wider text-sm pl-2 font-medium ">operations</th>
  </tr>
</thead>
<tbody id="search-results" class="w-full relative h-[535px] overflow-y-auto  flex flex-col">
  @forelse ($products->data as $item)
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
        <div class="w-[200px] hidden deleteSection flex-col shadow-lg justify-between p-1 h-[95px] b absolute bg-white top-[100%] right-0 rounded-sm border">
          <h1 class=" text-sm capitalize tracking-wider">are you realry want to delet this product?</h1>
          <a href="" class=" p-2 w-full rounded-sm bg-red-500 text-white capitalize">delete</a>
        </div>
        <svg class=" text-black hover:text-mained transition-all" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg></button>
      <button><svg class=" text-black hover:text-mained transition-all" xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 48 48"><g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4"><path d="M5.325 43.5h8.485l31.113-31.113l-8.486-8.485L5.325 35.015V43.5Z"/><path stroke-linecap="round" d="m27.952 12.387l8.485 8.485"/></g></svg></button>
    </td>
  </tr>  
  @empty
  <tr class=" w-full h-full flex justify-center items-center">
    <td>
      <h1 class=" text-[16px] tracking-tighter">no item has been selected with this <strong class=" normal-case">"{{$value}}"</strong></h1>
    </td>
  </tr>
  @endforelse               
</tbody>
<tfoot >
<tr>
    <td id="ajax_links_search" class=" border-t p-1">
      {{$products->links()}}
    </td> 
</tr> 
</tfoot>