<?php
session_start();

if(isset($_POST['password']))
    $_SESSION['password'] = $_POST['password'];
include ("bd.php");

if(isset($_GET['name']))
	$nameSeminar = $_GET['name'];
else
	$nameSeminar = $_POST['name'];


$query = "SELECT * FROM `slides` WHERE `seminar` = '".$nameSeminar."'"; // ORDER BY date
$res = mysql_query($query);
$i = 0;
$slideTime = '';
while($row = mysql_fetch_array($res))
{
    $slide[$i] = $row['slide'];
	$time[$i] = $row['time'];

	$slideTime .= '<p>
					<img class="slidePrev" src="data/slide/'.$nameSeminar.'/'.$slide[$i].'">
					<input type="hidden" name="slides[]" value="'.$slide[$i].'">
					<input type="text" name="times[]" value="'.$time[$i].'">					
				</p>';

    $i++;            
}

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/input.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
    <script src="http://ajaxs.ru/demo/ajax/liveSearch/js/jquery-1.5.1.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    </head>
</head>
<body>
<div id="wraper">
    <div class="container">
        <div class="left-col">
            <?php

            if($_SESSION['password'] == 'lemma' and $nameSeminar != '')
            { ?>                
                <section class="main">
                	<form action="function.php" method="post" enctype="multipart/form-data" class="form-add">
                		<input type="hidden" name="name" value="<?php echo $nameSeminar?>">
                    	<p><input type="submit" name="deleteSlides" value="Удалить все слайды"></p>
                    </form>
                    <form action="function.php" method="post" enctype="multipart/form-data" class="form-add">
                        <?php echo $slideTime?>
                        <input type="hidden" name="nameSeminar" value="<?php echo $nameSeminar?>">
                        <input type="submit" name="editSlideTime" value="Обновить">
                    </form>
                </section>
            <?php } ?>
        </div>
        <div class="right-col">
            <?php
            if($_SESSION['password'] != 'lemma')
            { ?>
            <section class="main">
                <form class="form-4" method="post">                 
                    <p>
                        <input type="password" name='password' placeholder="Пароль" required> 
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Продолжить">
                    </p>       
                </form>
            </section>

            <?php } 

            if($_SESSION['password'] == 'lemma' and $nameSeminar != '')
            {
	            echo '<div id="hide-video-container"><video id="my-video" width="560" controls="controls">
	        	<source src="./data/video/'.$nameSeminar.'/webm/'.$nameSeminar.'.webm" type="video/webm" />
	        	<source src="./data/video/'.$nameSeminar.'/mp4/'.$nameSeminar.'.mp4" type="video/mp4" /></video></div>';	        	
	        }
	        ?>
        </div>
    </div>
</div>  

</body>
<script type="text/javascript">

</script>

</html>