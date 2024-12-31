<x-login-layout>

  {!! Form::open(['url' => 'search']) !!}
  @csrf
  @method('post')
  <div>
    <h1>ユーザー検索ページ！</h1>
    {{ Form::text('keyword',null,['class' => 'from','placeholder' => 'ユーザー名','class' => 'search_form']) }}
    {{ Form::close() }}
    <button type="submit" class="search_icon"><img src="images/search.png"></button>
  </div>
  <!-- foreachを使って表示？ -->
  @foreach ($users as $user)
  <ul>
    <li>
      <h1>アイコン</h1>
    </li>
    <li>{{ $user->username }}</li>
    <li> <!-- ifを使ってボタンの表示切り替え -->
      {{ Form::submit('フォローする',['class'=>'btn_follow']) }}

      {{ Form::submit('フォロー解除',['class'=>'btn_unfollow']) }}
    </li>
  </ul>
  @endforeach


</x-login-layout>
