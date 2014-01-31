<?php
// making json file from csv
//$json_data = "[";

/*if (($handle = fopen("data/rank.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, ",")) !== FALSE) {
        $tmp_data = "";
        $flag = 0;*/

//        $data[2] = (log(5)/(log($data[2]+4)));
//$data[2] = (1/log($data[2]+4)/(1/log(5)-1/log(20105))-(1/log(20105)/(1/log(5)-1/log(20105))))*0.99+0.01;
//        $data[2] = (1/(1+($data[2]+1)/20101));
//          $data[2] = pow(2, 20101)/(pow(2, 20101) + pow(2, $data[2]));
//pow(1000000000000000000000000000000000, ((20101-$data[2])/20101)-1)); // change magnitude
        //print($data[2].'-------');

/*        for ($c=0; $c < count($data); $c++) {        	

            if (($data[$c] == "") OR (count($data) <>3) ) $flag = 1;
            $tmp_data .= round($data[$c], 3).",";           
        }
*/
//print_r($tmp_data);
/*        if ($flag == 0) $json_data .= $tmp_data;
    }
    fclose($handle);

    $json_data = substr($json_data, 0, -1)."]";
    //echo $json_data;
	
	$json_file = fopen("data/test.json", "w+");
    fwrite ( $json_file , $json_data);
    fclose($json_file);
}*/
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Общеуниверситетский научно-методический семинар по информатизации учебного процесса и электронному обучению</title>
        <meta name="description" content="сайт семинара НГУ по информатизации учебного процесса и электронному обучению">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="img/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-precomposed.png">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="wraper">

            
            

        

<!--             <header>
                <div class="container"> -->
<!--                 <h1 id="title">
                    <a href="/">
                        Информатизация
                    </a>
                </h1> -->

<!--                     <div class="right-col">      
                        <ul id="nav">
                            <li class="nav-item">
                                <a href="/about/">Семинар</a>
                            </li>
                            <li class="nav-item">
                                <a href="/mobile/" class="">Архив</a>
                            </li>
                            <li class="nav-item">
                                <a href="/webgl/" class="">Анонс</a> 
                            </li>    
                            <li class="nav-item">
                                <a href="/submit/">Трансляция</a>
                            </li>                                           
                            <li class="nav-item">
                                <a href="/submit/">Заявка</a>
                            </li>                        
                        </ul>
                    </div>

                </div>
            </header> -->

            

            <div class="container">
                <aside class="left-col">

                    <div class="main-container">                        
 
                        <div id="rankName">                        
                            <i>Рейтинг вузов Webometrics (рекомендуется просмотр в браузерах<br><a href="http://www.google.com/chrome">Google Chrome</a>, <a href="http://www.mozilla.org/ru/firefox/new/">Mozilla Firefox</a>, <a href="http://www.opera.com/ru">Opera</a>, <a href="http://windows.microsoft.com/ru-ru/internet-explorer/ie-11-worldwide-languages">Internet Explorer 11</a>)</i>
                        </div>

                        <div id="globe-container">
                        </div>

                        <div id="video-container" >                            
                        </div>
                    </div>
                </aside>
                <article class="right-col">
