        <div id="head">
            <h1 class="sns_title"><a class="title_link" href="top"><img src="images/atlas.png"></a></h1>

            <div id="accordion">
                <p class="header_username"> {{Auth::user()->username}}さん</p>
                <button type="button" class="menu_btn">
                    <span class="inn"></span>
                </button>
                <nav class="accordion_menu">
                    <ul>
                        <li><a href="top">ホーム</a></li>
                        <li><a href="profile">プロフィール</a></li>
                        <!-- ログアウトのリンク -->
                        <li><a href="#" id="logout-link">ログアウト</a></li>
                    </ul>
                </nav>
                <button class=" my_icon"><a href="profile"><img src="{{ Auth::user()->image ?: asset('images/icon1.png') }}" alt="User Image"></a></button>
            </div>
            <!-- POST送信用のフォーム -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
