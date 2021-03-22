<?php 
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

// ーーーーーーーーーーーーーーーーーーーーーー自作関数ーーーーーーーーーーーーーーーーーーーーーーーーーーーーー


function connect_mysql($host_name,$db_name,$usr_name,$password){
    try {
        $dsn = "mysql:host=".$host_name.";dbname=".$db_name."; charset=utf8";
        $ret = new PDO($dsn, $usr_name, $password);
    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }
    return $ret;
}

// 使用例
// $dbh = connect_mysql("db","quizy","root","root_pass_shuto");


function mysql_to_arry($dbh,$sql){
    $res = $dbh->query($sql);
    $ret = $res->fetchAll(PDO::FETCH_ASSOC);
    return $ret;
}
// 使用例
// $sql = "SELECT * FROM `questions`";
// $data = mysql_to_arry($dbh,$sql);

// -------------------------------------------------------

$dbh_name_data = connect_mysql("db","web_app","root","root_pass_shuto");
$dbh_time_data = connect_mysql("db","web_app","root","root_pass_shuto");

// ーーーーーーーーーーーーーーーーーーー棒グラフーーーーーーーーーーーーーーーーーーーーー
$sql_all_time ="SELECT DATE_FORMAT(save_date, '%d') AS 'day', all_study_time AS 'time' 
                FROM all_time 
                WHERE DATE_FORMAT(save_date, '%m')=4";

$month_data = mysql_to_arry($dbh_time_data,$sql_all_time);

// ーーーーーーーーーーーーーーーーーーー円グラフ(コンテンツ)ーーーーーーーーーーーーーーーーーーーーー
$sql_contents_time ="SELECT content_id AS 'id', sum(content_study_time) AS 'sum' 
                FROM contents_time 
                WHERE DATE_FORMAT(save_date, '%m')=4
                GROUP BY content_id";

$contents_data = mysql_to_arry($dbh_time_data,$sql_contents_time);

// ーーーーーーーーーーーーーーーーーーー円グラフ(言語)ーーーーーーーーーーーーーーーーーーーーー
$sql_languages_time ="SELECT language_id AS 'id' , sum(language_study_time) AS 'sum'
                FROM languages_time 
                WHERE DATE_FORMAT(save_date, '%m')=4
                GROUP BY language_id";

$languages_data = mysql_to_arry($dbh_time_data,$sql_languages_time);




print_r($month_data);
print_r($contents_data);
print_r($languages_data);

$month_data = json_encode($month_data);
$contents_data = json_encode($contents_data);
$languages_data = json_encode($language_data);

$result_flag = $dbh_time_data->query($sql_all_time);
$result_flag = $dbh_time_data->query($sql_contents_time);
$result_flag = $dbh_time_data->query($sql_languages_time);

if (!$result_flag) {
    print_r( $dbh_time_data->errorinfo());
} 


// TODO:formをきれいにする
// TODO:例外処理
// TODO:JSきれいにする


"SELECT all_time.save_date, all_time.all_study_time, contents_name.content,languages_name.language
FROM all_time,contents_time,languages_time
LEFT JOIN contents_name on contents_name.content_id = contents_time.content_id
LEFT JOIN languages_name on languages_name.language_id = languages_time.language_id
WHERE questions.id = "

?>