<x-login-layout>

  <div class="profile_container">
    {!! Form::open(['url' => 'profile']) !!}
    <div class="update_form">
      <h1>{{Auth::user()->username}}</h1>








    </div>







    {{ Form::submit('更新',['class'=>'btn_update']) }}

    {{ Form::close() }}
  </div>
</x-login-layout>
