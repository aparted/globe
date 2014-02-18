<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>University scientific seminar on informatization of education and e-learning</title>
        <meta name="description" content="сайт семинара НГУ по информатизации учебного процесса и электронному обучению">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="shortcut icon" href="img/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="img/ico/apple-touch-icon-precomposed.png">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>

        <!-- jquery and main.js -->
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>-->

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div id="wraper">
            <div class="container">
                <div class="left-col">

                    <div id="main-container">
 
                        <div id="rank-name">
                            <a href="http://www.webometrics.info/en/world"><h2><center>Webometrics ranking of universities</center></h2></a>
                            <div id="recommendedBrowsers"></div>
                        </div>

                        <div id="globe-container">
                        </div>

                    </div>
                </div>
                <div class="right-col">

                    <h1>University scientific seminar on informatization of education and e-learning</h1>
                    <h3>Head: Dr. M. Lavrentiev, vice rector for informatization of NSU</h3>
                    <h3>Secretary: Dr. V. Kazakov, head of NSU software support center,<a href="mailto:vkazakov@phys.nsu.ru">vkazakov@phys.nsu.ru</a>, 363-40-67 <!--, +7 923 241 32 55--></h3>
                    <hr>

                    <div id="content_wrapper">
                        <div class="announcement">
                            <!--<h1><center>Внимание!</center></h1>-->
                            <h3 class="announcement-theme">February 10 at 4:00 pm. in the main building, room 257.<br><br>
                            Theme of seminar: Discussion of the project of design, implementation and support of technology for blended learning at NSU within the framework of the program of competitiveness improving of the national universities.

                            <div class="btn-slide" ><hr/></div>

                            <h4 id="panel">At a meeting of the seminar was represented a draft technology for blended learning in NSU, prepared for the program of competitiveness improving.
                                The goal of the project is a creation and an implementation of the blended learning model (platform) in NSU.
                                Implementation of the project is designed to bridge the gap between NSU and the world's leading universities in the use of e-learning.
                                Were considered the directions of establishing and technical support of blended learning,
                                including customer support implementation of e-learning and learning management, information and methodological support for the development of educational content,
                                CPD training programs on the use of technology of blended learning in NSU.<br>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>        

        <div class="push"></div>
        <footer>
            <div class="container">
                <div class="footer-text">
                    Developed: <a href="http://www.mmedia.nsu.ru">SSC NSU</a> | Institutions rating: <a href="http://www.webometrics.info/en/world">Webometrics</a> | engine: <a href="http://www.chromeexperiments.com/globe"><ins>WebGL Globe</ins></a>
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

            addVideo = function(){
                if (!Modernizr.video){

                    jwplayer("video-container").setup({
                        primary: "flash",
                        width: 560,
                        height: 320,
                        playlist: [{    
                            sources: [                            
                                { file: "http://seminar.mmc.nsu.ru/data/video/22_01/seminar_v640.m4v", label: "640p" },
                                { file: "http://seminar.mmc.nsu.ru/data/video/22_01/seminar_v320.m4v", label: "320p" }
                            ],
                            title: "Построение социально-сетевых сервисов как многоагентных систем"
                        }]
                    });
                }
                else
                {
                    $("#video-container").html('<video id="my-video" width="560" controls="controls"><source src="http://seminar.mmc.nsu.ru/data/video/22_01/seminar_v640.webm" type="video/webm" /><source src="http://seminar.mmc.nsu.ru/data/video/22_01/seminar_v640.mp4" type="video/mp4"  /></video>');
                }
            };

            $("#video").click(function(){

                $("#hide-video-container").remove();
                $("#video-container").remove();

                $("#rank-name").remove();
                $("#globe-container").remove();

                var hideVideoContainer = document.createElement('div');
                var videoContainer = document.createElement('div');

                hideVideoContainer.id = 'hide-video-container';
                videoContainer.id = 'video-container';

                $("#main-container").append(hideVideoContainer);
                $("#main-container").append(videoContainer);
                $("#hide-video-container").html('<a href="#" id="hide-video">закрыть</a>')

                addVideo();
                
            });

            $("#main-container").on( "click", "#hide-video", function(){

                //alert('kokoko');
                   
                $("#hide-video-container").remove();
                $("#video-container").remove();

                var rankName = document.createElement('div');
                var globeContainer = document.createElement('div');

                rankName.id = 'rank-name';
                globeContainer.id = 'globe-container';

                $("#main-container").append(rankName);
                $("#main-container").append(globeContainer);
                $("#rank-name").html('<div id="recommendedBrowsers"></div>');
                
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