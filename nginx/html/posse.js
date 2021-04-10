console.log(bar_date);
//--------------------- こっから棒グラフ---------------------------------------
function create_chart_1() {
    google.load("visualization", "1", { packages: ["corechart"] });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        dataArray = [
            ['day', 'time']
        ];
        var df = $.Deferred();

        // $(function() {
        //     $.ajax({
        //         url: 'study_time.json',
        //         dataType: 'json',
        //     }).done(function(data) {
        //         console.log("success");
        //         // $(data.study_time).each(function () {
        //         // 親要素名？をいれても動く
                $(bar_date).each(function() {
                    console.log('gogogogo');
                    
                    var data_item = [Number(this.day), Number(this.time)];
                    dataArray.push(data_item);
                });
                console.log(dataArray);
                //         df.resolve();
        //     }).fail(function() {
        //         console.log("error");
        //     });
        // });


        // df.done(function() {
            var chartdata = google.visualization.arrayToDataTable(dataArray);

            var options = {
                // title: 'Age vs. Weight comparison',
                //hAxis: { title: 'Age', minValue: 0, maxValue: 15 },
                //vAxis: { title: 'Weight', minValue: 0, maxValue: 15 },
                legend: 'none',
                'chartArea': { top: 10, 'width': '80%', 'height': '80%' },
                //hAxis:{showTextEvery:2}
                //vAxis:{gridlined:{count:7}}
                // legend:{position:'bottom'}
                // baselineColor: 'none',
                // gridlines: 'none',

                // baselineColor: "transparent",
                // gridlines: {
                //     color: "transparent"
                // },
                // textPosition: "none",
                // vAxes: {
                //     gridLines: {
                //         color: '#fffffff'
                //     }
                // },
                vAxis: {
                    gridlines: {
                        color: "#ffffff"
                    },
                    format: "0h"
                },
                hAxis: {
                    gridlines: {
                        color: "#ffffff"
                    }
                },
                baselineColor: "transparent",

                colors: ['#1754EF', '#0F71BD', '#20BDDE']

            };
            var chart = new google.visualization.ColumnChart(document.getElementById('bargraph'));

            chart.draw(chartdata, options);
        // });
    }
}






// --------------こっから円グラフ--------------------------
function create_chart_2() {
    google.load("visualization", "1", { packages: ["corechart"] });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var df = $.Deferred();

        var sum_1 = 0;
        var sum_2 = 0;
        var sum_3 = 0;
        sum_1 = Number(pieChart02_data[0]['time']);
        sum_2 = Number(pieChart02_data[1]['time']);
        sum_3 = Number(pieChart02_data[2]['time']);
        // console.log('sum1', sum_1);
        // $(function() {
        //     $.ajax({
        //         url: 'study_contents.json',
        //         dataType: 'json',
        //     }).done(function(data) {
        //         console.log("success");
        //         console.log(data);
        //         $(data).each(function() {
        //             sum_1 = sum_1 + this.c_1;
        //             sum_2 = sum_2 + this.c_2;
        //             sum_3 = sum_3 + this.c_3;
        //         });

        //         df.resolve();
        //     }).fail(function() {
        //         console.log("error");
        //     });
        // });

        // df.done(function() {
            var chartdata_2 = google.visualization.arrayToDataTable([
                ['day', 'contents'],
                ['N予備校', sum_1],
                ['ドットインストール', sum_2],
                ['posse課題', sum_3]
            ]);
            console.log('chartdata_2', chartdata_2);
            var options = {
                // title: 'Age vs. Weight comparison',
                //hAxis: { title: 'Age', minValue: 0, maxValue: 15 },
                //vAxis: { title: 'Weight', minValue: 0, maxValue: 15 },
                legend: 'none',
                //legend:{position:'bottom'},

                'chartArea': { top: 0, 'width': '100%', 'height': '100%' },
                pieHole: 0.5,
                // colors: ['#1754EF', '#0F71BD', '#20BDDE'],

            };
            var chart_2 = new google.visualization.PieChart(document.getElementById('pieChart_contents'));

            chart_2.draw(chartdata_2, options);
        // });
    }
}



