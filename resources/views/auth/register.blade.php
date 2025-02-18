<x-logout-layout>
    <!-- 適切なURLを入力してください -->
    {!! Form::open(['url' => 'register']) !!}
    <!-- エラーメッセージ -->
    @if ($errors->any())
    <div class="error-container">
        <ul>
            @foreach ($errors->all() as $error)
            <li class="error-message">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="register_wrapper">
        <h2 class="register_title">新規ユーザー登録</h2>
        <ul class="register_form">
            <li class="username_text">{{ Form::label('ユーザー名') }}</li>
            <li>{{ Form::text('username',null,['class' => 'input']) }}</li>

            <li class="email_text">{{ Form::label('メールアドレス') }}</li>
            <li>{{ Form::email('email',null,['class' => 'input']) }}</li>

            <li class="password_text">{{ Form::label('パスワード') }}</li>
            <li>{{ Form::text('password',null,['class' => 'input']) }}</li>

            <li class="password_text">{{ Form::label('パスワード確認') }}</li>
            <li>{{ Form::text('password_confirmation',null,['class' => 'input']) }}</li>

            {{ Form::submit('登録',['class'=>'btn_register']) }}
        </ul>

        <p><a class="buck_login_link" href="login">ログイン画面へ戻る</a></p>

        {!! Form::close() !!}

</x-logout-layout>
