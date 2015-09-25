<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>70Foto</title>
</head>
<body>

<div id="container">
	<h1>File Upload.</h1>
	<div id="body">
		<form action="<?php echo site_url('registration/submit'); ?>" method="POST" enctype='multipart/form-data'>
            <div>Nama <input type="text" name="nama" /></div>
            <div>Umur <input type="text" name="umur" /></div>
            <div>Alamat <input type="text" name="alamat" /></div>
            <div>No. HP/Telephon<input type="text" name="phone" /></div>
            <div>KTP <input type="file" name="userfiles[]" /></div>
            <div>Foto <input type="file" name="userfiles[]" /></div>
            <div><input type="submit" name="submit" value="Submit" /></div>
    </form>
	</div>
</div>

</body>
</html>
