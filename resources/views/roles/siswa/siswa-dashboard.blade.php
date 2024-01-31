@include('components.homemade.alert')
<p class="text-black text-2xl lg:text-3xl font-bold text-center">Beranda</p>

<div class="flex flex-col lg:flex-row justify-between items-center gap-1 bg-white p-3 rounded-lg shadow-lg text-center">
  <div class="flex flex-row w-full lg:w-3/5 justify-around items-center">
    <div class="flex flex-col lg:flex-row gap-1">
      <p class="text-lg lg:text-lxl font-bold">Saldo Anda:</p>
      <p class="text-lg lg:text-lxl font-bold">@currency( Auth::user()->balance )</p>
    </div>
  </div>

  <form action="{{ route('siswa') }}" method="post" class="flex flex-col gap-1 w-full">
    @csrf
    <div class="flex flex-col gap-1 items-center">
      <label for="nominal" class="text-lg lg:text-xl font-bold">Nominal</label>
      <input type="number" name="nominal" id="nominal" placeholder="Masukkan nominal" class="rounded-lg outline-none w-full">
    </div>
    <div class="grid grid-cols-2 gap-3">
      <button type="submit" name="action" value="topup" class="border border-black bg-green-500 p-2 rounded-lg w-full">
        <p class="tex-base lg:text-lg">Top Up</p>
      </button>
      <button type="submit" name="action" value="withdrawal" class="border border-black bg-green-500 p-2 rounded-lg w-full">
        <p class="tex-base lg:text-lg">Tarik Tunai</p>
      </button>
    </div>
  </form>
</div>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
  @foreach($allProducts as $key => $product)
  <div class="flex flex-col gap-2 bg-white p-3 rounded-lg shadow-lg text-center">
    <p class="text-lg lg:text-xl font-bold">{{ $product->name }}</p>
    <p class="text-base lg:text-lg text-start">{{ $product->desc }}</p>
    <div class="grid grid-cols-2">
      <div>
        <p class="text-base lg:text-lg font-bold">Harga</p>
        <p class="text-base lg:text-lg font-bold">@currency( $product->price )</p>
      </div>
      <div>
        <p class="text-base lg:text-lg font-bold">Stok</p>
        <p class="text-base lg:text-lg font-bold">{{ $product->last_stock }}</p>
      </div>
    </div>
    <form action="{{ route('lanjutproduk') }}" method="post">
      @csrf
      <div class="flex flex-col gap-2">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="product_price" value="{{ $product->price }}">
        <input type="number" name="product_quantity" id="jumlah_product" class="rounded-lg outline-none w-full" placeholder="Masukkan jumlah produk">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-1">
          <button type="submit" name="action" value="beli" class="border border-black bg-green-500 p-2 rounded-lg w-full">
            <p class="text-base lg:text-lg">Beli</p>
          </button>
          <button type="submit" name="action" value="keranjang" class="border border-black bg-green-500 p-2 rounded-lg w-full">
            <p class="text-base lg:text-lg">Keranjang</p>
          </button>
        </div>
      </div>
    </form>
  </div>
  @endforeach
</div>