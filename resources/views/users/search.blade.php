<x-login-layout>

  {!! Form::open(['url' => 'search']) !!}

  <div>
    <h1>ユーザー検索ページ！</h1>
    {{ Form::text('search',null,['class' => 'from','placeholder' => 'ユーザー名']) }}
    <button type="submit" class="btn btn_success"><img src="images/search.png"></button>
  </div>


</x-login-layout>
