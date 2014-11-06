<?php
session_start();

if(isset($_POST['password']))
    $_SESSION['password'] = $_POST['password'];
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/input.css" />
    <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
    <script src="http://ajaxs.ru/demo/ajax/liveSearch/js/jquery-1.5.1.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <link rel="shortcut icon" href="/img/log.png" type="image/png">
    <title> 3D галерея </title>

    </head>
</head>
<body>
<div id="wraper">
    <div class="container">
        <div class="left-col">
        <?php
            if($_SESSION['password'] == 'lemma')
            { ?>
                <section class="main">
                    <form action="function.php" method="post" enctype="multipart/form-data" class="form-add">
                        <h1>Добавление семинара</h1>
                        <p>Объявление: <br>
                        <textarea name="adt" id="search" onchange="actv()"></textarea></p>
                        <p>Дополнительное описание:<BR>
                        <textarea name="more" id="more"></textarea></p>
                        <p>Видео (.MP4):<br><input type="file" name="fileMP4" id="fileMP4"></p>
                        <p>Видео (.WEBM):<br><input type="file" name="fileWEBM" id="fileWEBM"></p>
                        <p>Слайды:<br><input type="file" name="fileSlides[]" multiple="true"></p>
                        <input type="submit" name="add" id="add" value="Загрузить">
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

            <?php } ?>
        </div>
    </div>
</div>  

</body>
<script type="text/javascript">
function actv(){
    var error = 0;

    if(document.getElementById("adt").value !== '')
        {
            $("#add").attr('disabled', false);
        }
   }
</script>

</html>