<?php
namespace Dompdf;
require_once './dompdf/autoload.inc.php';
require_once('./connection.php');


$category = strtolower($_GET['batch']);
$collection_id = $_GET['col_id'];
$format_id = $_GET['format_id'];
$dompdf = new Dompdf(); 

if($format_id == 1){
  $approve = "SELECT * FROM format1 where category = '".$category."' and collection_id = '".$collection_id."'";
  if($result = mysqli_query($link, $approve)){
    if(mysqli_num_rows($result) > 0){ 
      $i = 1;
      $output = "<html>
        <style>
        @font-face {
          font-family: 'Courier New Bold';
          src: url('../assets/fonts/Courier New Bold.ttf');
         
          }
          .container {
            
            width: 100%;
          }
          
          .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align:center;
          }
          .heading p{
            padding:5px 15px 5px 15px;
            background-color:#cbcbcb;
            display: inline-block;
            font-family: Courier New Bold; 
          }
          .left {
            height: 500px;
            width:100%;
            
          }
          .front_image {
            width:32.5%;
            float: left;
            height:450px;
          }
          .front_image img{
            height: 100%;
            width: 100%;
            object-fit: fill;
          }
          .back_image {
           
            margin-left: 20px;
            width:32.5%;
            float: left;
            height:450px;
          }
          .back_image img{
            height: 100%;
            width: 100%;
            object-fit: fill;
          }
          .right{
            width: 30%;
            height: 600px;
            float:right;
            
          }
          .logo{
            text-align:center;
          }
          .logo img{
            height:90px;
            width:150px;
            
          }
          .right_image {
            margin-top:20px
            width: 10%;
            height: 470px;
          }
          .para{
            font-family: Courier New Bold;
            position: absolute;
            z-index:1;
            width:80%;
            height:150px;
            padding-top:5px;
            margin-left:-20px;
           
          }
         
          
          .para p{
            color:white;
            font-size:28px;
            letter-spacing: 5px;
           
          }
          .para p span{
            background-color:#243561;
            padding-left: 4px
          }
          #customers {
            
            margin-top:170px;
            position: absolute;
            z-index:1
            border-collapse: collapse;
            margin-left:25px
          }
          
          #customers td,  {
            font-size:20px;
            font-family: Courier New Bold;
            padding:0px
          }
          .right_image img{
            float:right;
            position: relative;
            height: 100%;
            width: 95%;
            object-fit: fill;
          }
  
          .row {
            width: 64%;
            height: 130px;
            margin-top: 4%;
          }
          .column {
            float: left;
            width: 23.8%;
            padding-right:20px;
           
          }
          
          .card {
            
            text-align: center;
           
            border-radius: 4px;
          }
          .card img {
            box-shadow: 0 24px 28px 0 rgba(0, 0, 0, 1);
            background-color: #f1f1f1;
            height: 100%;
            width: 100%;
            object-fit: fill;
            
          }
          .bgImge{
            
          }
        </style>";
      
      
        while($row = mysqli_fetch_array($result)){ 
           
        if($row['tittle_name'] != ''){
          $output .= '
          <body>
            <div class="container" >
              <div class="bgImge">
                <img src="./tittleImages/'.$row['tittle_image'].'" style="width:1030px; height:680px;position: relative;"/>
              </div>
              <div class="centered">
                <h1>Heading</h1>
                <p>paragraph</p>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
        }
        else{
          $output .= '
          <body>
            <div class="container">
            
              
              <div class="left">
                <div class="heading">
                  <p>'.$row["style"].'</p>
                </div>
                <div class="front_image">
                  <img src="./upload/'.$row['front_image'].'" alt="" srcset="" />
                </div>
                <div class="back_image">
                  <img src="./upload/'.$row['back_image'].'" alt="" srcset="" />
                </div>
                <div class="right">
                  <div class="logo">
                    <img src="./img/DCCLogo.jpg" />
                  </div>
                  <div class="right_image">
                    <div class="para">
                      <p>
                     
                        <span>'.strtoupper($row["heading1"]).'</span>
                        <br />
                        <span>'.strtoupper($row["heading2"]).' </span>
                        <br />
                        <span>'.strtoupper($row["heading3"]).'</span>
                      </p>
                      
                    </div>
                  <table id="customers">
                      <tr>
                        <td>STYLE</td> 
                        <td><b>:</b></td>
                        <td>'.$row["style"].'</td>
                      
                      </tr>
                      <tr>
                        <td>FABRIC</td>
                        <td><b> : </b></td>
                        <td>'.$row["fabric"].'</td>
                        
                      </tr>
                      <tr>
                        <td>COM</td>
                        <td><b>:</b></td>
                        <td>'.$row["com"].'</td>
                        
                      </tr>
                      <tr>
                        <td>WASH</td>
                        <td><b>:</b></td>
                        <td>'.$row["wash"].'</td>
                        
                      </tr>
                  </table>
                    <img src="../assets/img/TextureImage.jpg" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box1'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box2'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box3'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box4'].'" />
                  </div>
                </div>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
            $i++ ;
        }
      } 
  $output .= "</html>"; 
  $dompdf->set_option('enable_html5_parser', TRUE);
  $dompdf->loadHtml($output); 
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render(); 
  $dompdf->stream("",array("Attachment" => false)); 
  } } 




}
else if($format_id == 2){
  $approve = "SELECT * FROM format2 where category = '".$category."' and collection_id = '".$collection_id."'";
  if($result = mysqli_query($link, $approve)){
    if(mysqli_num_rows($result) > 0){ 
      $i = 1;
     
      $output = "<html>
      
      <style>
      @font-face {
        font-family: 'Courier New Bold';
        src: url('../assets/fonts/Courier New Bold.ttf');
       
        }
        .container {
          
          width: 100%;
        }
        
        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align:center;
        }
        .heading p{
          padding:5px 15px 5px 15px;
          background-color:#cbcbcb;
          display: inline-block;
          font-family: Courier New Bold; 
        }
        .left {
          height: 500px;
          width:100%;
          
        }
        .front_image {
          
          width:65%;
          float: left;
          height:450px;
        }
        .front_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .back_image {
         
          margin-left: 20px;
          width:32.5%;
          float: left;
          height:450px;
        }
        .back_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .right{
          width: 30%;
          height: 600px;
          float:right;
          
        }
        .logo{
          text-align:center;
        }
        .logo img{
          height:90px;
          width:150px;
          
        }
        .right_image {
          margin-top:20px
          width: 10%;
          height: 470px;
        }
        .para{
          font-family: Courier New Bold;
          position: absolute;
          z-index:1;
          width:80%;
          height:150px;
          padding-top:5px;
          margin-left:-20px;
         
        }
       
        
        .para p{
          color:white;
          font-size:28px;
          letter-spacing: 5px;
         
        }
        .para p span{
          background-color:#243561;
          padding-left: 4px
        }
        #customers {
          
          margin-top:170px;
          position: absolute;
          z-index:1
          border-collapse: collapse;
          margin-left:25px
        }
        
        #customers td,  {
          font-size:20px;
          font-family: Courier New Bold;
          padding:0px
        }
        .right_image img{
          float:right;
          position: relative;
          height: 100%;
          width: 95%;
          object-fit: fill;
        }

        .row {
          width: 64%;
          height: 130px;
          margin-top: 4%;
        }
        .column {
          float: left;
          width: 23.8%;
          padding-right:20px;
         
        }
        
        .card {
          
          text-align: center;
         
          border-radius: 4px;
        }
        .card img {
          box-shadow: 0 24px 28px 0 rgba(0, 0, 0, 1);
          background-color: #f1f1f1;
          height: 100%;
          width: 100%;
          object-fit: fill;
          
        }
        .bgImge{
          
        }
      </style>";
    
      
        while($row = mysqli_fetch_array($result)){ 
           
        if($row['tittle_name'] != ''){
          $output .= '
          <body>
            <div class="container" >
              <div class="bgImge">
                <img src="./tittleImages/'.$row['tittle_image'].'" style="width:1030px; height:680px;position: relative;"/>
              </div>
              <div class="centered">
                <h1>Heading</h1>
                <p>paragraph</p>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
        }
        else{
          $output .= '
          <body>
            <div class="container">
            
              
              <div class="left">
                <div class="heading">
                  <p>'.$row["style"].'</p>
                </div>
                <div class="front_image">
                  <img src="./upload/'.$row['front_image'].'" alt="" srcset="" />
                </div>
                
                <div class="right">
                  <div class="logo">
                    <img src="./img/DCCLogo.jpg" />
                  </div>
                  <div class="right_image">
                    <div class="para">
                      <p>
                     
                        <span>'.strtoupper($row["heading1"]).'</span>
                        <br />
                        <span>'.strtoupper($row["heading2"]).' </span>
                        <br />
                        <span>'.strtoupper($row["heading3"]).'</span>
                      </p>
                      
                    </div>
                  <table id="customers">
                      <tr>
                        <td>STYLE</td> 
                        <td><b>:</b></td>
                        <td>'.$row["style"].'</td>
                      
                      </tr>
                      <tr>
                        <td>FABRIC</td>
                        <td><b> : </b></td>
                        <td>'.$row["fabric"].'</td>
                        
                      </tr>
                      <tr>
                        <td>COM</td>
                        <td><b>:</b></td>
                        <td>'.$row["com"].'</td>
                        
                      </tr>
                      <tr>
                        <td>WASH</td>
                        <td><b>:</b></td>
                        <td>'.$row["wash"].'</td>
                        
                      </tr>
                  </table>
                    <img src="../assets/img/TextureImage.jpg" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="column">
                 
                </div>
    
                <div class="column" style="padding-right:20px;">
                  <div class="card">
                    <img src="./upload/'.$row['box2'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box3'].'" />
                  </div>
                </div>
    
                <div class="column">
                 
                </div>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
            $i++ ;
        }
      } 
  $output .= "</html>"; 
  $dompdf->set_option('enable_html5_parser', TRUE);
  $dompdf->loadHtml($output); 
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render(); 
  $dompdf->stream("",array("Attachment" => false)); 
  } } 

}
else if($format_id == 3){
  $approve = "SELECT * FROM format3 where category = '".$category."' and collection_id = '".$collection_id."'";
  if($result = mysqli_query($link, $approve)){
    if(mysqli_num_rows($result) > 0){ 
      $i = 1;
      $output = "<html>
        <style>
        @font-face {
          font-family: 'Courier New Bold';
          src: url('../assets/fonts/Courier New Bold.ttf');
         
          }
          .container {
            
            width: 100%;
          }
          
          .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align:center;
          }
          .heading p{
            padding:5px 15px 5px 15px;
            background-color:#cbcbcb;
            display: inline-block;
            font-family: Courier New Bold; 
          }
          .left {
            height: 500px;
            width:100%;
            
          }
          .front_image {
            width:32.5%;
            float: left;
            height:530px;
          }
          .front_image img{
            height: 100%;
            width: 100%;
            object-fit: fill;
          }
          .back_image {
           
            margin-left: 20px;
            width:32.5%;
            float: left;
            height:530px;
          }
          .back_image img{
            height: 100%;
            width: 100%;
            object-fit: fill;
          }
          .right{
            width: 30%;
            height: 600px;
            float:right;
            
          }
          .logo{
            text-align:center;
          }
          .logo img{
            height:90px;
            width:150px;
            
          }
          .right_image {
            margin-top:20px
            width: 10%;
            height: 470px;
          }
          .para{
            font-family: Courier New Bold;
            position: absolute;
            z-index:1;
            width:80%;
            height:150px;
            padding-top:5px;
            margin-left:-20px;
           
          }
         
          
          .para p{
            color:white;
            font-size:28px;
            letter-spacing: 5px;
           
          }
          .para p span{
            background-color:#243561;
            padding-left: 4px
          }
          #customers {
            
            margin-top:170px;
            position: absolute;
            z-index:1
            border-collapse: collapse;
            margin-left:25px
          }
          
          #customers td,  {
            font-size:20px;
            font-family: Courier New Bold;
            padding:0px
          }
          .right_image img{
            float:right;
            position: relative;
            height: 100%;
            width: 95%;
            object-fit: fill;
          }
  
         
        </style>";
      
      
        while($row = mysqli_fetch_array($result)){ 
           
        if($row['tittle_name'] != ''){
          $output .= '
          <body>
            <div class="container" >
              <div class="bgImge">
                <img src="./tittleImages/'.$row['tittle_image'].'" style="width:1030px; height:680px;position: relative;"/>
              </div>
              <div class="centered">
                <h1>Heading</h1>
                <p>paragraph</p>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
        }
        else{
          $output .= '
          <body>
            <div class="container">
            
              
              <div class="left">
                <div class="heading">
                  <p>'.$row["style"].'</p>
                </div>
                <div class="front_image">
                  <img src="./upload/'.$row['front_image'].'" alt="" srcset="" />
                </div>
                <div class="back_image">
                  <img src="./upload/'.$row['back_image'].'" alt="" srcset="" />
                </div>
                <div class="right">
                  <div class="logo">
                    <img src="./img/DCCLogo.jpg" />
                  </div>
                  <div class="right_image">
                    <div class="para">
                      <p>
                     
                        <span>'.strtoupper($row["heading1"]).'</span>
                        <br />
                        <span>'.strtoupper($row["heading2"]).' </span>
                        <br />
                        <span>'.strtoupper($row["heading3"]).'</span>
                      </p>
                      
                    </div>
                  <table id="customers">
                      <tr>
                        <td>STYLE</td> 
                        <td><b>:</b></td>
                        <td>'.$row["style"].'</td>
                      
                      </tr>
                      <tr>
                        <td>FABRIC</td>
                        <td><b> : </b></td>
                        <td>'.$row["fabric"].'</td>
                        
                      </tr>
                      <tr>
                        <td>COM</td>
                        <td><b>:</b></td>
                        <td>'.$row["com"].'</td>
                        
                      </tr>
                      <tr>
                        <td>WASH</td>
                        <td><b>:</b></td>
                        <td>'.$row["wash"].'</td>
                        
                      </tr>
                  </table>
                    <img src="../assets/img/TextureImage.jpg" />
                  </div>
                </div>
              </div>
             
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
            $i++ ;
        }
      } 
  $output .= "</html>"; 
  $dompdf->set_option('enable_html5_parser', TRUE);
  $dompdf->loadHtml($output); 
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render(); 
  $dompdf->stream("",array("Attachment" => false)); 
  } } 

}
else if($format_id == 4){
  $approve = "SELECT * FROM format4 where category = '".$category."' and collection_id = '".$collection_id."'";
  if($result = mysqli_query($link, $approve)){
    if(mysqli_num_rows($result) > 0){ 
      $i = 1;
     
      $output = "<html>
      
      <style>
      @font-face {
        font-family: 'Courier New Bold';
        src: url('../assets/fonts/Courier New Bold.ttf');
       
        }
        .container {
          
          width: 100%;
        }
        
        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align:center;
        }
        .heading p{
          padding:5px 15px 5px 15px;
          background-color:#cbcbcb;
          display: inline-block;
          font-family: Courier New Bold; 
        }
        .left {
          height: 500px;
          width:100%;
          
        }
        .front_image {
          
          width:65%;
          float: left;
          height:450px;
        }
        .front_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .back_image {
         
          margin-left: 20px;
          width:32.5%;
          float: left;
          height:450px;
        }
        .back_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .right{
          width: 30%;
          height: 600px;
          float:right;
          
        }
        .logo{
          text-align:center;
        }
        .logo img{
          height:90px;
          width:150px;
          
        }
        .right_image {
          margin-top:20px
          width: 10%;
          height: 470px;
        }
        .para{
          font-family: Courier New Bold;
          position: absolute;
          z-index:1;
          width:80%;
          height:150px;
          padding-top:5px;
          margin-left:-20px;
         
        }
       
        
        .para p{
          color:white;
          font-size:28px;
          letter-spacing: 5px;
         
        }
        .para p span{
          background-color:#243561;
          padding-left: 4px
        }
        #customers {
          
          margin-top:170px;
          position: absolute;
          z-index:1
          border-collapse: collapse;
          margin-left:25px
        }
        
        #customers td,  {
          font-size:20px;
          font-family: Courier New Bold;
          padding:0px
        }
        .right_image img{
          float:right;
          position: relative;
          height: 100%;
          width: 95%;
          object-fit: fill;
        }

        .row {
          width: 64%;
          height: 130px;
          margin-top: 4%;
        }
        .column {
          float: left;
          width: 23.8%;
          padding-right:20px;
         
        }
        
        .card {
          
          text-align: center;
         
          border-radius: 4px;
        }
        .card img {
          box-shadow: 0 24px 28px 0 rgba(0, 0, 0, 1);
          background-color: #f1f1f1;
          height: 100%;
          width: 100%;
          object-fit: fill;
          
        }
        .bgImge{
          
        }
      </style>";
    
      
        while($row = mysqli_fetch_array($result)){ 
           
        if($row['tittle_name'] != ''){
          $output .= '
          <body>
            <div class="container" >
              <div class="bgImge">
                <img src="./tittleImages/'.$row['tittle_image'].'" style="width:1030px; height:680px;position: relative;"/>
              </div>
              <div class="centered">
                <h1>Heading</h1>
                <p>paragraph</p>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
        }
        else{
          $output .= '
          <body>
            <div class="container">
            
              
              <div class="left">
                <div class="heading">
                  <p>'.$row["style"].'</p>
                </div>
                <div class="front_image">
                  <img src="./upload/'.$row['front_image'].'" alt="" srcset="" />
                </div>
                
                <div class="right">
                  <div class="logo">
                    <img src="./img/DCCLogo.jpg" />
                  </div>
                  <div class="right_image">
                    <div class="para">
                      <p>
                     
                        <span>'.strtoupper($row["heading1"]).'</span>
                        <br />
                        <span>'.strtoupper($row["heading2"]).' </span>
                        <br />
                        <span>'.strtoupper($row["heading3"]).'</span>
                      </p>
                      
                    </div>
                  <table id="customers">
                      <tr>
                        <td>STYLE</td> 
                        <td><b>:</b></td>
                        <td>'.$row["style"].'</td>
                      
                      </tr>
                      <tr>
                        <td>FABRIC</td>
                        <td><b> : </b></td>
                        <td>'.$row["fabric"].'</td>
                        
                      </tr>
                      <tr>
                        <td>COM</td>
                        <td><b>:</b></td>
                        <td>'.$row["com"].'</td>
                        
                      </tr>
                      <tr>
                        <td>WASH</td>
                        <td><b>:</b></td>
                        <td>'.$row["wash"].'</td>
                        
                      </tr>
                  </table>
                    <img src="../assets/img/TextureImage.jpg" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="column">
                 
                </div>
    
                <div class="column" style="padding-right:20px;">
                  <div class="card">
                    <img src="./upload/'.$row['box2'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box3'].'" />
                  </div>
                </div>
    
                <div class="column">
                 
                </div>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
            $i++ ;
        }
      } 
  $output .= "</html>"; 
  $dompdf->set_option('enable_html5_parser', TRUE);
  $dompdf->loadHtml($output); 
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render(); 
  $dompdf->stream("",array("Attachment" => false)); 
  } } 

}
else if($format_id == 5){
  $approve = "SELECT * FROM format5 where category = '".$category."' and collection_id = '".$collection_id."'";
  if($result = mysqli_query($link, $approve)){
    if(mysqli_num_rows($result) > 0){ 
      $i = 1;
     
      $output = "<html>
      
      <style>
      @font-face {
        font-family: 'Courier New Bold';
        src: url('../assets/fonts/Courier New Bold.ttf');
       
        }
        .container {
          
          width: 100%;
        }
        
        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align:center;
        }
        .heading p{
          padding:5px 15px 5px 15px;
          background-color:#cbcbcb;
          display: inline-block;
          font-family: Courier New Bold; 
        }
        .left {
          height: 500px;
          width:100%;
          
        }
        .front_image {
          
          width:65%;
          float: left;
          height:450px;
        }
        .front_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .back_image {
         
          margin-left: 20px;
          width:32.5%;
          float: left;
          height:450px;
        }
        .back_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .right{
          width: 30%;
          height: 600px;
          float:right;
          
        }
        .logo{
          text-align:center;
        }
        .logo img{
          height:90px;
          width:150px;
          
        }
        .right_image {
          margin-top:20px
          width: 10%;
          height: 470px;
        }
        .para{
          font-family: Courier New Bold;
          position: absolute;
          z-index:1;
          width:80%;
          height:150px;
          padding-top:5px;
          margin-left:-20px;
         
        }
       
        
        .para p{
          color:white;
          font-size:28px;
          letter-spacing: 5px;
         
        }
        .para p span{
          background-color:#243561;
          padding-left: 4px
        }
        #customers {
          
          margin-top:170px;
          position: absolute;
          z-index:1
          border-collapse: collapse;
          margin-left:25px
        }
        
        #customers td,  {
          font-size:20px;
          font-family: Courier New Bold;
          padding:0px
        }
        .right_image img{
          float:right;
          position: relative;
          height: 100%;
          width: 95%;
          object-fit: fill;
        }

        .row {
          width: 64%;
          height: 130px;
          margin-top: 4%;
        }
        .column {
          float: left;
          width: 23.8%;
          padding-right:20px;
         
        }
        
        .card {
          
          text-align: center;
         
          border-radius: 4px;
        }
        .card img {
          box-shadow: 0 24px 28px 0 rgba(0, 0, 0, 1);
          background-color: #f1f1f1;
          height: 100%;
          width: 100%;
          object-fit: fill;
          
        }
        .bgImge{
          
        }
      </style>";
    
      
        while($row = mysqli_fetch_array($result)){ 
           
        if($row['tittle_name'] != ''){
          $output .= '
          <body>
            <div class="container" >
              <div class="bgImge">
                <img src="./tittleImages/'.$row['tittle_image'].'" style="width:1030px; height:680px;position: relative;"/>
              </div>
              <div class="centered">
                <h1>Heading</h1>
                <p>paragraph</p>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
        }
        else{
          $output .= '
          <body>
            <div class="container">
            
              
              <div class="left">
                <div class="heading">
                  <p>'.$row["style"].'</p>
                </div>
                <div class="front_image">
                  <img src="./upload/'.$row['front_image'].'" alt="" srcset="" />
                </div>
                
                <div class="right">
                  <div class="logo">
                    <img src="./img/DCCLogo.jpg" />
                  </div>
                  <div class="right_image">
                    <div class="para">
                      <p>
                     
                        <span>'.strtoupper($row["heading1"]).'</span>
                        <br />
                        <span>'.strtoupper($row["heading2"]).' </span>
                        <br />
                        <span>'.strtoupper($row["heading3"]).'</span>
                      </p>
                      
                    </div>
                  <table id="customers">
                      <tr>
                        <td>STYLE</td> 
                        <td><b>:</b></td>
                        <td>'.$row["style"].'</td>
                      
                      </tr>
                      <tr>
                        <td>FABRIC</td>
                        <td><b> : </b></td>
                        <td>'.$row["fabric"].'</td>
                        
                      </tr>
                      <tr>
                        <td>COM</td>
                        <td><b>:</b></td>
                        <td>'.$row["com"].'</td>
                        
                      </tr>
                      <tr>
                        <td>WASH</td>
                        <td><b>:</b></td>
                        <td>'.$row["wash"].'</td>
                        
                      </tr>
                  </table>
                    <img src="../assets/img/TextureImage.jpg" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="column">
                 
                </div>
    
                <div class="column" style="padding-right:20px;">
                  <div class="card">
                    <img src="./upload/'.$row['box2'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box3'].'" />
                  </div>
                </div>
    
                <div class="column">
                 
                </div>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
            $i++ ;
        }
      } 
  $output .= "</html>"; 
  $dompdf->set_option('enable_html5_parser', TRUE);
  $dompdf->loadHtml($output); 
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render(); 
  $dompdf->stream("",array("Attachment" => false)); 
  } } 

}
else if($format_id == 6){
  $approve = "SELECT * FROM format where category = '".$category."' and collection_id = '".$collection_id."'";
  if($result = mysqli_query($link, $approve)){
    if(mysqli_num_rows($result) > 0){ 
      $i = 1;
     
      $output = "<html>
      
      <style>
      @font-face {
        font-family: 'Courier New Bold';
        src: url('../assets/fonts/Courier New Bold.ttf');
       
        }
        .container {
          
          width: 100%;
        }
        
        .centered {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          text-align:center;
        }
        .heading p{
          padding:5px 15px 5px 15px;
          background-color:#cbcbcb;
          display: inline-block;
          font-family: Courier New Bold; 
        }
        .left {
          height: 500px;
          width:100%;
          
        }
        .front_image {
          
          width:65%;
          float: left;
          height:450px;
        }
        .front_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .back_image {
         
          margin-left: 20px;
          width:32.5%;
          float: left;
          height:450px;
        }
        .back_image img{
          height: 100%;
          width: 100%;
          object-fit: fill;
        }
        .right{
          width: 30%;
          height: 600px;
          float:right;
          
        }
        .logo{
          text-align:center;
        }
        .logo img{
          height:90px;
          width:150px;
          
        }
        .right_image {
          margin-top:20px
          width: 10%;
          height: 470px;
        }
        .para{
          font-family: Courier New Bold;
          position: absolute;
          z-index:1;
          width:80%;
          height:150px;
          padding-top:5px;
          margin-left:-20px;
         
        }
       
        
        .para p{
          color:white;
          font-size:28px;
          letter-spacing: 5px;
         
        }
        .para p span{
          background-color:#243561;
          padding-left: 4px
        }
        #customers {
          
          margin-top:170px;
          position: absolute;
          z-index:1
          border-collapse: collapse;
          margin-left:25px
        }
        
        #customers td,  {
          font-size:20px;
          font-family: Courier New Bold;
          padding:0px
        }
        .right_image img{
          float:right;
          position: relative;
          height: 100%;
          width: 95%;
          object-fit: fill;
        }

        .row {
          width: 64%;
          height: 130px;
          margin-top: 4%;
        }
        .column {
          float: left;
          width: 23.8%;
          padding-right:20px;
         
        }
        
        .card {
          
          text-align: center;
         
          border-radius: 4px;
        }
        .card img {
          box-shadow: 0 24px 28px 0 rgba(0, 0, 0, 1);
          background-color: #f1f1f1;
          height: 100%;
          width: 100%;
          object-fit: fill;
          
        }
        .bgImge{
          
        }
      </style>";
    
      
        while($row = mysqli_fetch_array($result)){ 
           
        if($row['tittle_name'] != ''){
          $output .= '
          <body>
            <div class="container" >
              <div class="bgImge">
                <img src="./tittleImages/'.$row['tittle_image'].'" style="width:1030px; height:680px;position: relative;"/>
              </div>
              <div class="centered">
                <h1>Heading</h1>
                <p>paragraph</p>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
        }
        else{
          $output .= '
          <body>
            <div class="container">
            
              
              <div class="left">
                <div class="heading">
                  <p>'.$row["style"].'</p>
                </div>
                <div class="front_image">
                  <img src="./upload/'.$row['front_image'].'" alt="" srcset="" />
                </div>
                
                <div class="right">
                  <div class="logo">
                    <img src="./img/DCCLogo.jpg" />
                  </div>
                  <div class="right_image">
                    <div class="para">
                      <p>
                     
                        <span>'.strtoupper($row["heading1"]).'</span>
                        <br />
                        <span>'.strtoupper($row["heading2"]).' </span>
                        <br />
                        <span>'.strtoupper($row["heading3"]).'</span>
                      </p>
                      
                    </div>
                  <table id="customers">
                      <tr>
                        <td>STYLE</td> 
                        <td><b>:</b></td>
                        <td>'.$row["style"].'</td>
                      
                      </tr>
                      <tr>
                        <td>FABRIC</td>
                        <td><b> : </b></td>
                        <td>'.$row["fabric"].'</td>
                        
                      </tr>
                      <tr>
                        <td>COM</td>
                        <td><b>:</b></td>
                        <td>'.$row["com"].'</td>
                        
                      </tr>
                      <tr>
                        <td>WASH</td>
                        <td><b>:</b></td>
                        <td>'.$row["wash"].'</td>
                        
                      </tr>
                  </table>
                    <img src="../assets/img/TextureImage.jpg" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="column">
                 
                </div>
    
                <div class="column" style="padding-right:20px;">
                  <div class="card">
                    <img src="./upload/'.$row['box2'].'" />
                  </div>
                </div>
    
                <div class="column">
                  <div class="card">
                    <img src="./upload/'.$row['box3'].'" />
                  </div>
                </div>
    
                <div class="column">
                 
                </div>
              </div>
            </div>
          </body>
          <div style="page-break-after: always"></div>'; 
            $i++ ;
        }
      } 
  $output .= "</html>"; 
  $dompdf->set_option('enable_html5_parser', TRUE);
  $dompdf->loadHtml($output); 
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render(); 
  $dompdf->stream("",array("Attachment" => false)); 
  } } 

}
?>
