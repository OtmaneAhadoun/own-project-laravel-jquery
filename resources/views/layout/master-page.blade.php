<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Montserrat:wght@400;500;600;800;900&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,800&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/jquery.js','resources/js/app.js'])
</head>
<body class=" font-font text-[#444]">
    <x-Header :items=$items></x-Header>
    <div class=" cart-section cartUnderPg w-full h-full invisible fixed top-0 left-0 z-[999] bg-[#00000080]">
        <div class="cartAbovePg transition-all duration-300 translate-x-[384px] w-full flex items-center justify-center max-w-sm absolute right-0 bg-white h-full">
            <div class=" w-[70%] h-[90%] flex flex-col justify-between">
                <div class=" text-xl font-bold capitalize flex justify-between">
                    <h1>your cart</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" class="closeCart cursor-pointer" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>
                </div>
                <div class=" mb-[150px] flex h-[500px] overflow-auto flex-col gap-2">
                    @if (count($items) || count(session()->get('cart',[])))
                    <a href="{{route('clearCart')}}" class=" inline-flex mb-3 gap-2 items-center capitalize text-[#888] ">delete all 
                        <svg xmlns="http://www.w3.org/2000/svg" class="closeCart cursor-pointer"
                         width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6L6.4 19Z"/></svg>

                    </a>
                    @else
                    <div class=" fixed h-fit inset-0 m-auto w-full flex gap-2 flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class=" text-mained" width="100" height="100" viewBox="0 0 24 24"><path fill="currentColor" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25c0-.05.01-.09.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2Z"/></svg>
                        <a href="{{url('/#overview')}}" class="shop bg-[#333] hover:bg-mained transition-all duration-300 p-2 rounded-full font-[500] text-white px-6 uppercase w-fit">SHOP NOW</a>
                    </div>
                    @endif
                    @auth
                    @foreach ($items as $item)
                    <x-CartItem :item=$item/>    
                    @endforeach
                    @endauth
                    @foreach (session()->get('cart',[]) as $item)
                    <x-CartItem :item=$item/>    
                    @endforeach
                </div>
                @if (count($items) || count(session()->get('cart',[])) )
                <div>
                    <p class=" capitalize text-lg my-2">
                        @auth
                        total:<strong class=" font-semibold">{{$total}} DH</strong> 
                        @endauth
                        @guest
                        @php
                        $total = session()->get('cart', []);
                        $final = array_reduce($total, function ($accumulator, $item) {
                            return $accumulator + str_replace("DH","",$item['product']->price)  * $item['quantity'];
                        }, 0);
                        @endphp
                        total:{{$final}}.00DH
                        @endguest
                    </p>
                    <div class="w-full flex gap-2">
                        <a href="{{route('viewCart')}}" class=" text-center bg-[#333] hover:bg-mained transition-all duration-300 p-2 rounded-full font-[500] text-white w-full uppercase">view cart</a>
                        <a href="{{route('createOrderfromCart')}}" class="text-center bg-[#333] hover:bg-mained transition-all duration-300 p-2 rounded-full font-[500] text-white w-full uppercase">put order</a>
                    </div>

                </div>    
                @endif
            </div>
        </div>
    </div>
    @yield('content')
    <x-footer></x-footer>
    @yield('scripts')
    <script type="module">
        $(document).ready(function () {
            $('.searchSection .max-w-xl').on('click',(e)=>{
                e.stopPropagation()
            })
            $('.openSearch').on('click',function(){
                $('.searchSection').removeClass('invisible')
                $('html').css('overflow', 'hidden');
                $(".searchContainer").removeClass('translate-y-[-100%] opacity-0')
            })
            $('.searchSection').on('click',function(){
                $(".searchContainer").addClass('translate-y-[-100%] opacity-0')
                $(this).addClass('invisible');
                $('html').css('overflow', 'unset');
            })
            $('#submitSearchedValue').on('click',function(){
                const value=$("#searchedValue").val()
                if(value){
                    $.ajax({
                        type: "post",
                        url: "{{route('searchClient')}}",
                        data: {value,"_token":"{{csrf_token()}}"},
                        dataType: "html",
                        success: function (response) {
                            $('.searchResult').html(response);
                        }
                    });
                }else{
                    $('.searchResult').html("<h1 class='absolute capitalize m-auto inset-0 w-fit h-fit'>search for product...</h1>")
                }
            })
            $('.navdrop li a').on('click',function(){
                $('.navdrop').removeClass('translate-y-[0%]')
              })
              $('.hide').on('click',function(){
                $('.navdrop').removeClass('translate-y-[0%]')
              })
        })
    </script>
</body>
</html>