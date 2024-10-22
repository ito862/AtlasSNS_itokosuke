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
                        <li><a href="login">ログアウト</a></li>
                    </ul>
                </nav>

            </div>
        </div>
