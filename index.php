<?php
include ("bd.php");
date_default_timezone_set('Asia/Novosibirsk');

// запрос на список семинаров
$query = "SELECT * FROM `seminars` ORDER BY date"; // ORDER BY date
$res = mysql_query($query);
$i = 1;
while($row = mysql_fetch_array($res))
{
   	$name[$i] = $row['name'];
   	$adt[$i] = $row['adt'];
   	$more[$i] = $row['more'];
   	$mp4[$i] = $row['mp4'];
   	$webm[$i] = $row['webm'];
   	$i++;             
}

$longSeminar = count($name);
$navigator = '';
$slideTimeShow = '';
$scriptVideo = '';
$content = '';
$scriptNextSeminar = '';

// навигатор
for($i = $longSeminar; $i >= 1;  $i--)
//for($i = 1; $i <= $longSeminar; $i++)
{
	if($i != $longSeminar)
		$navigator .= '<li><a id="announcement'.$i.'_blob" href="#" onClick="goto(\'#announcement'.$i.'\', this); return false">&nbsp;</a></li>';
	else 
		$navigator .= '<li><a id="announcement'.$i.'_blob" class="active_blob" href="#" onClick="goto(\'#announcement'.$i.'\', this); return false">&nbsp;</a></li>';

// content box

	if($i != 1)
		$nextSeminar = '<a href="#" id="ann'.$i.'-to-ann'.($i-1).'">Предыдущий семинар &#9658;</a>';
	else
		$nextSeminar = '';

	if($mp4[$i] != '' or $webm[$i] != '')
	{
		$video = '<br> <a href="#" id="video'.$i.'">смотреть видео</a> <br>';

		// запрос слайдов
		$query = "SELECT * FROM `slides` WHERE `seminar` = '".$name[$i]."'"; // ORDER BY date
		$res = mysql_query($query);
		$j = 1;
		while($row = mysql_fetch_array($res))
		{
		   	$slide[$j] = $row['slide'];
		   	$time[$j] = $row['time'];

		   	$timestamp = strtotime($time[$j]); 
			$time[$j] = idate('s', $timestamp) + idate('i', $timestamp)*60 + idate('H', $timestamp)*60*60;

		   	if($slide[$j] != '')
		   		$slideTimeShow .= 'if(video.currentTime >= '.$time[$j].') slideContainer.innerHTML = \'<img class="slide" src="data/slide/'.$name[$i].'/'.$slide[$j].'">\';';

		   	$j++;             
		}
					//if(video.currentTime > 3)
                   	//slideContainer.innerHTML = \'<img class="slide" src="data/slide/22-10-2014(12-14)/1.JPG">\';

		$scriptVideo .= '$("#video'.$i.'").click(function(){
                $("#hide-video-container").remove();
                $("#video-container").remove();
                $("#slideContainer").remove();


                $("#rank-name").remove();
                $("#globe-container").remove();

                var hideVideoContainer = document.createElement(\'div\');
                var videoContainer = document.createElement(\'div\');
                var slideContainer = document.createElement(\'div\');

                hideVideoContainer.id = \'hide-video-container\';
                videoContainer.id = \'video-container\';
                slideContainer.id = \'slideContainer\';

                $("#main-container").append(hideVideoContainer);
                $("#main-container").append(videoContainer);
                $("#main-container").append(slideContainer);
                $("#hide-video-container").html(\'<a href="#" id="hide-video">закрыть</a>\')

                $("#video-container").html(\'<video id="my-video" width="560" controls="controls"><source src="./data/video/'.$name[$i].'/webm/'.$webm[$i].'" type="video/webm" /><source src="./data/video/'.$name[$i].'/mp4/'.$mp4[$i].'" type="video/mp4" /></video>\');
            
                (function(){
                var video = document.getElementsByTagName(\'video\')[0]
                var slideContainer = document.getElementById(\'slideContainer\');

                video.addEventListener(\'timeupdate\',function(event){
                  	//slideContainer.innerHTML = video.currentTime;
                  	'.$slideTimeShow.'
               },false);
				})();

            });';
	}
	else
		$video = '';

	$content .= '
		<div id="announcement'.$i.'" class="content_box">
			<div class="announcement">
				<div class="announcement-theme">'.$adt[$i].$video.'</div><hr/>
				<div id="panel">'.$more[$i].'</p>'.$nextSeminar.'</div>
			</div>
		</div>';

	if($i != 1)	
		$scriptNextSeminar .= '$( "#ann'.$i.'-to-ann'.($i - 1).'" ).click(function() {
                $( "#announcement'.($i - 1).'_blob" ).click();
            });';

}
?>
<!DOCTYPE html>
<html class="no-js"> 
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

        <script src="js/vendor/jquery-1.10.2.min.js"></script>

    </head>
    <body>
    <div id="wraper">
    	<div class="container">
                <div class="left-col">

                    <div id="main-container">
 
                        <div id="rank-name">
                            <h2><center>Рейтинг вузов Webometrics</center></h2>
                        </div>

                        <div id="globe-container">
                        </div>

                    </div>
                    <div id="recommendedBrowsers"></div>
                </div>
                <div class="right-col">

                    <h1>Общеуниверситетский научно-методический семинар по информатизации учебного процесса и электронному обучению</h1>
                    <h2>Руководитель: М.М. Лаврентьев, д.ф-м.н., проректор по информатизации НГУ </h2>
                    <h2>Секретарь: В.В. Казаков, к.т.н., директор ЦПП НГУ, <a href="mailto:vkazakov@phys.nsu.ru">vkazakov@phys.nsu.ru</a>, 363 40 67 <!--, +7 923 241 32 55--></h2>
                    <hr>

                    <div id="navigation">
                        <ul class="navigation-list">

                        	<?php echo $navigator?>

                        </ul>

                    </div>
                    <div id="content_wrapper">
                        <div id="box_wrapper" style="left: 0px">

                        <?php echo $content;?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <script type="text/javascript">

            <?php echo $scriptNextSeminar;?>

            var i = 2;
            var MAXI=2;

            $("#next-sem").addClass("hidden");

            function goto(id, link){   
                //animate to the div id.
                $("#box_wrapper").animate({"left": -($(id).position().left)}, 600);
                    
                // remove "active" class from all links inside #nav
                $('#navigation a').removeClass('active_blob');
                    
                // add active class to the current link
                $(link).addClass('active_blob');

                i = id[13]*1;

                $("#next-sem").removeClass("hidden");                    
                $("#prev-sem").removeClass("hidden");

                if (i == MAXI) {
                    $("#next-sem").addClass("hidden");
                }

                if (i == 1) {
                    $("#prev-sem").addClass("hidden");
                }
            }


            function prevSem(){

                goto('#announcement'+(i-1),'#announcement'+(i-1)+'_blob');

            }

            function nextSem(){

                goto('#announcement'+(i+1),'#announcement'+(i+1)+'_blob');
            } 

        </script>        

        <div class="push"></div>
        <footer>
            <div class="container">
                <div class="footer-text">
                    Разработано: <a href="http://www.mmedia.nsu.ru">ЦПП НГУ</a> | Рейтинг вузов: <a href="http://www.webometrics.info/en/world">Webometrics</a> | движок: <a href="http://www.chromeexperiments.com/globe"><ins>WebGL Globe</ins> </a>| Семинар: <a href="add.php">добавить</a> <a href="edit.php">исправить</a>
                </div>
            </div>
        </footer>


        <!--globe WebGL -->
        <script type="text/javascript" src="js/globe/third-party/Detector.js"></script>
        <script type="text/javascript" src="js/globe/third-party/three.min.js"></script>
        <script type="text/javascript" src="js/globe/globe.js"></script>
        <script type="text/javascript" src="js/jwplayer/jwplayer.js"></script>

        <script type="text/javascript">

            function browser(){
    
                var ua = navigator.userAgent;
    
                if (ua.search(/rv:11.0/) > 0) return 'Internet Explorer 11';
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

            addGlobe = function(){
                if(!Detector.webgl)
                {

                    var globeDiv = document.getElementById("globe-container");
                    globeDiv.innerHTML = "<img id=\"globe-image\" width=\"600px\" src=\"img/globe.png\" />";

                    var recommendedDiv = document.getElementById("recommendedBrowsers");
                    recommendedDiv.innerHTML = "Ваш браузер или видеокарта не поддерживает webGL, рекомендуется просмотр в браузерах <a href=\"http://www.google.com/chrome\">Google&nbsp;Chrome&nbsp;9.0+</a>, <a href=\"http://www.mozilla.org/ru/firefox/new/\">Mozilla&nbsp;Firefox&nbsp;4.0+</a>, <a href=\"http://www.opera.com/ru\">Opera&nbsp;13.0+</a>, <a href=\"http://windows.microsoft.com/ru-ru/internet-explorer/ie-11-worldwide-languages\">Internet&nbsp;Explorer&nbsp;11.0+</a>";

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
                };
            };

            addGlobe();

            <?php echo $scriptVideo;?>

            $("#main-container").on( "click", "#hide-video", function(){
                   
                $("#hide-video-container").remove();
                $("#video-container").remove();
                $("#slideContainer").remove();

                var rankName = document.createElement('div');
                var globeContainer = document.createElement('div');

                rankName.id = 'rank-name';
                globeContainer.id = 'globe-container';

                $("#main-container").append(rankName);
                $("#main-container").append(globeContainer);
                $("#rank-name").html('<h2><center>Рейтинг вузов Webometrics</center></h2><div id="recommendedBrowsers"></div>');
                
                addGlobe();
                    
            });

            $(document).ready(function() {
                
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