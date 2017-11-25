<?PHP require "include_at_top.php"; ?>
<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body><BR>
<h1>Bilden är uppladdad</h1>
	<div id="AdminWrapper">

		<div class="Pin PinStyle_1">

			<?php

			$RndImgNmb = rand(0,300000);
			$target_dir = "../images/";


			$target_file = $target_dir .$RndImgNmb. basename($_FILES["fileToUpload"]["name"]);
			$target_file = strtolower($target_file);//Lowercase all but ÅÄÖ
			$target_file = preg_replace('/\s+/', '_', $target_file);//Removes all spaces with underscore

			$target_file = str_replace('å', 'a', $target_file);
			$target_file = str_replace('ä', 'a', $target_file);
			$target_file = str_replace('ö', 'o', $target_file);
			$target_file = str_replace('Å', 'a', $target_file);
			$target_file = str_replace('Ä', 'a', $target_file);
			$target_file = str_replace('Ö', 'o', $target_file);




			$uploadOk = 1;

			$BackToPrev = "<a id='QLink' href=\"pic-upload.php\">Ladda ny fil</a><BR>";

			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					//echo "Filen är en bild - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "Filen är inte en bild.<BR>";

					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Bilden finns redan.<BR>";

				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 3000000) {
				echo "Bilden är för stor. Max 3Mb. (Men helst max 0.5Mb)<BR>";

				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo "Endast JPG, JPEG, PNG & GIF är tillåtna.<BR>";

				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Filen laddades inte upp.<BR>";
			echo $BackToPrev;
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


			$Link = $RndImgNmb.basename( $_FILES["fileToUpload"]["name"]);



			$Link = strtolower($Link);//Lowercase all but ÅÄÖ
			$Link = preg_replace('/\s+/', '_', $Link);//Removes all spaces with underscore

			$Link = str_replace('å', 'a', $Link);
			$Link = str_replace('ä', 'a', $Link);
			$Link = str_replace('ö', 'o', $Link);
			$Link = str_replace('Å', 'a', $Link);
			$Link = str_replace('Ä', 'a', $Link);
			$Link = str_replace('Ö', 'o', $Link);


			$MainConnect->query("INSERT INTO Pics (Link,VisaGallery) VALUES('$Link','1')");

			echo "Filen ". $Link. " är uppladdad.<BR>";
			echo $BackToPrev;
				} else {
					echo "Något fel hände när du försökte ladda upp filen.<BR>";
			echo $BackToPrev;
				}
			}
			?>

		</div>
	</div>

	<?PHP include_once "footer.php"; ?>
</body>
</html>
