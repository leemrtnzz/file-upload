<title>File Upload</title>
<head>
	<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
	<script data-ad-client="ca-pub-8323663203896970" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-popRpmFF9JQgExhfw5tZT4I9/CI5e2QcuUZPOVXb1m7qUmeR2b50u+YFEYe1wgzy" crossorigin="anonymous"></script>
</head>
<!-- Script -->
<script type="text/javascript">  
 function checkSize(max_img_size)  
 {  var input = document.getElementById("fileupload");  
   if(input.files && input.files.length == 1)  
   {  if (input.files[0].size > max_img_size)   
     { alert("Ukuran file harus di bawah "   
          + (max_img_size/102400/102400) + " MB");  
       return false;  
     }  
   }  
   return true;  
 }  
 </script>
<!-- Script -->
<body>
<style type="text/css">
body {
	margin: 3rem;
}
.form-control{
	width: 50%;
}
.alert {
	width:50%;
}
select{
	width:50%;
	margin:10px;
}
.btn-primary {
	width:50%;
	margin:10px;
}
.garis {
	position: relative;
}
.garis:before {
	color: red;
	position: absolute;
	content: "";
	left: 0;
	top: 50%;
	right: 0;
	border-top: 1px solid;
	border-color: inherit;

	-webkit-transform:rotate(-5deg);
	-moz-transform:rotate(-5deg);
	-ms-transform:rotate(-5deg);
	-o-transform:rotate(-5deg);
	transform:rotate(-5deg);
}
</style>
   
<body>
<form class="container" method="post" action="uploader.php" enctype="multipart/form-data" onsubmit="return checkSize(104857600);>
    <div class="form-group">
    	<div class="text-center">
            <h4><span id="tanggalwaktu"></span></h4>
			<script src="js/waktu.js"></script>
            <h1 style="color : red;">File Upload Local</h1>
            <hr>
            <input  class="form-control mx-auto" placeholder="Masukan file upload" type="file" name="uploadedfile" id="fileupload" autofocus required> 
            <button type="submit" name="upload" class="btn btn-primary">Submit</button>
</form>
<div class='table-responsive-xl'>
    <table class='table mx-auto'>  
        <tr>  
            <th>File Name</th>  
            <th>Upload Date</th>  
            <th>Type</th>  
            <th>Size</th>  
            <th>Delete</th>  
 <?php  
 if ($handle = opendir('./../files/'))  
 {  while (false !== ($file = readdir($handle)))  
   {  if($file!=="." && $file !=="..")  
   {  echo "<tr><td><a href=\"download.php?id=" . urlencode($file). "\">$file</a></td>";  
     echo "<td>" . date ("d/m/Y H:m:s", filemtime("../files/".$file)) . '</td>';  
     echo "<td>" . pathinfo("../files/".$file, PATHINFO_EXTENSION) . ' file </td>';  
     echo "<td>" . round(filesize("../files/".$file)/10240) . ' KB</td>';  
     echo "<td><a href=\"hapus.php?id=$file\">Delete</a></td></tr>";  
     }  
   }  
   closedir($handle);  
 }  
 ?>  
    </table>
</div> 
 </body>  
 </html>  