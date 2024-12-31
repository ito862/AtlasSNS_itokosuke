<x-login-layout>

  <h2>フォローリスト！！</h2>
  @foreach ($following as $following)
  <a><img src="{{ asset('storage/' .$following->images) }}" alt="フォローアイコン"></a>
</x-login-layout>
