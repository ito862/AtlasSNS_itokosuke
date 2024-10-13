<x-logout-layout>

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => 'login']) !!}
  <div class=login_wrapper>
    <p class="login_title">AtlasSNSへようこそ</p>

    <ul class="login_form">
      <li class="email_text">{{ Form::label('メールアドレス') }}</li>
      <li>{{ Form::text('email',null,['class' => 'input']) }}</li>
      <li class="password_text">{{ Form::label('パスワード') }}</li>
      <li>{{ Form::password('password',['class' => 'input']) }}</li>
      {{ Form::submit('ログイン', ['class'=>'btn_login']) }}
    </ul>

    <a class="register_link" href="register">新規ユーザーの方はこちら</a>

    {!! Form::close() !!}
  </div>
</x-logout-layout>
