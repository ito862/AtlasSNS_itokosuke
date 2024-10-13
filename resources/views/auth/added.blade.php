<x-logout-layout>
  {!! Form::open(['url' => 'added']) !!}

  <div id="clear">
    <p class="added_name"> {{ $username }} さん</p>
    <p class="welcome_atlas">ようこそ! AtlasSNSへ!</p>
    <p class="compleat_text">ユーザー登録が完了しました。</p>
    <p class="compleat_text">早速ログインをしてみましょう!</p>

    <button class="btn_back"><a class="back_link" href="login">ログイン画面へ</a></button>
  </div>
</x-logout-layout>
