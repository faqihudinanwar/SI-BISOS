<?php session_start();?>
<html>
	<head>
		<title>Upload Files</title>
	</head>
	<body>
		<h1>Upload new files</h1>
		<form method="POST" enctype="multipart/form-data" action="upload1.php">
			<div>
				File allowed : .doc, .pdf<br /><br /> 
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
				<label for="userfile">Upload a file:</label>
				<input type="file" name="file_file" id="file_file"/>
				<p>Nama File : <br><input type="text" name="nama" size="50"></p>
				<input type="submit" value="Upload"/>
			</div>
		</form>
	</body>
</html>
