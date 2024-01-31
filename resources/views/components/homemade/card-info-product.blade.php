<a href="{{ route('product.index') }}" class="flex flex-row gap-5 bg-white px-5 py-3 rounded-lg shadow-xl">
  <img src="{{ url('assets/images/produk.png') }}" alt="Pengguna" class="w-14 h-auto">
  <div class="flex flex-col">
    <p class="font-bold text-base lg:text-lg">{{ $product }}</p>
    <p class="font-bold text-base lg:text-lg">Produk</p>
  </div>
</a>