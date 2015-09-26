<!DOCTYPE html>
<html>
<head>
	<script>
	function _(el){
		return document.getElementById(el);
	}
	function uploadFile(){
		var file = _("file1").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("file1", file);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandler, false);
	ajax.addEventListener("load", completeHandler, false);
	ajax.addEventListener("error", errorHandler, false);
	ajax.addEventListener("abort", abortHandler, false);
	ajax.open("POST", "uploadnew.php");
	ajax.send(formdata);
}
function progressHandler(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
}
function completeHandler(event){
	_("status").innerHTML = event.target.responseText;
	_("uploadform").innerHTML = "";
}
function errorHandler(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
	_("status").innerHTML = "Upload Aborted";
}
function playit(name)
{
	if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	        	if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	        		console.log(xmlhttp.responseText)
	        	}
	        }
	        xmlhttp.open("GET","addtoqueue.php?name=" + name,true);
	xmlhttp.send();
	document.getElementById("playit").innerHTML = "Your song will be played shortly :)";
}
</script>
	</head>
	<body>
		<h2></h2>
		<div id="uploadform">
			<form id="upload_form" enctype="multipart/form-data" method="post">
				<input type="file" name="file1" id="file1"><br>
				<input type="button" value="Upload File" onclick="uploadFile()">
				<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
				<p id="loaded_n_total"></p>
			</form>
		</div>
		<h3 id="status"></h3>
	</body>
	</html>