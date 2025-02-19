<x-login-layout>
  {!! Form::open(['url' => 'profile/update','enctype' => 'multipart/form-data']) !!}
  @csrf
  @method('post')
  @if ($errors->any())
  <div class="error-container">
    <ul>
      @foreach ($errors->all() as $error)
      <li class="error-message">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="profile_container">
    <div class="profile_icon">
      <img src="{{ asset('storage/'.(Auth::user()->icon_image)) }}" alt="User Image">
    </div>
    <ul class="update_form">
      {{ form::hidden('id', Auth::user()->id) }}

      <li>{{ Form::label('ユーザー名') }}
        {{ Form::text('username',Auth::user()->username,['class' => 'form-control']) }}
      </li>

      <li>{{ Form::label('メールアドレス')}}
        {{ Form::email('email',Auth::user()->email,['class' => 'form-control']) }}
      </li>

      <li>{{ Form::label('パスワード')}}
        {{ Form::password('password',null,['class' => 'form-control']) }}
      </li>

      <li>{{ Form::label('パスワード確認')}}
        {{ Form::password('password_confirmation',null,['class' => 'form-control']) }}
      </li>

      <li>{{ Form::label('自己紹介')}}
        {{ Form::text('bio',Auth::user()->bio?: '',['class' => 'form-control']) }}
      </li>

      <li>{{ Form::label('アイコン画像')}}
        {{ Form::file('icon_image',['accept' => 'images/※','class' => 'file_up']) }}
      </li>

      <li class="btn_box">{{ Form::submit('更新',['class'=>'btn_update']) }}</li>

    </ul>
    {{ Form::close() }}
  </div>
</x-login-layout>
