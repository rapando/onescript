<?php
session_start();
if(empty($_SESSION['path'])) header("location:./");
else {
?>


<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="./libs/css/onescript.css" media="screen" title="main css script" charset="utf-8">
    <title>Test Page</title>
  </head>
  <body>

    <div class="container-fluid">
      <h3>The link to the json file is provided along with the code to include the scripts. If you want to see how the files have been included, Press <code>CTRL+U</code> and look at the bottom of the page</h3>
      <h4 class="text-danger">currently works only on your <u>own</u> server</h4>
      <hr />
      <div class="row">
      <div class="col-md-6">
        <form class="form form-horizontal" action="" method="post">
        <p>  <label for="">Link</label>
          <?php print "<input type='text' disabled value='".$_SESSION['path']."' class='form-control'/> "; ?>
        </p>
        </form>
      </div>

      <div class="col-md-6">
        <p>
          To use both the js file and css file, write this code in the head part of your HTML code. There is an option of just fetching the names of the files. There is also an option of printing the code directly. I advise the latter for faster loading.
        </p>
        <hr />
      </div>
    </div>
    <div class="col-md-8">


<pre>
<h2>Code</h2>
&lt;?php

$path = "<?php print $_SESSION['path']; ?>";
$code = json_decode(file_get_contents($path), "true");
$jsonname = $code['name'];
$namelen = strlen($jsonname) + 5;

$pathToJS = substr($path, 0, -$namelen).$code['jsname'];
$pathToCSS = substr($path, 0, -$namelen).$code['cssname'];

$jscode = $code['jscontent'];
$csscode = $code['csscontent'];

 <h2>Option 1 (Recommended)</h2>

print "&lt;script&gt;
      $jscode;
    &lt;/script&gt;";

print "&lt;style&gt;
      $csscode;
    &lt;/style&gt;";

 <h2>Option 2</h2>

print "<script type='application/javascript' src='$pathToJS'></script>";
print "<link rel='stylesheet' media='screen' type='text/css' href='$pathToCSS' />";



 ?&gt;

</pre>


      </div>

    </div>

_______________ <h2><code>CTRL+U</code> __________________</h2>

<br /><br />
<hr />
    <?php

    $path =  $_SESSION['path'];;
    $code = json_decode(file_get_contents($path), "true");
    $jsonname = $code['name'];
    $namelen = strlen($jsonname) + 5;

    $pathToJS = substr($path, 0, -$namelen).$code['jsname'];
    $pathToCSS = substr($path, 0, -$namelen).$code['cssname'];

    $jscode = $code['jscontent'];
    $csscode = $code['csscontent'];

  //  <h2>Option 1</h2>

  print "<script>
          $jscode;
        </script>";

  print "<style>
          $csscode;
        </style>";

  //  <h2>Option 2</h2>

    print "<script type='application/javascript' src='$pathToJS'></script>";
    print "<link rel='stylesheet' media='screen' type='text/css' href='$pathToCSS' />";
     ?>

  </body>
</html>
<?php
}
 ?>
