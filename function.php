<?php
date_default_timezone_set('Asia/Novosibirsk');
include ("bd.php");

function removeDirectory($dir) {
    if ($objs = glob($dir."/*")) {
       foreach($objs as $obj) {
         is_dir($obj) ? removeDirectory($obj) : unlink($obj);
       }
    }
    rmdir($dir);
  }

// add

if(isset($_POST['add']))
{
	if(isset($_POST['adt']))
	{
		$nameDir = date("d-m-Y(H-i)");

		// Загрузка MP4
		if($_FILES['fileMP4']['error'] == 0)
		{
			//var_dump($_FILES);
			if($_FILES['fileMP4']['type'] == 'video/mp4')
			{
				
				$dir = "./data/video/".$nameDir."/mp4/";

				if (!mkdir($dir, 0775, true)) {
				    die('Не удалось создать директории...');
				}

			    $temp = $_FILES['fileMP4']['tmp_name'];
			    $nameMP4 = $_FILES['fileMP4']['name'];

			    $nameMP4 = preg_replace('~(.*?)\.~s', $nameDir.".", $nameMP4);

			    move_uploaded_file($temp, $dir.$nameMP4);
			}
		}		

		// Загрузка WEBM
		if($_FILES['fileWEBM']['error'] == 0)
		{
			//var_dump($_FILES);
			if($_FILES['fileWEBM']['type'] == 'video/webm')
			{
				
				$dir = "./data/video/".$nameDir."/webm/";

				if (!mkdir($dir, 0775, true)) {
				    die('Не удалось создать директории...');
				}

			    $temp = $_FILES['fileWEBM']['tmp_name'];
			    $nameWEBM = $_FILES['fileWEBM']['name'];

			    $nameWEBM = preg_replace('~(.*?)\.~s', $nameDir.".", $nameWEBM);

			    move_uploaded_file($temp, $dir.$nameWEBM);
			}
		}
		//slides

		if ($_FILES['fileSlides']['error'] == 0)
		{
			$errors = $_FILES['fileSlides']['error'];
			$allowed_extension =  array('gif','png','JPG','jpg','bmp','dib','ico','jfif','jpe','jpeg','tif','svg');
			$index = 1;

			$dir = "./data/slide/".$nameDir."/";
			if (!mkdir($dir, 0775, true)) {
				die('Не удалось создать директории...');
						}

			foreach ($errors as $key => $error) 
			{
				if ($error == 0) 
			  	{
			   		$slide = $_FILES['fileSlides']['name'][$key];
			     	$extension = pathinfo($slide, PATHINFO_EXTENSION);    

			     	if( in_array($extension,$allowed_extension) ) 
			     	{
			     		$temp = $_FILES['fileSlides']['tmp_name'][$key];
					    $nameSlide = $_FILES['fileSlides']['name'][$key];

					    $nameSlide = preg_replace('~(.*?)\.~s', $index.".", $nameSlide);
					    $index++;

					    move_uploaded_file($temp, $dir.$nameSlide);

					    $query = "INSERT INTO `slides`(`seminar`, `slide`, `time`) VALUES ('".$nameDir."','".$nameSlide."', '')";
						mysql_query($query);
			    	} 
			      	else $error_message .= 'не поддерживаемый формат файла '.$_FILES['fileSlides']['name'][$key].' ';
			  	}
			  	else $error_message .= 'ошибка при загрузке файла '.$_FILES['fileSlides']['name'][$key].' ';
			}
		}			

		// Отправка в БД запрос на запись новых данных об объекте
		$query = "INSERT INTO `seminars`(`name`, `adt`, `more`, `mp4`, `webm`, `date`) VALUES ('".$nameDir."','".$_POST['adt']."','".$_POST['more']."','".$nameMP4."','".$nameWEBM."','".date("Y-m-d")."')";
		mysql_query($query);

		if (isset($_FILES['fileSlides']))
			header("Location:addSlideTime.php?name=".$nameDir);
		else
			header("Location:index.php");		
	}
}

//edit