<!--                     <ul id="nav">
                        <li class="nav-item">
                            <a href="#about">Семинар</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#mobile" class="">Архив</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#webgl" class="">Анонс</a> 
                        </li>    
                        
                        <li class="nav-item">
                            <a href="#submit">Трансляция</a>
                        </li>                                           
                    
                        <li class="nav-item">
                            <a href="#submit">Заявка</a>
                        </li>                        
                    </ul> -->

                    <h1>Общеуниверситетский научно-методический семинар по информатизации учебного процесса и электронному обучению</h1>
                    <h3>Руководитель: М.М. Лаврентьев, д.ф-м.н., проректор по информатизации НГУ </h3>
                    <h3>Секретарь: В.В. Казаков, к.т.н., директор ЦПП НГУ, <a href="mailto:vkazakov@phys.nsu.ru">vkazakov@phys.nsu.ru</a>, 363-40-67 <!--, +7 923 241 32 55--></h3>
                    <hr>
                    <div id="announcemen">
                        <!--<h1><center>Внимание!</center></h1>-->
                        <h3>20 января в 17:45 в аудитории 302 главного корпуса НГУ состоялся семинар.<br><br>
                        Тема семинара:  Построение  социально-сетевых сервисов как многоагентных систем: Об одном перспективном направлении междисциплинарных исследований.<br>
                        Докладчик: В.Г. Казаков, к.ф.-м.н., доцент НГУЭУ. <a href="#" id="video">смотреть видео</a></h3>

                        <div class="btn-slide" ><hr/></div>   

                            <h4 id="panel">Предметом рассмотрения являются современные социально-сетевые сервисы и способы их построения.
                        Рассматривается ряд существенных проблем и ограничений современных социально-сетевых сервисов, показывается их зависимость от используемых программно-архитектурных решений.
                        Предлагается проведение междисциплинарных поисковых исследований в области выработки требований к социально-сетевым сервисам и создания архитектур и технологий реализации их программной компоненты на альтернативных подходах.
                        Формулируется гипотеза о возможности построения эффективных социально-сетевых сервисов на основе многоагентных технологий, обсуждаются основные параметры возможного решения.
                        Приводятся основные направления предлагаемых поисковых исследований.</h4>

                    </div>
                </article>
            </div>
        </div>

        

        <div class="push"></div>
        <footer>
            <div class="container">
                <div class="right-col">
                    Разработано: <a href="http://www.mmedia.nsu.ru">ЦПП НГУ</a> | Данные: <a href="http://www.webometrics.info/en/world">Webometrics</a> | движок: <a href="http://www.chromeexperiments.com/globe"><ins>WebGL Globe</ins></a>
                </div>
            </div>
        </footer>

        <!-- jquery and main.js -->
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>-->

        <!--globe WebGL -->
        <script type="text/javascript" src="js/globe/third-party/Detector.js"></script>
        <script type="text/javascript" src="js/globe/third-party/three.min.js"></script>
        <script type="text/javascript" src="js/globe/globe.js"></script>
        <script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>
        

        <script type="text/javascript">

            function browser(){
    
                var ua = navigator.userAgent;
    
                if (ua.search(/MSIE/) > 0) return 'Internet Explorer';
                if (ua.search(/Firefox/) > 0) return 'Firefox';
                if (ua.search(/Opera/) > 0) return 'Opera';
                if (ua.search(/Chrome/) > 0) return 'Google Chrome';
                if (ua.search(/Safari/) > 0) return 'Safari';
                if (ua.search(/Konqueror/) > 0) return 'Konqueror';
                if (ua.search(/Iceweasel/) > 0) return 'Debian Iceweasel';
                if (ua.search(/SeaMonkey/) > 0) return 'SeaMonkey';
    
                // Браузеров очень много, все вписывать смысле нет, Gecko почти везде встречается
                if (ua.search(/Gecko/) > 0) return 'Gecko';

                // а может это вообще поисковый робот
                return 'Search Bot';
            }

            browserName = browser();

            if ((document.all && !window.atob) || browserName == 'Safari') {
                var globeDiv = document.getElementById("globe-container");
                globeDiv.innerHTML = "<img id=\"globe-image\" width=\"600px\" src=\"img/globe.png\" />";
                }
            else
            {

                if(!Detector.webgl){
                    //alert(1);
                    //Detector.addGetWebGLMessage();
                }

                else
                {

                    var container = document.getElementById('globe-container');

                    // We're going to ask a file for the JSON data.
                    xhr = new XMLHttpRequest();

                    // Where do we get the data?
    			    xhr.open( 'GET', 'data/rank.json', true );

                    // What do we do when we have it?
                    xhr.onreadystatechange = function() {

                        // If we've received the data
                        if ( xhr.readyState === 4 && xhr.status === 200 ){
                
                            // Parse the JSON
                            var data = JSON.parse( xhr.responseText );

                            // Remove globe image 
                            /*var glimage = document.getElementById("globe-image");

                            container.removeChild(glimage);*/

                            // Make the globe
                            var globe = new DAT.Globe( container );        
                
                            // Tell the globe about your JSON data
                            globe.addData(data, {format: 'magnitude'});
	           
                            // Create the geometry
                            globe.createPoints();
                
                            // Begin animation
                            globe.animate();

          		        }

                    };
                
                    // Begin request
                    xhr.send( null );
                }
            };

        $(document).ready(function() {

/*            $(".btn-slide").click(function(){
                //alert(1);
            $("#panel").slideToggle("fast");
            //$(this).toggleClass("active");
            //$("#panel").addClass('tpanel');
            });*/

            $("#video").click(function(){

                $("#rankName").hide();
                $("#globe-container").hide();


/*if (document.all) {*/
if ((document.all && !window.atob) || browserName == 'Safari'){

    jwplayer("video-container").setup({
                    primary: "flash",
                    width: 560,
                    height: 320,
                    playlist: [{    
                        //file: "rtmp://application/mp4:myVideo.mp4",  
                        //file: "rtmp://application/mp4:myVideo.mp4",
                        //http://globe/data/video/22_01/seminar_v640.m4v 
                        sources: [                            
                            { file: "data/video/22_01/seminar_v640.m4v", label: "640p" },
                            { file: "data/video/22_01/seminar_v320.m4v", label: "320p" }
                            //{ file: "data/video/22_01/p1v1920.mp4", label: "1920p HD" }
                        ],
                        title: "Построение социально-сетевых сервисов как многоагентных систем"
                    }]
                });
    }
else 
{ 
    $("#video-container").html('<video width="560" controls="controls"><source src="http://seminar.mmc.nsu.ru/data/video/22_01/seminar_v640.mp4" type="video/mp4"  /><source src="http://seminar.mmc.nsu.ru/data/video/22_01/seminar_v640.webm" type="video/webm" /></video>');
}   

                
/*                jwplayer("video-container").setup({
                    primary: "flash",
                    width: 560,
                    height: 320,
                    playlist: [{    
                        //file: "rtmp://application/mp4:myVideo.mp4",  
                        //file: "rtmp://application/mp4:myVideo.mp4",
                        //http://globe/data/video/22_01/seminar_v640.m4v 
                        sources: [                            
                            { file: "data/video/22_01/seminar_v640.m4v", label: "640p" },
                            { file: "data/video/22_01/seminar_v320.m4v", label: "320p" },
                            //{ file: "data/video/22_01/p1v1920.mp4", label: "1920p HD" }
                        ],
                        title: "Построение социально-сетевых сервисов как многоагентных систем"
                    }]
                });*/

            //alert(1);
            
            //$(this).toggleClass("active");
            //$("#panel").addClass('tpanel');
            });
        });
        </script>

<?php
if ($_SERVER["HTTP_HOST"] == "seminar.mmc.nsu.ru")
{
echo "
    <script type='text/javascript'>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-47212284-1', 'nsu.ru');
        ga('send', 'pageview');

    </script>
";
}
?>

    </body>
</html>