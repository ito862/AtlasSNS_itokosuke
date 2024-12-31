<x-login-layout>
  {!! Form::open(['url' => '/posts/create'])!!}
  @csrf
  @method('post')
  <div class="posts_container">
    <div class="icon"><img src="{{ Auth::user()->image ?: asset('images/icon1.png') }}" alt="User Image"></div>
    {{ Form::textarea('post',null,['required','placeholder' => '投稿内容を入力してください。','class' => 'post_form']) }}
    {{ Form::close() }}
    <button type="submit" class="btn_post"><img src="images/post.png"></button>
  </div>
  <!-- エラーメッセージ -->
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <!-- 投稿一覧表示 -->
  <table class="post">
    @if($posts->isEmpty())
    <p>まだ投稿がありません。</p>
    @else
    @foreach ($posts as $post)
    <ul>
      <!-- user_idのとこはユーザーのアイコンに変更予定 -->
      <li>{{ $post->user_id }}</li>
      <li>{{ $post->created_at }}</li>
      <li>{{ $post->post }}</li>
      <li> <a class="btn_post" href="/posts/{{$post->id}}/edit"><img src="{{ asset('images/edit.png') }}" alt="編集">
        </a></li>
      <li><a class="btn_post" href="/posts/{{$post->id}}/delete"><img src="{{ asset('images/trash.png') }}" onclick="return confirm('こちらの本を削除してもよろしいでしょうか?')" alt="削除">
        </a>
      </li>
    </ul>
    @endforeach
    @endif
  </table>

</x-login-layout>
