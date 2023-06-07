@forelse ($products as $product)
    <x-cart :item="$product"></x-cart>
@empty
    <h1 class=" capitalize inset-0 m-auto absolute w-fit py-8">no product yet</h1>
@endforelse