<?php 
define('DB_HOST', 'db');
define('DB_NAME', 'web_app');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root_pass_shuto');
// phpinfo();
// ーーーーーーーーーーーーーーーーーーurl変更くんーーーーーーーーーーーーーーーーーーーーーー
function url_param_change($par=Array(),$op=0){
    $url = parse_url($_SERVER["REQUEST_URI"]);
    if(isset($url["query"])) parse_str($url["query"],$query);
    else $query = Array();
    foreach($par as $key => $value){
        if($key && is_null($value)) unset($query[$key]);
        else $query[$key] = $value;
    }
    $query = str_replace("=&", "&", http_build_query($query));
    $query = preg_replace("/=$/", "", $query);
    return $query ? (!$op ? "?" : "").htmlspecialchars($query, ENT_QUOTES) : "";
}

// // 追加または上書き
// $url_param = url_param_change(Array("パラメータ名"=>"追加または上書きする内容"));

// // 削除
// $url_param = url_param_change(Array("削除するパラメータ名"=>null));

// // 第2引数を指定
// $url_param = url_param_change(Array("パラメータ名"=>"内容"),1);

// 使用例
// $url_param = url_param_change(Array("id"=>$id));

//https://dgcolor.info/blog/87/ 



try {

    $DB_HOST = "db";
    $DB_NAME = "web_app";
    $DB_USER = "root";
    $DB_PASSWORD = "root_pass_shuto";

    $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME."; charset=utf8";
    $dbh = new PDO($dsn, DB_USER, DB_PASSWORD,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    
    
    
    // ーーーーーーーーーーーーーーーーーーー棒グラフーーーーーーーーーーーーーーーーーーーーー
    $sql_all_time ="SELECT DATE_FORMAT(save_date, '%d') AS 'day', all_study_time AS 'time' 
                FROM all_time 
                WHERE DATE_FORMAT(save_date, '%m')=4";

$month_data = $dbh->query($sql_all_time);
$month_data = $month_data->fetchAll(PDO::FETCH_ASSOC);

// ーーーーーーーーーーーーーーーーーーー円グラフ(コンテンツ)ーーーーーーーーーーーーーーーーーーーーー
$sql_contents_time ="SELECT content_id AS 'id', sum(content_study_time) AS 'sum' 
                FROM contents_time 
                WHERE DATE_FORMAT(save_date, '%m')=4
                GROUP BY content_id";

$contents_data = $dbh->query($sql_contents_time);
$contents_data = $contents_data->fetchAll(PDO::FETCH_ASSOC);

// ーーーーーーーーーーーーーーーーーーー円グラフ(言語)ーーーーーーーーーーーーーーーーーーーーー
$sql_languages_time ="SELECT language_id AS 'id' , sum(language_study_time) AS 'sum'
                FROM languages_time 
                WHERE DATE_FORMAT(save_date, '%m')=4
                GROUP BY language_id";

$languages_data = $dbh->query($sql_languages_time);
$languages_data = $languages_data->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    print_r("エラーだよ");
    // echo $e->getMessage();
    echo "ErrorMes : " . $e->getMessage() . "\n";
    echo "ErrorCode : " . $e->getCode() . "\n";
    echo "ErrorFile : " . $e->getFile() . "\n";
    echo "ErrorLine : " . $e->getLine() . "\n";
    die();
}


print_r($month_data);
print_r($contents_data);
print_r($languages_data);

$month_data = json_encode($month_data);
$contents_data = json_encode($contents_data);
$languages_data = json_encode($language_data);

$result_flag = $dbh->query($sql_all_time);
$result_flag = $dbh->query($sql_contents_time);
$result_flag = $dbh->query($sql_languages_time);

if (!$result_flag) {
    print_r( $dbh_time_data->errorinfo());
} 


// TODO:formをきれいにする
// TODO:例外処理
// TODO:JSきれいにする

?>