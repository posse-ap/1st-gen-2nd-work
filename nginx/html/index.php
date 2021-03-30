<?php 
// require('function.php');
include __DIR__ . '/function.php';
?>

<!DOCTYPE html>
<html lang="ja">
<!-- TODO: FIXME: -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学習時間表</title>
    <link rel="stylesheet" href="./style_pc.css">
</head>

<script  type="text/javascript">
var DateArray = <?php echo $month_data ?>;
var ContentsArray = <?php echo $contents_data ?>;
var LanguageArray = <?php echo $languages_data ?>;
</script>

<body>
    <!-- FIXME:ロード画面 -->

    <div id="overlay" class="overlay">
        <div class="cv-spinner">
            <span class="spinner"></span>
        </div>
    </div>
    <!--------------------------------------------ヘッダー---------------------------------------->
    <header>
        <div class="headerInner">
            <div class="headerInner_left">
                <img class="headerInner_posse" alt="posse" src="img/posse.png">
                <div class="headerInner_text">
                    <div>4th week </div>
                </div>
            </div>
            <button id="openModal">記録・投稿</button>
        </div>
    </header>

    <main class="main">
        <div class="container">
            <!-- left->studyTime -->
            <div class="studyTime">
                <div class="studyTime_boxes">

                    <div class="studyTime_box">
                        <div class="studyTime_box_title">
                            Today
                        </div>
                        <span class="number">
                        <?php echo $day_time_data[0]['time'] ?>
                        </span>
                        <div class="studyTime_box_hour">
                            hour
                        </div>
                    </div>
                    <div class="studyTime_box">
                        <div class="studyTime_box_title">
                            Month
                        </div>
                        <span class="number">
                        <?php echo $month_time_data[0]['time'] ?>
                        </span>
                        <div class="studyTime_box_hour">
                            hour
                        </div>
                    </div>
                    <div class="studyTime_box">
                        <div class="studyTime_box_title">
                            <div>Total</div>
                        </div>
                        <span class="number">
                        <?php echo $year_time_data[0]['time'] ?>
                        </span>
                        <div class="studyTime_box_hour">
                            <div>hour</div>
                        </div>
                    </div>
                </div>
                <div class="studyTime_barGraph_Box">

                    <div id="bargraph"></div>

                    <!-- <img class="studyTime_barGraph" src="img/glaph.png"> -->
                </div>
            </div>
            <div class="pieChart">

                <div class="pieChart_box">
                    <div class="pieChart_box_title">
                        <h2>学習言語</h2>
                    </div>
                    <!-- <img class="pieChart_box_img" src="img/content.png"> -->
                    <div id="pieChart_language">
                    </div>
                    <div class="pieChart_box_legends">
                        <!--TODO:囲ってあるspanにclassつける  -->
                        <span><span class="legend js_color">JavaScript</span></span>
                        <span><span class="legend css_color">CSS</span></span>
                        <span><span class="legend php_color">PHP</span></span>
                        <span><span class="legend html_color">HTML</span></span>
                        <span><span class="legend laravel_color">Laravel</span></span>
                        <span><span class="legend sql_color">SQL</span></span>                      
                        <span><span class="legend shell_color">SHELL</span></span>                    
                        <span><span class="legend other_color">情報システム基礎知識</span></span>
                    </div>
                </div>

                <div class="pieChart_box">
                    <div class="pieChart_box_title">
                        <h2>学習コンテンツ</h2>
                    </div>
                    <!-- <img class="pieChart_box_img" src="img/time.png"> -->
                    <div id="pieChart_contents">
                    </div>
                    <div class="pieChart_box_legends">
                        <!-- FIXME:丸と文字で一つの箱にする インラインにしとく -->
                        <span class="legend dotinstall_color">ドットインストール</span>
                        
                        <span class="legend nyobi_color">N予備校</span>
                        
                        <span class="legend posse_color">POSSE課題</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- モーダルエリアここから -->
        <!--TODO: ロード画面の作成 -->
        <section id="modalArea" class="modalArea">
            <div id="modalBg" class="modalBg">
            </div>
            <div class="modalWrapper">
                <!-- 成功時の画像(display noneにしてある) -->
                <div class="success_img" id="success">
                    <img src="img/success.png">
                </div>
                <form action="" method="POST">
                <div class="modalContents" id="modal_contents">
                        <div class="modal_top">
                            <div class="modal_top_left">
