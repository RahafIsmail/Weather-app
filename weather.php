<?php

/**
 * Plugin Name: rahaf
 */

 $city = 'Cyprus';
 $api_key = '54ef15f8fedfda6e1b234450d9dad147';
 $api_url= "https://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=" . $api_key;

//  $weather_data=json_decode(file_get_contents($api_url),true);

//  print_r($weather_data);

$response = wp_remote_post( $api_url, array(
    'method'      => 'POST',
    'timeout'     => 45,
    'redirection' => 5,
    'httpversion' => '1.0',
    'blocking'    => true,
    // 'headers'     => array(),
    // 'body'        => array(
    //     'username' => 'bob',
    //     'password' => '1234xyz'
    // ),
    // 'cookies'     => array()
    )
);
 
if ( is_wp_error( $response ) ) {
    $error_message = $response->get_error_message();
    echo "Something went wrong: $error_message";
} else {
    // echo 'Response:<pre>';
    // print_r( $response );
    // echo '</pre>';
    $weather_data=json_decode(wp_remote_retrieve_body($response),true);
   // echo '<pre>';
   // print_r( $weather_data );
    //echo '</pre>';

    //echo $weather_data['clouds']['all']."<br>";  
    // echo $weather_data['weather'][0]['description']."<br>";
     //echo $weather_data['main']['feels_like']."<br>";
     

  //   echo $weather_data['coord']['lon']."<br>";
  //   echo $weather_data['coord']['lat']."<br>";

}

 ?>



<style>

body{
  min-width:335px;
  width:100%;
  height:100%;
  font-family:Montserrat; 
  color:#e2e9e9;
  /* background-color:  #599cff!important; */
  background-color:  rgb(89 156 255 / 52%)!important;
  background-image: url("wp-content/plugins/weather/images/c.jpg");
  background-repeat: no-repeat;
  background-size: 100%;
 
    }
    h3{
      font: bold;
      font-variant: small-caps;
      font-size:30px;
      color:   #313131bd;
      text-align: center;


    }

    p {
      margin-bottom : 1px;
    }

   
    .main {
  margin:0 auto;
  width: 50%;
  max-height: 300px;
    color:#f2f2f2;
  border-radius:25px;
  border-style:none;
  background-color:rgba(0,0,0,0.2);
  display: flex;
flex-direction: row;
justify-content:space-around;


    }
 
#time1{
  font-size:100px;
  margin: auto;

}
    #td {
     
      flex-direction: row;
      align-items: left;
      justify-content: space-evenly;
      flex-flow:wrap;

    }

    #date1 {
      font-size:30px;
      flex-basis: 10px;
      margin: -33 22px;
      



    }
    #date{
      margin:0 auto;
        margin:left;
        margin-left:-210px;
        margin-right: 300px;
        margin-top: 15px;
  font-size:120%;
  position:relative;
  line-height: 70pt;
top: -20pt;
    }


    #desc{
      margin-top: -5px;
      margin-left:  30px;
  float:left;
  font-size:20px;
  line-height:40pt;
    }

  #feels{
    margin-top: -42px;
      /* margin-right: 350px; */
  float:left;
  font-size:20px;
  line-height:40pt;
  padding: 15px 62px;
      margin-bottom: -10px;
    margin-left: -47px;
    text-align:left;

    }

   #w{
    position: right;
    margin-top: 98px;
    margin-right: 50px;
  float:right;
  font-size:150px;
  line-height: 10pt;
  margin-left: 66px;
    margin-right: -10px;
  }
 h6{
  color:white;
  padding: 75px 70px;
    margin-top: 130px;
    margin-left: 23px;
    margin-right: -15px;

 }

  #w span {
    position: right;
    margin-top: 90px;
    margin-right: 36px;
  float:right;
  font-size:35px;
  line-height: 10pt;
  }
  #d{
   
    position: right;
    margin-left:400px;
    margin-right:-130px;
    margin-top:10px;
  float:right;
  font-size:30px;
 
  }
  #dd{
    position: right;
    margin-left:400px;
    margin-right:-110px;
    margin-top:-5px;
  float:right;
  font-size:20px;
  line-height: 0pt;
  }

</style>
</head>
<body>
    <h3> <strong>Local weather App</strong> </h3>
<div class="main">

 <div id ="td">
 <p id="time1"></p>
 <p id="date1"></p>
 <p id="feels"><?php 
  echo "<br>"."<br>"."Feels Like: ".$weather_data['main']['feels_like']."<br>";
 
?>
</p>
 </div>

<div id="t2">
 <p id="w"> <?php
  echo $weather_data['main']['humidity']."<br>"; ?> 
 <span><?php
  echo  $weather_data['weather'][0]['description']."<br>" ;?></span> 
 <h6><?php echo "<br>"."📍". $weather_data['name']."<br>" ;
?></h6>
</div>

</div>
 <script>

var today = new Date();
var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
var time = today.getHours() + ":" + today.getMinutes() ;
var datee = date;
var timee =time;
document.getElementById("date1").innerHTML = datee.toLocaleString();
document.getElementById("time1").innerHTML = timee.toLocaleString();

</script> 
<p id = "r"><span id="datetime"></span></p>


</body>
