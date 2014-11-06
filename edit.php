<?php
session_start();

if(isset($_POST['password']))
    $_SESSION['password'] = $_POST['password'];
if(empty($_SESSION['password']))
    $_SESSION['password'] = '';
include ("bd.php");

// запрос на список семинаров
$query = "SELECT * FROM `seminars` ORDER BY date desc"; // ORDER BY date
$res = mysql_query($query);
$i = 1;
$option = '<option></option>';
while($row = mysql_fetch_array($res))
{
    $name[$i] = $row['name'];
    $adt[$i] = $row['adt'];
    $more[$i] = $row['more'];
    $mp4[$i] = $row['mp4'];
    $webm[$i] = $row['webm'];
    $option .= '<option value="'.$i.'">'.$adt[$i].'</option>'; 
    $i++;            
}

$longSeminar = count($name);
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
            if($_SESSION['password'] == 'lemma')
                {?>
                <h1>Правка семинара</h1>

                <form action="" method="get" id="foobar">
                    <select name="nameSeminar" size="1" style="width: 600px" onchange="document.getElementById('foobar').submit()">
                        <?php echo $option; ?>
                    </select>
                </form>

                <?php }

            if($_SESSION['password'] == 'lemma' and isset($_GET['nameSeminar']) )
            { 
                $index = $_GET['nameSeminar'];?>                
                <section class="main">
                    <form action="function.php" method="post" enctype="multipart/form-data" class="form-add">
                        <p>Объявление: <br>
                        <textarea name="adt"><?php echo $adt[$index];?></textarea></p>
                        <p>Дополнительное описание:<BR>
                        <textarea name="more"><?php echo $more[$index];?></textarea></p>
                        <p>Видео (.MP4):<br><input type="file" name="fileMP4" id="fileMP4"></p>
                        <p>Видео (.WEBM):<br><input type="file" name="fileWEBM" id="fileWEBM"></p>
                        <p>Слайды:<br><input type="file" name="fileSlides[]" multiple="true"></p>
                        <input type="hidden" name="name" value="<?php echo $name[$index]?>">
                        <input type="submit" name="edit" value="Изменить">
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

            if(isset($index))
            {
                $query = "SELECT * FROM `slides` WHERE `seminar` = '".$name[$index]."'";
                $res = mysql_query($query);
                while($row = mysql_fetch_array($res))
                {
                    $slide = $row['slide'];
                }
            }

            if($_SESSION['password'] == 'lemma' and isset($_GET['nameSeminar']))
            { 
                $index = $_GET['nameSeminar'];?>                
                <div id="blockDelete">
                    <?php
                    if(isset($slide))
                        echo '<form action="addSlideTime.php" method="post" class="form-add">
                                <p>
                                    <input type="hidden" name="name" value="'.$name[$index].'">
                                    <input type="submit" value="Правка слайдов">
                                </p>
                            </form>';
                    ?>
                    <form action="function.php" method="post" enctype="multipart/form-data" class="form-add">
                        <input type="hidden" name="name" value="<?php echo $name[$index]?>">

                        <?php                        
                        if($mp4[$index] != '')
                            echo '<p><input type="submit" name="deleteMP4" value="Удалить MP4"></p>';
                        if($webm[$index] != '')
                            echo '<p><input type="submit" name="deleteWEBM" value="Удалить WEBM"></p>';
                        if($webm[$index] != '' and $mp4[$index] != '')
                            echo '<p><input type="submit" name="deleteVideos" value="Удалить оба видео"></p>';
                        ?>                 
                        
                        <p><input type="submit" name="deleteSeminar" value="Удалить семенар (полное удаление)"></p>

                    </form>
                </div>
            <?php } ?>
        </div>
    </div>
</div>  

</body>
<script type="text/javascript">
function actv(){
    var error = 0;

    // if(document.getElementById("fileMP4").value !== '')
    // {
    //     var reg=/\.obj/ig;
    //     var json = document.getElementById("fileObj").value;
    //     //document.write(json.match(reg1) + '<br />');
    //     if(json.match(reg) != '.obj' && json.match(reg) != '.OBJ' )
    //     {
    //         error = 1;
    //         alert("Неверный формат файла!");
    //     }           
    // }
    

    if(document.getElementById("adt").value !== '')
        {
            $("#add").attr('disabled', false);
        }
   }
</script>

</html>