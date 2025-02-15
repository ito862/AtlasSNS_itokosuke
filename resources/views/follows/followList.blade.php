<x-login-layout>
  <div class="iconContainer">
    <h2>フォローリスト</h2>
    <!-- アイコン表示 -->
    <ul class="icon_show">
      @foreach ($followUsers as $followUser)
      <li> <a class="follow_icon" href="/profiles/{{$followUser->id}}/otherProfile"><img src="{{ asset('storage/'.($followUser->icon_image)) }}"></a></li>
      @endforeach
    </ul>
  </div>

  <!-- postの表示 -->
  @if ($posts->isEmpty())
  <p>フォローしているユーザーの投稿はありません。</p>
  @else
  @foreach ($posts as $post)
  <ul class="posts_view">
    <li>
      <a class="icon" href="/profiles/{{$post->user->id}}/otherProfile"><img src="{{ asset('storage/'.($post->user->icon_image)) }}"></a>
    </li>
    <li>{{$post->user->username}}</li>
    <li>{{ $post->created_at }}</li>
    <li>{{$post->post}}</li>
  </ul>
  @endforeach
  @endif


</x-login-layout>
