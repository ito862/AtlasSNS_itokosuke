<x-login-layout>
  <div class="iconContainer">
    <h2>フォロワーリスト</h2>
    <!-- アイコン表示 -->
    <ul class="icon_show">
      @foreach ($followedUsers as $followedUser)
      <li> <a class="follow_icon" href="/profiles/{{$followedUser->id}}/otherProfile"><img src="{{ asset('storage/'.($followedUser->icon_image)) }}"></a></li>
      @endforeach
    </ul>
  </div>
  <!-- postsの表示 -->
  @if ($posts->isEmpty())
  <p>フォローしているユーザーの投稿がありません。</p>
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
