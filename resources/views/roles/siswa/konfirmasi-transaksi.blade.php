<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ Auth::user()->name }}
    </h2>
  </x-slot>

  <x-slot name="slot">
    <p class="text-black text-2xl lg:text-3xl font-bold text-center">Konfirmasi Pembelian</p>
    <div class="flex flex-col border-b border-black">
      <p class="text-base lg:text-lg font-bold">Nama Pembeli</p>
      <p class="text-base lg:text-lg">{{ $transaction->user->name }}</p>
    </div>
    <div class="flex flex-col border-b border-black">
      <p class="text-base lg:text-lg font-bold">Produk</p>
      <div class="flex flex-row justify-between">
        <div class="flex flex-col">
          <p class="text-base lg:text-lg">{{ $transaction->product->name }}</p>
          <p class="text-base lg:text-lg">@currency( $transaction->product->price )</p>
        </div>
        <div class="flex flex-row gap-1 self-end">
          <p class="text-base lg:text-lg">x</p>
          <p class="text-base lg:text-lg">{{ $transaction->quantity }}</p>
        </div>
      </div>
    </div>
    <div class="flex flex-col z-50 fixed w-full bottom-0 left-1/2 transform -translate-x-1/2 p-3 max-w-7xl">
      <div class="flex flex-row justify-between">
        <p class="text-base lg:text-lg">Total Harga</p>
        <p class="text-base lg:text-lg font-bold">@currency( $transaction->price )</p>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <form action="{{ route('tidakjadi', $transaction) }}" method="post">
          @csrf
          @method('delete')
          <button type="submit" class="bg-red-500 p-2 rounded-lg w-full">
            <p class="text-base lg:text-lg">Kembali</p>
          </button>
        </form>

        <form action="{{ route('bayartransaksi') }}" method="post">
          @csrf
          <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
          <button type="submit" class="bg-green-500 p-2 rounded-lg w-full">
            <p class="text-base lg:text-lg">Beli</p>
          </button>
        </form>

      </div>
    </div>
  </x-slot>
</x-app-layout>