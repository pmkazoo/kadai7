<?php

$show_aquarium_name = $_POST['show_aquarium_name'];

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}

//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
  exit('DBConnectError' . $e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM aquarium where aquarium_name = :show_aquarium_name");
$stmt->bindValue(':show_aquarium_name', $show_aquarium_name, PDO::PARAM_STR);

$status = $stmt->execute();

//３．データ表示
$view = "";
$array = [];
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:" . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($array, $result['canvas']);
  }
}

$js_array = json_encode($array);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript">
    let js_array = JSON.parse('<?php echo $js_array; ?>'); 
  </script>
  <script type="text/javascript" src="js/show.js"></script>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div>
    <canvas id="aquarium-area" width="1030px" height="490px"></canvas>
  </div>

  <form action="index.php" method="GET">
    <input type="submit" value="戻る">
  </form>

</body>

</html>