@include('components.homemade.alert')
<p class="text-black text-2xl lg:text-3xl font-bold text-center">Beranda</p>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
  @include('components.homemade.card-info-product')
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
  <div class="overflow-scroll">
    <table class="w-full">
      <caption class="caption-top text-base lg:text-lg font-bold">Daftar Produk</caption>
      <thead>
        <tr>
          <th class="border border-black p-2 w-9">
            <p class="text-black text-base lg:text-lg">No</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Nama</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Harga</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Stok Awal</p>
          </th>
          <th class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">Stok Akhir</p>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($allProducts as $key => $product)
        <tr class="text-center">
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $key + 1 }}</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $product->name }}</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">@currency( $product->price )</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $product->first_stock }}</p>
          </td>
          <td class="border border-black p-2">
            <p class="text-black text-base lg:text-lg">{{ $product->last_stock }}</p>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<p class="text-black text-xl lg:text-2xl font-bold text-center">Transaksi Masuk</p>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
  @foreach($allTransactions as $key => $transaction)
  <form method="post" action="{{ route('lanjuttransaksi') }}" class="flex flex-col gap-2 bg-white px-2 lg:px-5 py-3 rounded-lg shadow-xl relative">
    @csrf
    <div class="w-10 h-10 aspect-square rounded-full bg-green-500 flex flex-col items-center justify-center absolute right-1 top-1">
      <p class="text-black text-base lg:text-lg font-bold">{{ $transaction->user_id }}</p>
    </div>
    <p class="text-black text-base lg:text-lg">{{ $transaction -> user->name }}</p>
    <div class="flex flex-row justify-between">
      <p class="text-black text-base lg:text-lg font-bold">Barang</p>
      <div class="flex flex-col">
        <p class="text-black text-base lg:text-lg">{{ $transaction -> product -> name }}</p>
      </div>
      <div class="flex flex-col">
        <p class="text-black text-base lg:text-lg">x {{ $transaction -> quantity }}</p>
      </div>
    </div>
    <div class="flex flex-row justify-between">
      <p class="text-black text-base lg:text-lg">{{ $transaction -> status }}</p>
      <p class="text-black text-base lg:text-lg">{{ $transaction -> created_at }}</p>
    </div>
    <p class="text-black text-base lg:text-lg font-bold">Total: @currency( $transaction -> price )</p>
    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
    <div class="grid grid-cols-2 gap-2">
      <button type="submit" name="action" value="terima" class="bg-green-500 p-2 rounded-lg w-full text-center">
        <p class="text-black font-semibold text-base lg:text-lg">Selesai</p>
      </button>
      <a id="openDialog" class="bg-red-500 p-2 rounded-lg w-full text-center cursor-pointer">
        <p class="text-black font-semibold text-base lg:text-lg">Gagal</p>
      </a>
    </div>

    <div id="dialog" class="hidden fixed inset-0 overflow-y-auto">
      <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white w-1/2 p-6 rounded shadow-lg">
          <p class="text-xl font-bold mb-4">Apakah ingin mengembalikan saldo pengguna?</p>
          <div class="flex justify-between">
            <button id="btnYes" name="action" value="gagal-balikin" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-2">
              Ya
            </button>
            <button id="btnNo" name="action" value="gagal-gakbalikin" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
              Tidak
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  @endforeach
</div>