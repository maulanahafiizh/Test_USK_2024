@if (session('status'))
<div class="p-2 w-full bg-green-500 rounded-lg" role="alert">
  <p class="text-white font-bold text-xl lg:text-2xl"> {{ session('status') }}</p>
</div>
@endif