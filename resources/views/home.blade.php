@extends('layout.master-page',['items'=>$items,'total'=>$total])
@section('title','knjewellry')
@section('content')
<section class="m-auto flex overflow-hidden items-center px-4 2xl:px-0 w-full object-cover min-h-[calc(100vh-110px)] relative">
    <div class="w-full transition-all duration-500 flex changed object-contain h-full absolute inset-0">
        <img class=" w-full h-full object-cover shrink-0" src={{Storage::url('slide1.jpg')}}>
        <img class=" w-full h-full object-cover shrink-0" src={{Storage::url('slide2.jpg')}}>
        <img class=" w-full h-full object-cover shrink-0" src={{Storage::url('slide3.jpg')}}>
        <img class=" w-full h-full object-cover shrink-0" src={{Storage::url('slide4.jpeg')}}>
    </div>
    <div class=" flex-col z-20 max-w-7xl w-full mx-auto p-2 text-white mb-[50px] flex capitalize text-lg font-medium  gap-2 items-start justify-center">
         <p class=" text-5xl font-bold leading-none">new arrivalls</p>
         <p class=" text-2xl font-bold leading-none">h&m</p>
         <p class=" text-5xl font-bold leading-none">jack jones</p>
         <a href="#overview" class="hello mt-5 hover:bg-[#333] capitalize text-lg font-medium transition-all text-white p-2.5 rounded-full px-10 bg-mained">shop now</a>
    </div>
    {{$total}}
</section>
<section class="m-auto py-12 grid grid-cols-mained flex-wrap justify-center gap-6 px-4 2xl:px-0 max-w-7xl">
    <div class="border group h-[300px] relative">
        <img src={{Storage::url('silver.jpeg')}} class="w-full object-cover h-full z-[-1] absolute inset-0" alt="">
        <div class=" opacity-0 duration-500 group-hover:opacity-80 z-[-1] transition-all absolute inset-0 bg-mained">
        </div>
        <div class=" z-20 cursor-pointer capitalize overflow-hidden w-fit border-b-2 border-transparent group-hover:border-white absolute bottom-7 text-white left-7">
            <h1 class=" translate-y-[20px] uppercase font-medium transition-all duration-500 group-hover:translate-y-0">shop now</h1>
        </div>
        <div class="capitalize transition-all duration-500 z-10 text-[#333] group-hover:text-white flex-col flex gap-2 p-4">
            <h1 class="font-bold text-3xl">silver</h1>
            <h4 class='text-[#555] group-hover:text-white transition-all duration-500 text-sm'>spring project</h4>
        </div>
    </div>
    <div class="border group h-[300px] relative">
        <img src={{Storage::url('middle.jpg')}} class="w-full  object-cover h-full z-[-1] absolute inset-0" alt="">
        <div class=" opacity-0 duration-500 group-hover:opacity-80 z-[-1] transition-all absolute inset-0 bg-mained">
        </div>
        <div class=" z-20 cursor-pointer capitalize overflow-hidden w-fit border-b-2 border-transparent group-hover:border-white absolute bottom-7 text-white left-7">
            <h1 class=" translate-y-[20px] uppercase font-medium transition-all duration-500 group-hover:translate-y-0">shop now</h1>
        </div>
        <div class="capitalize transition-all text-[#333] duration-500 z-10 group-hover:text-white flex-col flex gap-2 p-4">
            <h1 class="font-bold text-3xl">gold</h1>
            <h4 class='text-[#555] group-hover:text-white transition-all duration-500 text-sm'>spring project</h4>
        </div>
    </div>
    <div class="border group h-[300px] relative">
        <img src={{Storage::url('women.jpg')}} class="w-full object-cover h-full z-[-1] absolute inset-0" alt="">
        <div class=" opacity-0 duration-500 group-hover:opacity-80 z-[-1] transition-all absolute inset-0 bg-mained">
        </div>
        <div class=" z-20 cursor-pointer capitalize overflow-hidden w-fit border-b-2 border-transparent group-hover:border-white absolute bottom-7 text-white left-7">
            <h1 class=" translate-y-[20px] uppercase font-medium transition-all duration-500 group-hover:translate-y-0">shop now</h1>
        </div>
        <div class="capitalize transition-all duration-500 z-10 text-[#333] group-hover:text-white flex-col flex gap-2 p-4">
            <h1 class="font-bold text-3xl">watches</h1>
            <h4 class='text-[#555] group-hover:text-white transition-all duration-500 text-sm'>spring project</h4>
        </div>
    </div>
</section>
<main id="overview" class=" scroll-m-[75px] w-full p-2 md:p-0 max-w-7xl flex-col flex gap-4 m-auto min-h-screen">
    <h1 class=" font-bold text-4xl px-2 text-[#222]">Product Overview</h1>
    @if(session('warning'))
    <div class="bg-mained text-center py-4 lg:px-4">
        <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
          <span class="flex rounded-full bg-mained uppercase px-2 py-1 text-xs font-bold mr-3">tip</span>
          <span class="font-semibold mr-2 text-left flex-auto capitalize">{{session('warning')}}</span>
        </div>
      </div>
    @endif
    <div>
        <ul class="flex filterSection px-2 flex-wrap gap-3 capitalize overflow-x-auto ">
            <li class=" cursor-pointer py-2 shrink-0 leading-none text-sm hover:text-black border-black  border-b transition-all duration-500 text-black">all</li>
            @foreach ($categories as $category)
            <li class=" cursor-pointer py-2 shrink-0 leading-none text-[15.5] hover:text-black hover:border-black border-b border-transparent transition-all duration-500 text-[#888]">{{$category->title}}</li>
            @endforeach
        </ul>
    </div>
    <div class="p-2 relative productsSection justify-center grid-cols-carts  gap-4 grid ">
        @forelse ($product as $item)
        <x-cart :item="$item"></x-cart>
        @empty
        <h1 class=" capitalize inset-0 m-auto absolute w-fit py-8">no product yet</h1>
        @endforelse
    </div>
    {{-- <div class=" w-full flex justify-center ">
        <button class=" p-2.5 px-10 hover:bg-[#333] hover:text-white transition-all duration-500 uppercase text-[15px] font-[400] rounded-full text-black bg-[#e6e6e6]">load more</button>
    </div> --}}
</main>
<script type="module">
    $(document).ready(function () {
        $('.filterSection li').each(function () {
            const element = $(this);
            element.on('click',function(){
                $.ajax({
                    type: "post",
                    url: "{{route('filterByCaregory')}}",
                    data: {category:$(this).text(),_token:"{{csrf_token()}}"},
                    dataType: "html",
                    success: function (response) {
                        $('.productsSection').html(response);
                        $('.product-animate').hide().each(function(index) {
                        $(this).fadeIn(500);
                        });
                    }
                });
                $('.filterSection li').each(function(){
                    $(this).removeClass('text-black border-black');
                    $(this).addClass('border-transparent');
                })
                element.addClass('text-black border-black');
                element.removeClass('border-transparent');

            })
        });
    });
</script>
@endsection