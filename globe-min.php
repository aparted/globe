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
        <link rel="stylesheet" href="css/globe.css">
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

        <div id="globe-container-min">
        </div>

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

                    var globeDiv = document.getElementById("globe-container-min");
                    globeDiv.innerHTML = "<img id=\"globe-image\" width=\"600px\" src=\"img/globe.png\" />";

                    var recommendedDiv = document.getElementById("recommendedBrowsers");
                    recommendedDiv.innerHTML = "Ваш браузер или видеокарта не поддерживает webGL, рекомендуется просмотр в браузерах <a href=\"http://www.google.com/chrome\">Google&nbsp;Chrome&nbsp;9.0+</a>, <a href=\"http://www.mozilla.org/ru/firefox/new/\">Mozilla&nbsp;Firefox&nbsp;4.0+</a>, <a href=\"http://www.opera.com/ru\">Opera&nbsp;13.0+</a>, <a href=\"http://windows.microsoft.com/ru-ru/internet-explorer/ie-11-worldwide-languages\">Internet&nbsp;Explorer&nbsp;11.0+</a>";

                }
                else
                {

                    var container = document.getElementById('globe-container-min');

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