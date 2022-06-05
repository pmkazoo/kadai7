<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/colorjoe.min.js"></script>
    <script src="js/draw.js"></script>
    <link rel="stylesheet" href="css/colorjoe.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>お絵描き水族館へようこそ！</h1>
    </header>

    <div class="drawing-wrapper">
        <h2>好きな生き物を描いてね</h2>
        <div>
            <canvas id="draw-area"
            width="400px"
            height="400px"
            style="border: 1px solid #000000;"></canvas>
            <span id="color-palette"></span>
        </div>

        <!-- <dl class="creature-name">
            <dt>生き物の名前</dt>
            <dd><input type="text" id="name"></dd>
        </dl> -->

        <div>
            <!-- <button id="register-button">登録</button>
            <button id="clear-button">書き直し</button> -->

            <form action="insert.php" method="POST">
                <dl class="draw-name">
                    <dt>水族館の名前</dt>
                    <dd><input type="text" id="aquarium_name" name="aquarium_name"></dd>
                    <dt>生き物の名前</dt>
                    <dd><input type="text" id="name" name="creature_name"></dd>
                </dl>
                <input type="hidden" id="canvas" name="canvas">
                <input type="submit" value="登録" id="register-button">
            </form>
            <button id="clear-button">書き直し</button>
            
        </div>
    </div>

    <div class="aquarium-wrapper">
        <h2>みんなの水族館をのぞいてみよう！</h2>
        <form action="show.php" method="post">
            <dl class="view-name">
                <dt>のぞきたい水族館の名前</dt>
                <dd><input type="text" id="show_aquarium_name" name="show_aquarium_name"></dd>
            </dl>
            <input type="submit" value="水槽をのぞいてみる" id="show-area-button">
            <!-- <button id="new-area-button">新しい水槽にする</button> -->
        </form>

        <!-- <canvas id="aquarium-area"
        width="1030px"
        height="490px"></canvas> -->
    </div>

</body>
</html>