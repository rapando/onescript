<?php
error_reporting(0);
session_start();
date_default_timezone_set(date_default_timezone_get());
$error_code = 0;
$projectName = str_replace(" ", "", strtolower(trim($_POST['projname'])));
$jsfile = $_FILES['jsfile'];
$cssfile = $_FILES['cssfile'];


if($jsfile['type'] != 'application/javascript') {
  print ("Kindly upload a valid javascript file<br />");
  $error_code++;
}
if($cssfile['type'] != "text/css") {
  print ("Kindly upload a valid css file<br />");
  $error_code++;
}


if($jsfile['size'] >= 1024000) {
  print "js file size exceeded. Max 1000kb<br />";
  $error_code++;
}


if($cssfile['size'] >= 1024000) {
  print "css file size exceeded. Max 1000kb<br />";
  $error_code++;
}

if($error_code == 0) {
  $folder = time().$projectName;
  if(!mkdir( $folder, 0777)) print "folder exists, but the contents will be overwritten";
  $dir = $folder."/";
  file_put_contents($dir.$projectName.".json", "");
  if(file_exists($dir.$projectName.".json")) {
    move_uploaded_file($jsfile['tmp_name'], $dir.$jsfile['name']);
    move_uploaded_file($cssfile['tmp_name'], $dir.$cssfile['name']);

    $storedjs = $dir.$jsfile['name'];
    $storedcss = $dir.$cssfile['name'];

    $data = array("name" => substr($projectName, -5), "jsname" => $jsfile['name'], "jscontent" => replacer(fread(fopen($storedjs, "r"), filesize($storedjs))), "csscontent" => replacer(fread(fopen($storedcss, "r"), filesize($storedcss))), "cssname" => $cssfile['name'] , "js");
    file_put_contents($dir.$projectName.".json", json_encode($data));
    $path = __FILE__;
    $path = substr($path,0,-10).$dir.$projectName.".json";
    print "<br />The file was created successfully. The link is : <a href='".$dir.$projectName.".json"."' target='_blank'>$path</a></br /><br />";
    $_SESSION['path'] = $path;

    print "The file has been saved for you. But only for this sessiion. To use it, continue to the <a href='test.php'>next page</a>. <br />You can copy the link somewhere if you wish to use it later<br />";

  }else {
    print "<br />The project file could not be created. Try giving me all permissions<br />";
  }
}


function replacer($content) {
  $search = array("\n", "\"", "\'");
  $replace = array(" ", "'", '"');
  return str_replace($search, $replace, $content);
}

?>
