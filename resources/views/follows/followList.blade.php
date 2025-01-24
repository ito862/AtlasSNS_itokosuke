<x-login-layout>

  <h2>フォローリスト！！</h2>
  @if($follows->isEmpty())
  <p>フォローしているユーザーはいません。</p>
  @else
  @foreach($follows as $follow)
  <div>{{ $follow->name }}</div>
  @endforeach

  @endif

</x-login-layout>
