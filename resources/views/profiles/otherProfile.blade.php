<x-login-layout>
  <ul class="otherUser">
    <li>
      <div class="icon"><img src="{{ asset('storage/' . optional($profiles)->icon_image) }}"></div>
    </li>
    <li>{{ optional($profiles)->username }}</li>
    <li>{{ optional($profiles)->bio }}</li>
    <li>
      {!! Form::open(['url' => '/follow', 'method' => 'POST']) !!}
      @csrf
      @method('POST')
      @if(Auth::user()->followings->contains(optional($profiles)->id))
      <!-- フォロー中なら「フォロー解除」ボタンを表示 -->
      <input type="hidden" name="id" value="{{optional($profiles)->id}}">
      <!-- 今いるページのurlを送信してリダイレクト先を変える -->
      <input type="hidden" name="redirect_to" value="{{ request()->fullUrl() }}">
      {{ Form::submit('フォロー解除', ['class' => 'btn_unfollow']) }}
      @else
      <!-- フォローしていなければ「フォローする」ボタンを表示 -->
      <input type="hidden" name="id" value="{{optional($profiles)->id}}">
      <!-- 今いるページのurlを送信してリダイレクト先を変える -->
      <input type="hidden" name="redirect_to" value="{{ request()->fullUrl() }}">
      {{ Form::submit('フォローする', ['class' => 'btn_follow']) }}
      @endif
      {!! Form::close() !!}
    </li>
  </ul>

  <!-- posts表示 -->
  @if($posts->isEmpty())
  <p>まだ投稿がありません。</p>
  @else
  @foreach ($posts as $post)
  <ul class="posts_view">
    <li>
      <a class="icon" href="/profiles/{{$post->user->id}}/otherProfile"><img src="{{ asset('storage/'.($post->user->icon_image)) }}"></a>
    </li>
    <li>{{ $post->user->username }}</li>
    <li>{{ $post->created_at }}</li>
    <li>{{ $post->post }}</li>
  </ul>
  @endforeach
  @endif

</x-login-layout>
