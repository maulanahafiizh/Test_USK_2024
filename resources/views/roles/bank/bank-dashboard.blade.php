@include('components.homemade.alert')
<p class="text-black text-2xl lg:text-3xl font-bold text-center">Beranda</p>

<form action="{{ route('bank') }}" method="post" class="flex flex-col gap-1">
  @csrf
  <div class="flex flex-col w-full">
    <label for="receiver_id">Nama Penerima</label>
    <select name="receiver_id" id="receiver_id" class="rounded-lg outline-none">
      @foreach($costumers as $key => $costumer)
      <option value="{{ $costumer->id }}">{{ $costumer->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label for="nominal">Nominal</label>
    <input type="number" name="nominal" id="nominal" class="rounded-lg outline-none w-full" placeholder="Masukkan nominal">
  </div>
  <div class="grid grid-cols-2 gap-3">
    <button type="submit" name="action" value="topup" class="border border-black bg-green-500 p-2 rounded-lg w-full">
      <p class="text-base lg:text-lg">Top Up</p>
    </button>
    <button type="submit" name="action" value="withdrawal" class="border border-black bg-green-500 p-2 rounded-lg w-full">
      <p class="text-base lg:text-lg">Tarik Tunai</p>
    </button>
  </div>
</form>

<p class="text-black text-xl lg:text-2xl font-bold text-center">Request Top Up</p>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
  @foreach($allRequestTopUps as $key => $requestTopUp)
  <form method="post" action="{{ route('banktopup') }}" class="flex flex-col gap-2 bg-white px-2 lg:px-5 py-3 rounded-lg shadow-xl relative">
    @csrf
    <div class="w-10 h-10 aspect-square rounded-full bg-green-500 flex flex-col items-center justify-center absolute right-1 top-1">
      <p class="text-black text-base lg:text-lg font-bold">{{ $requestTopUp->user_id }}</p>
    </div>
    <p class="text-black text-base lg:text-lg font-bold">{{ $requestTopUp->user->name }}</p>
    <div class="flex flex-row flex-wrap gap-2 lg:gap-5">
      <p class="text-black text-base lg:text-lg">Nominal :</p>
      <p class="text-black text-base lg:text-lg">@currency( $requestTopUp -> nominal )</p>
    </div>
    <p class="text-black text-base lg:text-lg">{{ $requestTopUp -> created_at }}</p>
    <input type="hidden" name="topup_id" value="{{ $requestTopUp -> id }}">
    <input type="hidden" name="receiver_user_id" value="{{ $requestTopUp -> user_id }}">
    <div class="grid grid-cols-2 gap-2">
      <button type="submit" name="action" value="terimatopup" class="bg-green-500 p-2 rounded-lg w-full text-center">
        <p class="text-black font-semibold text-base lg:text-lg">Terima</p>
      </button>
      <button type="submit" name="action" value="tolaktopup" class="bg-red-500 p-2 rounded-lg w-full text-center">
        <p class="text-black font-semibold text-base lg:text-lg">Tolak</p>
      </button>
    </div>
  </form>
  @endforeach
</div>

<p class="text-black text-xl lg:text-2xl font-bold text-center">Request Tarik Tunai</p>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
  @foreach($allRequestWithDrawals as $key => $requestWithDrawal)
  <form method="post" action="{{ route('bankwithdrawal') }}" class="flex flex-col gap-2 bg-white px-2 lg:px-5 py-3 rounded-lg shadow-xl relative">
    @csrf
    <div class="w-10 h-10 aspect-square rounded-full bg-green-500 flex flex-col items-center justify-center absolute right-1 top-1">
      <p class="text-black text-base lg:text-lg font-bold">{{ $requestWithDrawal->user_id }}</p>
    </div>
    <p class="text-black text-base lg:text-lg font-bold">{{ $requestWithDrawal -> user->name }}</p>
    <div class="flex flex-row flex-wrap gap-2 lg:gap-5">
      <p class="text-black text-base lg:text-lg">Nominal :</p>
      <p class="text-black text-base lg:text-lg">@currency( $requestWithDrawal -> nominal )</p>
    </div>
    <p class="text-black text-base lg:text-lg">{{ $requestWithDrawal -> created_at }}</p>
    <p class="text-black text-base lg:text-lg">{{ $requestWithDrawal -> status }}</p>
    <input type="hidden" name="withdrawal_id" value="{{ $requestWithDrawal -> id }}">
    <input type="hidden" name="receiver_user_id" value="{{ $requestWithDrawal -> user_id }}">
    <div class="grid grid-cols-2 gap-2">
      <button type="submit" name="action" value="terimawithdrawal" class="bg-green-500 p-2 rounded-lg w-full text-center">
        <p class="text-black font-semibold text-base lg:text-lg">Terima</p>
      </button>
      <button type="submit" name="action" value="tolakwithdrawal" class="bg-red-500 p-2 rounded-lg w-full text-center">
        <p class="text-black font-semibold text-base lg:text-lg">Tolak</p>
      </button>
    </div>
  </form>
  @endforeach
</div>