<x-login-layout>

  {!! Form::open(['url' => 'search']) !!}
  @csrf
  @method('post')
  <div class="search_container">
    {{ Form::text('keyword',$keyword ?? '',['class' => 'from','placeholder' => 'ユーザー名','class' => 'search_form']) }}
    {{ Form::close() }}
    <button type="submit" class="search_icon"><img src="images/search.png"></button>
  </div>
  <div class="searchWrapper">
    @foreach ($users as $user)
    <ul class="showList">
      <li>
        <a class="icon" href="/profiles/{{$user->id}}/otherProfile"><img src="{{ asset('storage/'.($user->icon_image)) }}"></a>
      </li>
      <li class="username">{{ $user->username }}</li>
      <li>
        {!! Form::open(['url' => '/follow', 'method' => 'POST']) !!}
        @csrf
        @method('POST')
        @if(Auth::user()->followings->contains($user->id))
        <!-- フォロー中なら「フォロー解除」ボタンを表示 -->
        <input type="hidden" name="id" value="{{$user->id}}">
        {{ Form::submit('フォロー解除', ['class' => 'btn_unfollow']) }}
        @else
        <!-- フォローしていなければ「フォローする」ボタンを表示 -->
        <input type="hidden" name="id" value="{{$user->id}}">
        {{ Form::submit('フォローする', ['class' => 'btn_follow']) }}
        @endif
        {!! Form::close() !!}
      </li>
      @endforeach
    </ul>
  </div>

</x-login-layout>
