        <div id="head">
            <h1 class="sns_title"><a class="title_link" href="top"><img src="images/atlas.png"></a></h1>

            <div id="accordion">
                <p class="header_username"> {{Auth::user()->username}}さん</p>
                <button type="button" class="menu_btn">
                    <span class="inn"></span>
                </button>
                <nav class="accordion_menu">
                    <ul>
                        <li><a href="top">HOME</a></li>
                        <li><a href="profile">プロフィール</a></li>
                        <!-- ログアウトのリンク -->
                        <li>
                            <!-- 調子が悪いと普通に動かないJavaScriptが重いのか原因不明 -->
                            <form action="{{ route('/logout') }}" method="POST">
                                @csrf
                                <a href="#" class="logout-button" onclick="event.preventDefault(); document.getElementById('myForm').submit();">ログアウト</a>
                            </form>
                        </li>
                    </ul>
                </nav>
                <button class="my_icon"><a href="profile"><img src="{{ asset('storage/'.(Auth::user()->icon_image)) }}" alt="User Image"></a></button>
            </div>
        </div>
