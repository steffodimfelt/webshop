<?PHP require "include_at_top.php"; ?>

<html>
<head>
  <?PHP include_once "header.php"; ?>
</head>
<body>
	<div id="AdminWrapper">
	<h1>Ladda upp bilder</h1>
		<div class="Pin PinStyle_1" style="text-transform:none;">
	Fotot kan max vara 1Mb.  ÅÄÖ och mellanslag kommer att ersättas.<BR>
	Fotona är automatiskt inställda i Visa-läget.<BR><BR>
	<form action="pic_insert.php" method="post" enctype="multipart/form-data">
		Välj bild att ladda upp:
		<input type="file" name="fileToUpload" id="fileToUpload"><BR><BR>
		<input type="submit" value="Ladda upp bild" name="submit">
	</form>

	</div>
</div>

<?PHP include_once "footer.php"; ?>
</body>
</html>
