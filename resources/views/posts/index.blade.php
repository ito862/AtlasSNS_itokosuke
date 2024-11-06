<x-login-layout>

  {!! Form::open(['url' => 'posts']) !!}

  <div>
    <img src="{{ Auth::user()->image ?: asset('images/icon1.png') }}" alt="User Image">
    {{ Form::text('post',null,['size' => 50 ,'placeholder' => '稿内容を入力してください','class' => 'post_form']) }}
    <button type="submit" class="btn btn_post"><img src="images/post.png"></button>

  </div>

</x-login-layout>
