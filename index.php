<!doctype html>
<html lang="en">
  <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <title>Getting GitHib Users!</title>
</head>
  
  <body>
    <div  class="container">

      <form class="form-inline my-2 my-lg-0" action="" method="post">
        <input  name="name" class="form-control mr-sm-2" type="text" placeholder="Enter Github User" aria-label="Enter Github User">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>


      <?php

        if (isset($_POST["name"]) && $_POST["name"]!="")
        {
            $user=$_POST["name"];
            $url = "https://api.github.com/users/".$user."/followers";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
            $html = curl_exec($ch);

            $result = json_decode($html,true);
            foreach($result as $dd)
            {
                echo "<p>".$dd["login"]."</p>" ;
            }

            //echo($html);
            curl_close($ch);  
        }
?>

    </div>

  </body>
  
</html>