<!-- TODO:タイトルタグを使っては？？(~titleにしとくかも？？) -->
                                <div class="modal_day_text">
                                    学習日
                                </div>

                                <div class="modal_day_box">
                                    <input name="date" type="date" />
                                </div>

                                <div class="modal_contents_text">
                                    学習コンテンツ(複数選択可)
                                </div>
                                <!-- チェックbox -->
                                <div class="modal_contents_choices">

                                    <input id="modal_check1" value="1" type="checkbox" name="checkbox01"><label
                                        for="modal_check1" class="checkbox01">&emsp;&emsp;N予備校</label>
                                    <input id="modal_check2" value="2" type="checkbox" name="checkbox01"><label
                                        for="modal_check2" class="checkbox01">&emsp;&emsp;ドットインストール</label>
                                    <input id="modal_check3" value="3" type="checkbox" name="checkbox01"><label
                                        for="modal_check3" class="checkbox01">&emsp;&emsp;posse課題</label>

                                    <div class="modal_contents_text">
                                        学習学習言語(複数選択可)
                                    </div>

                                    <input id="modal_check4" value="4" type="checkbox" name="checkbox01"><label
                                        for="modal_check4" class="checkbox01">&emsp;&emsp;HTML</label>
                                    <input id="modal_check5" value="5" type="checkbox" name="checkbox01"><label
                                        for="modal_check5" class="checkbox01">&emsp;&emsp;CSS</label>
                                    <input id="modal_check6" value="6" type="checkbox" name="checkbox01"><label
                                        for="modal_check6" class="checkbox01">&emsp;&emsp;JavaScript</label>
                                    <input id="modal_check7" value="7" type="checkbox" name="checkbox01"><label
                                        for="modal_check7" class="checkbox01">&emsp;&emsp;PHP</label>
                                    <input id="modal_check8" value="8" type="checkbox" name="checkbox01"><label
                                        for="modal_check8" class="checkbox01">&emsp;&emsp;Laravel</label>
                                    <input id="modal_check9" value="9" type="checkbox" name="checkbox01"><label
                                        for="modal_check9" class="checkbox01">&emsp;&emsp;SQL</label>
                                    <input id="modal_check10" value="10" type="checkbox" name="checkbox01"><label
                                        for="modal_check10" class="checkbox01">&emsp;&emsp;SHELL</label>
                                    <input id="modal_check11" value="11" type="checkbox" name="checkbox01"><label
                                        for="modal_check11" class="checkbox01">&emsp;&emsp;情報基礎知識(その他)</label>

                                </div>

                            </div>


                            <div class="modal_top_right">

                                <div class="modal_time_text">
                                    学習時間
                                </div>

                                <div class="modal_time_box">
                                    <input type="text" size="12" class="time_box">
                                </div>

                                <div class="modal_top_right_tweetBox">
                                        twitter用コメント
                                        <br>
                                        <textarea id="txtbox" name="comment" class="tweetBox"></textarea>
                                    <input id="modal_check12" value="12" type="checkbox" name="checkbox01"><label
                                        for="modal_check12" class="checkbox01">&emsp;&emsp;Twitterに自動投稿する</label>
                                </div>
                            </div>

                        </div>
                        <div class="modal_bottom">
                            <div class="modal_button">
                                <!-- FIXME:id=sendが悪さをしているよ -->
                                <!-- <button id="send" type="submit" class="btn">記録・投稿</button> -->
                                <button type="submit" >記録・投稿</button>
                                <!-- <input type="submit" > -->
                            </div>
                        </div>
                </div>
                </form>

                <div id="closeModal" class="closeModal">
                    ×
                </div>

            </div>
        </section>

        <div class="footer">
            <div class="footer_text">
                <label onclick="location.href='./test_2.html'" class="page_button">&lt;</label>
                2020 10月
                <label onclick="location.href='./test_1.html'" class="page_button">&gt;</label>
                <button id="openModal2">記録・投稿</button>
            </div>
        </div>

    </main>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript">
    </script>
    <script type="text/javascript" src="https://www.google.com/jsapi">
    </script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="./posse.js">
    </script>
</body>

<!-- <form action="" method="post" >
<p> 名前: <input type="text" name="name" value=""></p>
<p>年齢: <input type="text" name="age" value=""></p>
<input type="submit" >
</form> 

</html>-->

<!-- <p><?php echo htmlspecialchars(@$_POST['comment'], ENT_QUOTES, 'UTF-8'); ?>さん。</p>  -->