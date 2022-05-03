<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>DAWN SNS @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="images/dawn.png" sizes="16x16" type="image/png" />
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
<!-- ヘッダースタート -->
<header>
            <!-- メインロゴを押すとトップページに戻るよう設定 -->
    <div class="menu-bar"><a href="/top"><img src="{{ asset('images/main_logo.png') }}"></a></div>

        <ul class="menu">
            <li>
                <a href="javascript:void(0);" class="init-bottom"><?php $user = Auth::user(); ?>{{ $user->username }}さん<img src="{{ asset('/images/'. $user->images) }}" class="circle"></a>
                <ul>
                    <li><a href="/top">HOME</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </li>
        </ul>
</header>
    
    @section('sidebar')

    <div id="side-bar">

            <!-- ログイン中のユーザー情報 Auth::user -->
                <p><?php $user = Auth::user(); ?>{{ $user->username }}さんの</p> 
                <div>
                <p class="font-weight-bold">フォロー数</p>
                <span>{{ \App\Http\Controllers\Controller::getMyFollow() }}名</span>
                </div>

        <div class='follow'>
                
                <p class="btn"><a href="/followlist">フォローリスト</a></p>
        </div>
        
                <div>
                <p class="font-weight-bold">フォロワー数</p>
                <span>{{ \App\Http\Controllers\Controller::getMyFollower() }}名</span>
                </div>

        <div class='follower'>
               
                <p class="btn"><a href="/followerlist">フォロワーリスト</a></p>
               
        </div>


        <div class='search'>
            <p class="btn"><a href="/usersearch">ユーザー検索</a></p>
        </div>
    </div>
    @show

    <div id="container">
    <!-- コンテンツ継承 -->
    @yield('content')
</div> 
</div>
 

    <!-- jQueryのURL -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>
</html>