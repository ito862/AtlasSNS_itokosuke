<x-login-layout>

  {!! Form::open(['url' => 'search']) !!}
  @csrf
  @method('post')
  <div>
    <h1>ユーザー検索ページ！</h1>
    {{ Form::text('keyword',$keyword ?? '',['class' => 'from','placeholder' => 'ユーザー名','class' => 'search_form']) }}
    {{ Form::close() }}
    <button type="submit" class="search_icon"><img src="images/search.png"></button>
  </div>
  <!-- foreachを使って表示？ -->
  @foreach ($users as $user)
  <ul class="list">
    <li>
      <!-- アイコンに相手のプロフィールに飛ぶリンクを仕込む仮で/topになっている -->
      <a class="icon" href="/top"><img src="{{ asset('storage/'.($user->icon_image)) }}"></a>
    </li>
    <li>{{ $user->username }}</li>
    <li> <!-- ifを使ってボタンの表示切り替え /IDを取得する？-->
      {!! Form::open(['url' => '/follow', 'method' => 'POST']) !!}
      @csrf
      @method('POST')
      <!-- ここでif -->
      <!-- フォローしていなければ表示 -->
      <input type="hidden" name="id" value="{{$user->id}}">
      {{ Form::submit('フォローする',['class'=>'btn_follow']) }}

      <!-- ここでelse -->
      <!-- フォローしていれば表示 -->
      <input type="hidden" name="id" value="{{$user->id}}">
      {{ Form::submit('フォロー解除',['class'=>'btn_unfollow']) }}
      {!! Form::close() !!}
    </li>
    @endforeach
  </ul>


</x-login-layout>