if(isset($_POST['edit']))
{
	$name = $_POST["name"];
	$query = "SELECT * FROM `seminars` WHERE `name` = '".$name."'";
	$res = mysql_query($query);
	while($row = mysql_fetch_array($res))
	{
	    $adt = $row['adt'];
	    $more = $row['more'];
	    $mp4 = $row['mp4'];
	    $webm = $row['webm'];
	}
	
	// Загрузка MP4
	if($_FILES['fileMP4']['error'] == 0)
	{
		if($_FILES['fileMP4']['type'] == 'video/mp4')
		{
			$dir = "./data/video/".$name."/mp4/";
			if($mp4 == '')
				if (!mkdir($dir, 0775, true))
			    	die('Не удалось создать директории...');

		    $temp = $_FILES['fileMP4']['tmp_name'];
		    $nameMP4 = $_FILES['fileMP4']['name'];

		    $nameMP4 = preg_replace('~(.*?)\.~s', $name.".", $nameMP4);

		    if($nameMP4 != $mp4 && $mp4 != '')			    	
			unlink($dir.$mp4);

			move_uploaded_file($temp, $dir.$nameMP4);

			$query = "UPDATE `seminars` SET `mp4` = '".$nameMP4."' WHERE `name`='".$name."'";
			mysql_query($query);
		}
	}

	// Загрузка WEBM
	if($_FILES['fileWEBM']['error'] == 0)
	{
		if($_FILES['fileWEBM']['type'] == 'video/webm')
		{
			$dir = "./data/video/".$name."/webm/";
			if($webm == '')
				if (!mkdir($dir, 0775, true))
			    	die('Не удалось создать директории...');

		    $temp = $_FILES['fileWEBM']['tmp_name'];
		    $nameWEBM = $_FILES['fileWEBM']['name'];

		    $nameWEBM = preg_replace('~(.*?)\.~s', $name.".", $nameWEBM);

		    if($nameWEBM != $webm && $webm != '')			    	
			unlink($dir.$webm);

			move_uploaded_file($temp, $dir.$nameWEBM);

			$query = "UPDATE `seminars` SET `webm` = '".$nameWEBM."' WHERE `name`='".$name."'";
			mysql_query($query);
		}
	}	

	if (isset($_FILES['fileSlides']))
	{
		$errors = $_FILES['fileSlides']['error'];
		$allowed_extension =  array('gif','png','JPG','jpg','bmp','dib','ico','jfif','jpe','jpeg','tif','svg');

		// запрос слайдов
		$query = "SELECT * FROM `slides` WHERE `seminar` = '".$name."'"; // ORDER BY date
		$res = mysql_query($query);
		$j = 1;
		while($row = mysql_fetch_array($res))
		{
		   	$slide[$j] = $row['slide'];
		   	$j++;             
		}

		$index = $j;
		$dir = "./data/slide/".$name."/";

		if(empty($slide))
			if (!mkdir($dir, 0775, true))
				die('Не удалось создать директории...');
				
		foreach ($errors as $key => $error) 
		{
			if ($error == 0) 
		  	{
		   		$slide = $_FILES['fileSlides']['name'][$key];
		     	$extension = pathinfo($slide, PATHINFO_EXTENSION);    

		     	if( in_array($extension,$allowed_extension) ) 
		     	{
		     		$temp = $_FILES['fileSlides']['tmp_name'][$key];
				    $nameSlide = $_FILES['fileSlides']['name'][$key];
				    $nameSlide = preg_replace('~(.*?)\.~s', $index.".", $nameSlide);
				    $index++;

				    move_uploaded_file($temp, $dir.$nameSlide);
				    $query = "INSERT INTO `slides`(`seminar`, `slide`, `time`) VALUES ('".$name."','".$nameSlide."', '')";
					mysql_query($query);
		    	} 
		      	else $error_message .= 'не поддерживаемый формат файла '.$_FILES['fileSlides']['name'][$key].' ';
		  	}
		  	else $error_message .= 'ошибка при загрузке файла '.$_FILES['fileSlides']['name'][$key].' ';
		}
	}

	// Отправка в БД запрос на запись новых данных об объекте
	$query = "UPDATE `seminars` SET `adt`='".$_POST['adt']."',`more`='".$_POST['more']."' WHERE `name`='".$name."'";
	mysql_query($query);
	
	if (isset($_FILES['fileSlides']))
		header("Location:addSlideTime.php?name=".$name);
	else
		header("Location:index.php");
}

//delete

if(isset($_POST['deleteMP4']) or isset($_POST['deleteVideos']))
{
	$name = $_POST['name'];
	$dir = "./data/video/".$name."/mp4/";
	removeDirectory ($dir);
	$query = "UPDATE `seminars` SET `mp4` = '' WHERE `name`='".$name."'";
	mysql_query($query);
	header("Location:index.php");
}

if(isset($_POST['deleteWEBM']) or isset($_POST['deleteVideos']))
{
	$name = $_POST['name'];
	$dir = "./data/video/".$name."/webm/";
	removeDirectory ($dir);
	$query = "UPDATE `seminars` SET `webm` = '' WHERE `name`='".$name."'";
	mysql_query($query);
	header("Location:index.php");
}

if(isset($_POST['deleteSeminar']))
{
	$name = $_POST['name'];
	$query = "SELECT * FROM `seminars` WHERE `name` = '".$name."'";
	$res = mysql_query($query);
	while($row = mysql_fetch_array($res))
	{
	    $mp4 = $row['mp4'];
	    $webm = $row['webm'];
	}
	if($mp4 != '' or $webm != '')
	{
		$dir = "./data/video/".$name;
		removeDirectory ($dir);
	}
	
	$query = "DELETE FROM `seminars` WHERE `name` = '".$name."'";
	mysql_query($query);

	$query = "SELECT * FROM `slides` WHERE `seminar` = '".$name."'";
	$res = mysql_query($query);
	while($row = mysql_fetch_array($res))
	{
	    $slide = $row['slide'];
	}
	if($slide != '')
	{
		$dir = "./data/slide/".$name;
		removeDirectory ($dir);
	}
	
	$query = "DELETE FROM `slides` WHERE `seminar` = '".$name."'";
	mysql_query($query);
	
	header("Location:index.php");
}
if(isset($_POST['deleteSlides']))
{
	$name = $_POST['name'];
	$query = "SELECT * FROM `slides` WHERE `seminar` = '".$name."'";
	$res = mysql_query($query);
	$i = 0;
	while($row = mysql_fetch_array($res))
	{
	    $slide[$i] = $row['slide'];
	    $i++;
	}
	if($slide != '')
	{
		$dir = "./data/slide/".$name;
		removeDirectory ($dir);
	}
	
	$query = "DELETE FROM `slides` WHERE `seminar` = '".$name."'";
	mysql_query($query);
	
	header("Location:index.php");
}

// time slide
if(isset($_POST['editSlideTime']))
{
	$name = $_POST['nameSeminar'];
	$slides = $_POST['slides'];
	$times = $_POST['times'];
	//var_dump($slide);

	for($i = 0; $i < count($slides); $i++)
	{
		$query = "UPDATE `slides` SET `time` = '".$times[$i]."' WHERE `slide`='".$slides[$i]."' AND `seminar` = '".$name."'";
		mysql_query($query);		
	}

	header("Location:index.php");
}
?>