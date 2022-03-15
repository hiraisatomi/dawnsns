<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <meta name=”twitter:card” content=”SummaryCard” />
    <!-- bootstrap -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

</head>
<body>
    <header>
        <div id = "head">
        <h1><a><img src="images/main_logo.png"></a></h1>
            <div id="user">
       
                <!-- ログイン中のユーザー情報 Auth::user -->
                    <p><?php $user = Auth::user(); ?>{{ $user->username }}さん <img src="images/dawn.png"></p>
                <div>
                <ul>
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">

        @yield('content')
</div>   


    <div id="side-bar">
        <div id="confirm">
            <!-- ログイン中のユーザー情報 Auth::user -->
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p> 
                <div>
                <p>フォロー数</p>
                <p><?php $user = Auth::user(); ?>{{ $user->follow }}名</p>
                </div>

            <div class='followlist'>
                <p class="btn btn-success"><a href="post/follow">フォローリスト</a></p>
            </div>

                <div>
                <p>フォロワー数</p>
                <p><?php $user = Auth::user(); ?>{{ $user->follower }}名</p>                
                </div>

            <div class='followerlist'>
                <p class="btn btn-success"><a href="post/follower">フォロワーリスト</a></p>
            </div>


            <br>

        <div class='search'>
            <p class="btn btn-success"><a href="/usersearch">ユーザー検索</a></p>
        
            <p class="btn btn-success"><a href="">つぶやき検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
<!-- モーダルダイアログ表示のjQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</body>
</html>