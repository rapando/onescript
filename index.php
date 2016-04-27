<?php

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
     <link rel="stylesheet" href="./libs/css/onescript.css" media="screen" title="main css script" charset="utf-8">
     <title>One Script</title>
   </head>
   <body>

     <div class="container-fluid">
       <h1>OneScript</h1>
       <h3>Store your js and css file in one file, and avoid caching</h3>
       <hr>
       <h3>Lets test</h3>
       <div class="row">
         <div class="col-md-6">
           <form class="form form-horizontal" action="upload.php" method="post" enctype="multipart/form-data">
             <p>
               <label for="">Name of Project</label>
               <input type="text" name="projname" value="" placeholder="the name of the project" maxlength="30" required class="form-control"/>
             </p>
             <p>
               <label for="">JS file</label>
               <input type="file" name="jsfile" accept="text/js" required class="form-control" value="" />
             </p>
             <p>
               <label for="">CSS file</label>
               <input type="file"  required name="cssfile" class="form-control" value="" />
             </p>
             <p>
               <input type="submit" class="btn btn-small btn-success" name="submitbtn" value="submit" />
             </p>
           </form>
         </div>

       </div>

     </div>

   </body>
 </html>
