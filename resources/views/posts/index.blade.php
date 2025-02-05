<x-login-layout>
  {!! Form::open(['url' => '/posts/create'])!!}
  @csrf
  @method('post')
  <div class="posts_container">
    <div class="icon"><img src="{{ asset('storage/'.(Auth::user()->icon_image)) }}" alt="User Image"></div>
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
  @if($posts->isEmpty())
  <p>まだ投稿がありません。</p>
  @else
  @foreach ($posts as $post)
  <!-- アイコンに相手のプロフィールに飛ぶリンクを仕込む仮で/topになっている -->
  <ul class="posts_timeline">
    <li>
      <a class="icon" href="/profiles/{{$post->user->id}}/otherProfile"><img src="{{ asset('storage/'.($post->user->icon_image)) }}"></a>
    </li>
    <li>{{ $post->user->username }}</li>
    <li>{{ $post->created_at }}</li>
    <li>{{ $post->post }}</li>
    <!-- ログインしてるユーザー以外なら非表示 -->
    @if(Auth::id() === $post->user->id)
    <li>
      <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="{{ asset('images/edit.png') }}"></a>
    </li>
    <li>
      <a class="btn_post" href="/posts/{{$post->id}}/delete"><img src="{{ asset('images/trash.png') }}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか?')" alt="削除">
      </a>
    </li>
    @endif
  </ul>
  @endforeach
  @endif

  <!-- モーダルの中身 -->
  <div class="modal js-modal">
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      {!! Form::open(['url' => '/posts/edit'])!!}
      @csrf
      @method('post')
      <textarea name="post_edit" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="$post->id">
      <!-- <input type="submit" value="更新"> -->
      <button type="submit" class="edit_btn">
        <img src="{{ asset('images/edit.png') }}" alt="更新">
      </button>
      {{ csrf_field() }}
      {{ Form::close() }}
      <!-- <a class="js-modal-close" href="posts/edit">閉じる</a> -->
    </div>
  </div>

</x-login-layout>
