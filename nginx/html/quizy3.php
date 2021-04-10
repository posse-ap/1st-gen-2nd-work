<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
      <?php
  $id = $_GET['id'];
  echo $id;

        if ($id == 0) {
          $title = "東京の難読地名クイズ";
        } else{
          $title = "広島の難読地名クイズ";
        };
      ?>
    <title><?php echo $title ?></title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
    <link rel="stylesheet" href="./quizy3.css">
</head>

<body>
<a href="quizy3.php?id=0" id="tokyo">東京の問題へ</a><br>
<a href="quizy3.php?id=1" id="hiroshima">広島の問題へ</a><br>
<?php



//   print_r(mb_get_info());
// echo phpinfo();

// $dsn = 'mysql:dbname=shop;host=127.0.0.1';
// $user = 'root';
// $password = 'password';

// try {
//     $dbh = new PDO($dsn, $user, $password);
//     echo "接続に成功しました\n";
// } catch (PDOException $e) {
//     echo "接続に失敗しました\n";
//     echo $e->getMessage() . "\n";
// }

    
//<meta charset="UTF-8">
//<title>テスト</title>
//<?php
//    try {
//        # hostには「docker-compose.yml」で指定したコンテナ名を記載
//        $dsn = "mysql:host=quizy_php_0_db_1;dbname=mysql;";
//        $db = new PDO($dsn, 'root', 'pass');
//
//        $sql = "SELECT * FROM questions";
//        $stmt = $db->prepare($sql);
//        $stmt->execute();
//        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//        var_dump($result);
//    } catch (PDOException $e) {
//        echo $e->getMessage();
//        exit;
//    }


// <?php

//  try {
//    $pdo = new PDO(
//      'mysql:host=db;dbname=mysql;charset=utf8mb4',
//      'dbuser',
//      'dbpass',
//      [
//        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//  			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//  			PDO::ATTR_EMULATE_PREPARES   => false,
//      ]
//    );

//    $pdo->query("DROP TABLE IF EXISTS questions");
//    $pdo->query(
//      "CREATE TABLE questions (
//        id INT,
//        name VARCHAR(140)
//      )"
//  	);
	
//  	$pdo->query(
//  		"INSERT INTO questions (id, name) VALUES
//  			(1, '東京の難読地名クイズ'),
//  			(2, '広島県の難読地名クイズ')"
//  	);
  
//    $stmt = $pdo->query("SELECT * FROM questions");
//    $questions = $stmt->fetchAll();
//    foreach($questions as $question) {
//      printf(
//        '%s (%d)' . PHP_EOL,
//        $question['name'],
//        $question['id']
//      );
//    }
//  } catch (PDOException $e) {
//    echo $e->getMessage() . PHP_EOL;
//    exit;
//  }

// http://www.flatflag.nir87.com/pdo_construct-912
// データベースに接続するために必要なデータソースを変数に格納
  // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
  $dsn = 'mysql:host=db;dbname=quizy;charset=utf8mb4;[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]';
 
  // データベースのユーザー名
    $user = 'root';
 
  // データベースのパスワード
    $password = 'root_pass_fB3uWvTS';
 
// tryにPDOの処理を記述
try {
 
  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);
  // echo "接続成功\n";
// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {
 
  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();
 
  // 強制終了
  exit;
 
}

// $result = mysql_select_db('mysql', $dbh);
// if (!$result) {
//   exit('データベースを選択できませんでした。');
// }
if(@$_POST["id"] != "" OR @$_POST["name"] != ""){ //IDおよびユーザー名の入力有無を確認
    // $stmt = $pdo->query("SELECT * FROM questions WHERE ID='".$_POST["id"] ."' OR Name LIKE  '%".$_POST["name"]."%')"); //SQL文を実行して、結果を$stmtに代入する。
    // $stmt = $dbh->query("SELECT * FROM 'questions' WHERE id='".$_POST["id"] ."' OR name LIKE  '%".$_POST["name"]."%')"); //SQL文を実行して、結果を$stmtに代入する。
    // $result = $stmt->fetch();
    // var_dump($result);
}
$stmt = $dbh->query("SELECT * FROM questions WHERE prefecture = $id");
                // " SELECT * FROM contacts  WHERE id LIKE '%" . $_POST["search_name"] . "%' "
$result = $stmt->fetchAll();
$result = array_column($result, 'name');
$result = array_chunk($result, 3);
$result = json_encode($result);
// var_dump($result);
// echo $_SERVER['QUERY_STRING'];
?>
<!-- <h1 id='hiroshima_title'>広島の難読地名クイズ</h1>
<h1 id='tokyo_title'>東京の難読地名クイズ</h1> -->

  <script>
      let question_list = <?php echo $result; ?>;
      let id = <?php echo $id; ?>;
  </script>
  <div id="main" class="main"></div>
  <script src="./quizy3.js"></script>
</body>

</html>