//言語
function create_chart_3() {
    google.load("visualization", "1", { packages: ["corechart"] });
    google.setOnLoadCallback(drawChart);

    function drawChart() {
        var df = $.Deferred();

        var sum_1 = 0;
        var sum_2 = 0;
        var sum_3 = 0;
        var sum_4 = 0;
        var sum_5 = 0;
        var sum_6 = 0;
        var sum_7 = 0;
        var sum_8 = 0;

        // $(function() {
        //     $.ajax({
        //         url: 'study_language.json',
        //         dataType: 'json',
        //     }).done(function(data) {
        //         console.log("success");
        //         $(data).each(function() {
        //             sum_1 = sum_1 + this.l_1;
        //             sum_2 = sum_2 + this.l_2;
        //             sum_3 = sum_3 + this.l_3;
        //             sum_4 = sum_4 + this.l_4;
        //             sum_5 = sum_5 + this.l_5;
        //             sum_6 = sum_6 + this.l_6;
        //             sum_7 = sum_7 + this.l_7;
        //             sum_8 = sum_8 + this.l_8;
        //         });

        //         df.resolve();
        //     }).fail(function() {
        //         console.log("error");
        //     });
        // });
// function checker_kun(name){
//     if(pieChart01_data[name].){
    
    
//     }

// }
// sum_1 = pieChart01_data['HTML'];
// sum_2 = pieChart01_data['CSS'];
// sum_3 = pieChart01_data['JavaScript'];
// sum_4 = pieChart01_data['PHP'];
// sum_5 = pieChart01_data['Laravel'];
// sum_6 = pieChart01_data['SQL'];
// sum_7 = pieChart01_data['SHELL'];
// sum_8 = pieChart01_data['情報基礎知識'];
sum_1 = Number(pieChart01_data[0]['time']);
sum_2 = Number(pieChart01_data[1]['time']);
sum_3 = Number(pieChart01_data[2]['time']);
sum_4 = Number(pieChart01_data[1]['time']);
sum_5 = Number(pieChart01_data[2]['time']);
sum_6 = Number(pieChart01_data[1]['time']);
sum_7 = Number(pieChart01_data[2]['time']);
sum_8 = Number(pieChart01_data[0]['time']);
sum_9 = Number(pieChart01_data[0]['time']);
while (1) {
    
}
// console.log(pieChart01_data);
console.log("papacoco",pieChart01_data);
        // df.done(function() {
            var chartdata_2 = google.visualization.arrayToDataTable([
                ['day', 'contents'],
                [pieChart01_data[0]['study_contents'], sum_1],
                ['CSS', sum_2],
                ['JavaScript', sum_3],
                ['PHP', sum_4],
                ['Laravel', sum_5],
                ['SQL', sum_6],
                ['SHELL', sum_7],
                ['情報基礎知識(その他)', sum_8]
            ]);
            var options = {
                // title: 'Age vs. Weight comparison',
                //hAxis: { title: 'Age', minValue: 0, maxValue: 15 },
                //vAxis: { title: 'Weight', minValue: 0, maxValue: 15 },
                legend: 'none',
                'chartArea': { top: 0, 'width': '100%', 'height': '100%' },
                pieHole: 0.5,
                colors: ['#1754EF', '#0F71BD', '#20BDDE', '#3CCEFE', '#B29EF3', '#6D46EC', '#4A17EF', '#3105C0'],

            };
            var chart_2 = new google.visualization.PieChart(document.getElementById('pieChart_language'));

            chart_2.draw(chartdata_2, options);
        // });
    }
}
create_chart_1();
create_chart_2();
create_chart_3();


window.onresize = function() {
    create_chart_1();
    create_chart_2();
    create_chart_3();
}


//学習したものボタン
$(".btn_modal").click(function(){
    if($(this).hasClass("active")){ // クリックされた要素がclickedクラスだったら
        $(this).removeClass("active");
      $(this).addClass("check");
      $(this).removeClass("checked");
    }else{
      $(this).addClass("active");
      $(this).addClass("checked");
      $(this).removeClass("check");
    }
  });
  $(".btn_twitter").click(function(){
    if($(this).hasClass("active")){ // クリックされた要素がclickedクラスだったら
        $(this).removeClass("active");
      $(this).addClass("checkedmark002");
      $(this).removeClass("checkmark002");
    }else{
      $(this).addClass("active");
      $(this).addClass("checkmark002");
      $(this).removeClass("checkedmark002");
    }
  });
  
var motidashi;
  //ツイート送ってくれる君
  function GetTweet(str,code){
        var target = document.getElementById("HELLO");
    var text_all = document.getElementById("tweetBox");
    motidashi = text_all.value.replace(/\r?\n/g, '%0D%0A');
    // window.location.href = "https://twitter.com/intent/tweet?text=' + motidashi + '"; // 通常の遷移
    TWEET.innerHTML = '<a class="btn btn-lg nav_right_btn nav_right_btn_modal button" href="https://twitter.com/intent/tweet?text=' + motidashi + '" target="_blank">記録・投稿</a>'
}
// $(".nav_right_btn_modal").on("click", function(){
//     if($("checkmark002").hasClass("active")){ // クリックされた要素がclickedクラスだったら
//         window.open("https://twitter.com/intent/tweet?text=" + motidashi, '_blank');
//         // $(this).click(function(){
//         // });
//     }
// });

// ツイートするかしないかボタン
$("a").on('click', myHandler);
$(".btn_twitter").click(function(){
    if($(this).hasClass("active")){ // クリックされた要素がclickedクラスだったら
        $("a").on('click', myHandler);
    }else{
        $("a").off('click', myHandler);
    }
});
function myHandler(e){
    e.preventDefault();
}


// $(".btn").click(function(){
//     $("#overlay").fadeIn(3000);
// });

$(".btn_spiner").on("click", function(){
    $("#overlay").fadeIn(500); //二度押しを防ぐloading表示
    setTimeout(function(){
        $("#overlay").fadeOut(500);
    },(5 * 1000));
    setTimeout(function(){
        done_message();
    },(5 * 1000));
});
$(".nav_right_btn").on("click", function(){
    $(".modal-body").removeClass("modal_content_hide");
    $(".done").addClass("modal_node");
});
function done_message() {
    $(".modal-body").addClass("modal_content_hide");
    $(".done").removeClass("modal_node");
}