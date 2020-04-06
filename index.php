<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-language" content="ru">
	<meta http-equiv="Content-Type"	content="text/html; charset=windows-1251">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta name="robots" content="all">
	<meta name="keywords" content="ломостенка">
	<meta name="description" content="Ломостенка">
	  <style>
		   .content { 
		    width: 100%; /* Ширина */
		    margin: 0px;
		    padding: 0px;
		    border: 0px solid #000;
		   }
		   .photoparams { 
		    width: 300px; /* Ширина */
		    margin: 0px;
		    padding: 0px;
		    border: 0px solid #000;
		    text-align: left;
		   }
		   .footer { 
		    width: 100%; /* Ширина */
		    border: 0px solid #000;
		    text-align: center;
		   }
	  </style>
	
	<title>Lomofy. Фотостенка</title>
</head>

<body>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td valign="top" align="center" width="100%">
				<!-- CONTENT -->
				<p>
					<img src="example.jpg" hspace="5" vspace="5">
					<img src="example2.jpg" hspace="5" vspace="5">
					<br>
					<img src="example3.jpg" hspace="5" vspace="5">
					<img src="example4.jpg" hspace="5" vspace="5">
				</p>
				<div class="content">
					<h1>Lomofy. Фотостенка</h1>
					<p>
						Здесь можно сделать коллаж 3х3 в стиле фотостенок ломографии.<br>
						Внизу появится ваш коллаж, который можно сохранить себе или поделиться с друзьями ВКонтакте, Фейсбуке<br>
					</p>
					<form enctype="multipart/form-data" method="post">
						<p>
							<input type="hidden" name="MAX_FILE_SIZE" value="3400000"> <input
								type="file" name="upload[]" multiple accept="image/*,image/jpeg">
							<input type="submit" value="Отправить">
						</p>
					</form>
					<p>
						Выберите 9 фотографий и нажмите "Отправить" (горизонтальные JPG до 3 МБ)
					</p>
		<?php
		
		// CHECK SIZE AND TYPE
		$myFile = $_FILES ['upload'];
		$fileCount = count ( $_FILES ['upload'] ['name'] );
		$check_ok = 0;
		for($i = 0; $i < $fileCount; $i ++) {
			if ($myFile ["type"] [$i] != "image/jpeg" || $myFile ["size"] [$i] > 3400000) {
				echo "Проблема с фотографией " . $myFile ["name"] [$i] . ":<br>";
				if ($myFile ["type"] [$i] != "image/jpeg"){
					echo "Тип файла должен быть JPG<br>";
					$check_ok++;
				}
				if ($myFile ["size"] [$i] > 3400000){
					echo "Размер файла должен быть до 3.4 магабайта<br>";
					$check_ok++;
				}
			}
		}
		
		if (count ( $_FILES ['upload'] ['name'] ) == 9 && $check_ok == 0) {
			// путь к файлу
			$filename = '1.jpg';
			
			// задание ширины и высоты
			$width = 300;
			$height = 300;
			date_default_timezone_set ( 'Europe/Moscow' );
			
			// Находим коэффициент
			list ( $width_orig, $height_orig ) = getimagesize ( $_FILES ['upload'] ['tmp_name'] [0] );
			$k = $width_orig / $height_orig;
			// создаем пустое полотно
			$image_p = imagecreatetruecolor ( 900, 900 / $k );
			
			$filename = $_FILES ['upload'] ['name'] [0];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [0], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][0], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			// $im2 = ImageCreateTrueColor($width, $height);
			// imagecopyResampled ($im2, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
			imagecopyresampled ( $image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [1];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [1], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][1], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [1];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 300, 0, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [2];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [2], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][2], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [2];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 600, 0, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [3];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [3], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][3], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [3];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 0, $height * 1, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [4];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [4], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][4], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [4];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 300, $height * 1, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [5];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [5], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][5], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [5];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 600, $height * 1, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [6];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [6], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][6], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [6];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 0, $height * 2 - 1, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [7];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [7], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][7], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [7];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 300, $height * 2 - 1, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			$filename = $_FILES ['upload'] ['name'] [8];
			if (copy ( $_FILES ['upload'] ['tmp_name'] [8], "/domain_path/your_domain/docs/lomofy/" . $filename )) {
				// if (copy($_FILES['upload']['tmp_name'][8], "d:/local_testing_path/lomofy/".$filename)) {
				// echo "<P>FILE UPLOADED</P>";
			} else {
				echo "<P>MOVE UPLOADED FILE FAILED!</P>";
				print_r ( error_get_last () );
			}
			$filename = $_FILES ['upload'] ['name'] [8];
			$image = imagecreatefromjpeg ( $filename );
			list ( $width_orig, $height_orig ) = getimagesize ( $filename );
			$k = $width_orig / 300;
			$width = 300;
			$height = $height_orig / $k;
			imagecopyresampled ( $image_p, $image, 600, $height * 2 - 1, 0, 0, $width, $height, $width_orig, $height_orig );
			unlink ( $filename );
			imagedestroy ( $image );
			
			// вывод
			imagejpeg ( $image_p, 'new.jpg', 100 );
			$newname = "" . date ( 'YmdHis', time () ) . mt_rand () . ".jpg";
			copy ( "new.jpg", $newname );
			if (mail ( 'gleb.itech@gmail.com', 'Картинка', "Картинка: http://your_domain/lomofy/" . $newname . "\n\n" ))
				echo "";
			else
				echo "<br>ok?";
			
			echo "<br><br><img src='new.jpg'>";
		} else if(count ( $_FILES ['upload'] ['name'] ) != 0)
			echo "<i>Вы загрузили " . count ( $_FILES ['upload'] ['name'] ) . " фотографий, а должно быть 9.</i><br>";

	?>
				</div>

					<!-- EOF content -->

			</td>
		</tr>
		<tr>
			<td>
				<hr width="80%">
				<div class="footer">
					<a href="http://your_domain"><img src="toper01.jpg"><img src="toper02.jpg"><img src="toper04.jpg"></a><br>
					<a href="mailto:info@your_domain">info@your_domain</a>
				</div>
			</td>
		</tr>
	</table>
</body>
</html>
