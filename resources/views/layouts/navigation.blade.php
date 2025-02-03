        <div id="head">
            <h1 class="sns_title"><a class="title_link" href="{{ url('top') }}"><img src="{{ asset('images/atlas.png') }}"></a></h1>

            <div id="accordion">
                <p class="header_username"> {{Auth::user()->username}}さん</p>
                <button type=" button" class="menu_btn">
                    <span class="inn"></span>
                </button>
                <nav class="accordion_menu">
                    <ul>
                        <li><a href="/top">HOME</a></li>
                        <li><a href="/profile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </nav>
                <button class="my_icon"><a href="profile"><img src="{{ asset('storage/'.(Auth::user()->icon_image)) }}" alt="User Image"></a></button>
            </div>
        </div>
