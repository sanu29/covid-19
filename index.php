<?php

   $wheather = "";
   $error = "";
   if(isset($_GET['city']))
   {
          $cityf = strtoupper($_GET['city']);
          // echo($cityf);
          $city = str_replace(' ','', $_GET['city']); 
        

          $head =@get_headers("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=92bf996fa39308dcbf535c72f2df92cd");
            

            if($head[0] == 'HTTP/1.1 200 OK')
           {
               $link = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$city."&appid=92bf996fa39308dcbf535c72f2df92cd");
                $weather_arr = json_decode($link,true);              
                print_r($weather_arr);
              

                  $wheather = "Weather is ".$weather_arr["weather"][0]["description"].". Tempratue is ".(intval($weather_arr["main"]["temp"])-273.15)."&#8451; . Atmoshpheric Pressure is ".$weather_arr["main"]["pressure"]." hPa. Wind Speed is ".$weather_arr["wind"]["speed"]." m/s. Cloudliness is ".$weather_arr["clouds"]["all"]." % .";
          }
          else
          {
            $error="City ".$cityf." not found";
                     }

      } 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-170517040-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-170517040-1');
</script>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
  <style>
   body{


      background-image: url("sanu.jpg");

      /*background-color: pink;*/
      background-repeat : no-repeat;
      /*height: 500px;  You must set a specified height */
     background-position: center center; /* Center the image */
     background-repeat: no-repeat; /* Do not repeat the image */
     background-size: cover; /* Resize the background image to cover the entire container */
     height: 1000px;
     background-attachment: fixed;
     }
     body{
            background-color: none;

     }
     .text{
         /*height: 200px;*/
      font-size: 25px;
      font-family: "Arial Black";
      color: #E0DEDE;
     }
      .container{
          position: relative;
          display: flex;
          flex-direction: center;
          justify-content: center;
          align-content: center;
          align-items: center;
          padding-bottom: 20px; 
          /*width: ;*/
          /*height: 200px;*/
      }

      .cont{
          padding-bottom:30px;

          position: relative;
          padding-top:170px;
          display: flex;
          flex-direction: center;
          justify-content: center;
          align-content: center;
          align-items: center;
          /*width: ;*/
          /*height: 200px;*/
      }
      .wheather{
        /*padding-top:20px;  */
        width : 80%;
      }
</style>
  </head>
  <body >
     
            <div class="text cont">
            What's The Wheather ? <br>
          </div>
           <div  class="container">
            <fieldset>           
            <form name="form" method="GET"  action = "<?php $_PHP_SELF ?>">
                           <input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, Tokyo" value = "">

            </div>
              <div class="form-gorup container">
                <button name="submit" type="submit"class="btn btn-primary">SUBMIT</button></div>
              </form>
            </fieldset>


          </div>
        <!-- </form> -->
      <!-- </fieldset> -->
          
        <div class="wheather container">
         <?php

              if($wheather)
              {
                // echo '<div class="alert alert-sucess" role="alert">'.$wheather.'</div>';
                 echo '<div class="alert alert-success" role="alert"><b>'.$cityf." : </b>".$wheather.'</div>';
              }

              else if($error)
              {
                echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
              }


          ?>
        </div>

    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
          
          
    <script type="text/javascript">
          
         
  // alert("hie");
javascript_include_tag "http://maps.google.com/maps/api/js?v=3.13&sensor=false&libraries=places";


    </script>
          
  </body>
</html>