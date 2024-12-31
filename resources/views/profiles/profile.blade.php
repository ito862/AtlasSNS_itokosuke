<x-login-layout>
  {!! Form::open(['url' => 'profile']) !!}

  <div class="profile_container">
    @if(session('message'))
    <div>
      {{ session('message') }}
    </div>
    @endif
    <div class="profile_icon">
      <img src="{{ Auth::user()->image ?: asset('images/icon1.png') }}" alt="User Image">
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
        {{ Form::text('newpassword',null,['class' => 'form-control']) }}
      </li>


      <li>{{ Form::label('パスワード確認')}}
        {{ Form::text('password_confirmation',null,['class' => 'form-control']) }}
      </li>


      <li>{{ Form::label('自己紹介')}}
        {{ Form::text('bio',Auth::user()->bio?: '',['class' => 'form-control']) }}
      </li>

      <li>{{ Form::label('アイコン画像')}}
        <div class="file_up">
          {{ Form::file('images',['enctype' => 'multipart/form-data', 'accept' => 'images/※','class' => 'file_btn']) }}
        </div>
      </li>

      <li class="btn_box">{{ Form::submit('更新',['class'=>'btn_update']) }}</li>

    </ul>


    {{ Form::close() }}
  </div>
</x-login-layout>
