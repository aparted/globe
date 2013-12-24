<?php

// making json file from csv
$json_data = "[";

if (($handle = fopen("data/test.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, ",")) !== FALSE) {
        $tmp_data = "";
        $flag = 0;
        for ($c=0; $c < count($data); $c++) { 
        	
        	$data[2] = $data[2]/40; // change magnitude

            if (($data[$c] == "") OR (count($data) <>3) ) $flag = 1;
            $tmp_data .= round($data[$c], 3).",";           
        }
        if ($flag == 0) $json_data .= $tmp_data;
    }
    fclose($handle);

    $json_data = substr($json_data, 0, -1)."]";
    echo $json_data;
	
	$json_file = fopen("data/test.json", "w");
    fwrite ( $json_file , $json_data);
    fclose($json_file);
}
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

        <header>
            <div class="container">
<!--                 <h1 id="title">
                    <a href="/">
                        Информатизация
                    </a>
                </h1> -->

                    <div class="right-col">      
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
            </header>

            <div class="container">
                <aside class="left-col">
                    <div id="globe-container">
                        <!--<img width="560px" src="img/globe.jpg" />-->
                    </div>
                </aside>
                <article class="right-col">
                    <h1>Общеуниверситетский научно-методический семинар по информатизации учебного процесса и электронному обучению</h1>
                    <p>Руководитель: М.М. Лаврентьев, д.ф-м.н., проректор по информатизации НГУ </p>
                    <p>Секретарь: В.В. Казаков, к.т.н., директор ЦПП НГУ, vkazakov@phys.nsu.ru, 363-40-67, +7 923 241 32 55</p>
                </article>
            </div>
        </div>

        <div class="push"></div>
        <footer>
            <div class="container">
                <div class="right-col">
                    Разработано: <a href="mmc.nsu.ru">ЦПП НГУ</a> | Данные: <a href=""></a> | движок: <!-- <a href="http://www.chromeexperiments.com/globe">WebGL Globe</a> -->
                </div>
            </div>
        </footer>

        <!-- jquery and main.js -->
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
        <!--<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>-->

        <!--globe WebGL -->
        <script type="text/javascript" src="js/globe/third-party/Detector.js"></script>
        <script type="text/javascript" src="js/globe/third-party/three.min.js"></script>
        <script type="text/javascript" src="js/globe/globe.js"></script>
        

        <script type="text/javascript">

        	var container = document.getElementById('wraper');

		// Make the globe
			var globe = new DAT.Globe( container );

		// We're going to ask a file for the JSON data.
			xhr = new XMLHttpRequest();

		// Where do we get the data?
			xhr.open( 'GET', 'data/test.json', true );

		// What do we do when we have it?
			xhr.onreadystatechange = function() {

  		// If we've received the data
  				if ( xhr.readyState === 4 && xhr.status === 200 ) {

      	// Parse the JSON
     				var data = JSON.parse( xhr.responseText );
        
        	
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
    </script>

        <!-- Google Analytics HERE !!! -->

    </body>
</html>