<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ Auth::user()->name}}
        </h2>
        @if(Auth::user()->role == "Siswa")
        <div class="relative">
            <img src="{{ url('assets/images/cart.png') }}" alt="Keranjang" class="w-7">
            <div class="w-6 h-6 aspect-square rounded-full bg-green-500 flex flex-col items-center justify-center absolute -top-3 -left-3 opacity-80">
                <p class="text-black text-base lg:text-lg font-bold">{{ $cart }}</p>
            </div>
        </div>
        @endif
    </x-slot>

    <x-slot name="slot">
        @if(Auth::user()->role == "Admin")
        @include('roles.admin.admin-dashboard')
        @endif

        @if(Auth::user()->role == "Bank")
        @include('roles.bank.bank-dashboard')
        @endif

        @if(Auth::user()->role == "Toko")
        @include('roles.toko.toko-dashboard')
        @endif

        @if(Auth::user()->role == "Siswa")
        @include('roles.siswa.siswa-dashboard')
        @endif
    </x-slot>

</x-app-layout>