<?php

require_once('./connection.php');
$collection_id = $_GET['id'];
$format_id = $_GET['format_id'];
$upload_dir = './upload/';
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $del = "select * from format1 where page_id = ".$id;
  $delTeam = mysqli_query($link, $del);
  if(mysqli_num_rows($delTeam) > 0){
    $row = mysqli_fetch_assoc($delTeam);
    $front_image = $row['front_image'];
    $back_image = $row['back_image'];
    $box1 = $row['box1'];
    $box2 = $row['box2'];
    $box3 = $row['box3'];
    $box4 = $row['box4'];
    
    unlink($upload_dir.$front_image);
    unlink($upload_dir.$back_image);
    unlink($upload_dir.$box1);
    unlink($upload_dir.$box2);
    unlink($upload_dir.$box3);
    unlink($upload_dir.$box4);
    $sql = "delete from students where page_id=".$id;
    if(mysqli_query($link, $sql)){
      header('location:index.php');
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    DCC - DENIM CLOTHING COMPANY
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />

</head>

<body class="">
    <div class="wrapper ">
        <?php include('./sidebar.php'); ?>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">DCC Proposals</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

                        <ul class="navbar-nav">

                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-settings-gear-65"></i>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Logout</a>

                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
                
            <div class="content">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 style="display:inline-block" class="card-title"> DCC Proposals</h4>
                                
                                <select class="btn btn-primary dropdown-toggle mr-4 pull-right"  id="filter" >
                
                                    <option  value="all" name="">All</option>
                                    <option  value="men">Men</option>
                                    <option  value="women">Women</option>
                                    <option  value="boys">Boys</option>
                                    <option  value="girls">Girls</option>
                                
                                </select>
                                <input type="button" value="Export to PDF" name="submit_val" onclick="generatePdf()" class="btn btn-primary pull-right" />
                            </div>
                            <div class="card-body">

                                <section id="tabs">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <nav>
                                                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Men</a>
                                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Women</a>
                                                        <a class="nav-item nav-link" id="nav-girls-tab" data-toggle="tab" href="#nav-girls" role="tab" aria-controls="nav-girls" aria-selected="false">Girls</a>
                                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-boys" role="tab" aria-controls="nav-boys" aria-selected="false">Boys</a>

                                                    </div>
                                                </nav>
                                            
                                                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-home" value="new" name="new" role="tabpanel" aria-labelledby="nav-home-tab">
                                                        <a href="./addProposal.php?tabid=men&col_id=<?php echo $collection_id; ?>" class="btn pull-right" >Add Page</a>
                                                        <a href="./addtittle.php?tabid=men&col_id=<?php echo $collection_id; ?>" class="btn pull-right"id="addTittle" >Add Tittle</a>
                                                        <br>
                                                        <br>
                                                        <?php
                                                        
                                                        if($format_id == 1){
                                                            $selectStudents = "select * from format1 where category = 'men' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 2){
                                                            $selectStudents = "select * from format2 where category = 'men' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 3){
                                                            $selectStudents = "select * from format3 where category = 'men' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 4){
                                                            $selectStudents = "select * from format4 where category = 'men' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 5){
                                                            $selectStudents = "select * from format5 where category = 'men' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 6){
                                                            $selectStudents = "select * from format6 where category = 'men' and collection_id = '".$collection_id."'";
                                                          }
                                                        if($result = mysqli_query($link, $selectStudents)){
                                                        if(mysqli_num_rows($result) > 0){

                                                        ?>
                                                        <table class="table">
                                                            <thead class=" text-primary">
                                                                <th>
                                                                Page No
                                                                </th>
                                                                <th>
                                                                    Page Heading
                                                                </th>
                                                                <th>
                                                                    Style
                                                                </th>
                                                                <th>
                                                                    Fabric
                                                                </th>
                                                                <th>
                                                                    COM
                                                                </th>
                                                                <th>
                                                                    Wash
                                                                </th>
                                                                <th>
                                                                    Tittle
                                                                </th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>


                                                                <?php  while($row = mysqli_fetch_array($result)){ ?>
                                                                <tr>
                                                                    <td>
                                                                        <?=$row['page_id']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['heading1']?><?=$row['heading2']?><?=$row['heading3']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['style']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['fabric']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['com']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['wash']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['tittle_name']?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="./editproposals.php?edit=<?php echo $row['page_id'] ?>" class="btn">Edit</a>
                                                                        <a href="index.php?delete=<?php echo $row['page_id'] ?>" style="background-color:red"
                                                                            class="btn" onclick="return confirm('Are you sure to delete this record?')">Delete</a>

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                    }
                                                                    }
                                                                    else{
                                                                    echo "No records matching your query were found.";
                                                                }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                        <a href="./addProposal.php?tabid=women&col_id=<?php echo $collection_id; ?>" class="btn pull-right" >Add Page</a>
                                                        <a href="./addtittle.php?tabid=women&col_id=<?php echo $collection_id; ?>" class="btn pull-right"id="addTittle" >Add Tittle</a>
                                                        <br>
                                                        <br>
                                                        <?php
                                                         if($format_id == 1){
                                                            $selectStudents1 = "select * from format1 where category = 'women' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 2){
                                                            $selectStudents1 = "select * from format2 where category = 'women' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 3){
                                                            $selectStudents1 = "select * from format3 where category = 'women' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 4){
                                                            $selectStudents1 = "select * from format4 where category = 'women' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 5){
                                                            $selectStudents1 = "select * from format5 where category = 'women' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 6){
                                                            $selectStudents1 = "select * from format6 where category = 'women' and collection_id = '".$collection_id."'";
                                                          }
                                                        
                                                            if($result = mysqli_query($link, $selectStudents1)){
                                                            if(mysqli_num_rows($result) > 0){

                                                            ?>
                                                            <table class="table">
                                                                <thead class=" text-primary">
                                                                    <th>
                                                                    Page No
                                                                    </th>
                                                                    <th>
                                                                        Page Heading
                                                                    </th>
                                                                    <th>
                                                                        Style
                                                                    </th>
                                                                    <th>
                                                                        Fabric
                                                                    </th>
                                                                    <th>
                                                                        COM
                                                                    </th>
                                                                    <th>
                                                                        Wash
                                                                    </th>
                                                                    <th>
                                                                        Tittle
                                                                    </th>
                                                                    <th>Action</th>
                                                                </thead>
                                                                <tbody>


                                                                    <?php  while($row = mysqli_fetch_array($result)){ ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?=$row['page_id']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['heading1']?><?=$row['heading2']?><?=$row['heading3']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['style']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['fabric']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['com']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['wash']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['tittle_name']?>
                                                                        </td>
                                                                        <td>
                                                                        <a href="./editproposals.php?edit=<?php echo $row['page_id'] ?>" class="btn">Edit</a>
                                                                            <a href="index.php?delete=<?php echo $row['page_id'] ?>" style="background-color:red"
                                                                                class="btn" onclick="return confirm('Are you sure to delete this record?')">Delete</a>

                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                        }
                                                                        }
                                                                        else{
                                                                        echo "No records matching your query were found.";
                                                                    }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-girls" value="new" name="new" role="tabpanel" aria-labelledby="nav-girls-tab">
                                                        <a href="./addProposal.php?tabid=girls&col_id=<?php echo $collection_id; ?>" class="btn pull-right" >Add Page</a>
                                                        <a href="./addtittle.php?tabid=girls&col_id=<?php echo $collection_id; ?>" class="btn pull-right"id="addTittle" >Add Tittle</a>
                                                        <br>
                                                        <br>
                                                        <?php
                                                         if($format_id == 1){
                                                            $selectStudents = "select * from format1 where category = 'girls' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 2){
                                                            $selectStudents = "select * from format2 where category = 'girls' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 3){
                                                            $selectStudents = "select * from format3 where category = 'girls' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 4){
                                                            $selectStudents = "select * from format4 where category = 'girls' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 5){
                                                            $selectStudents = "select * from format5 where category = 'girls' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 6){
                                                            $selectStudents = "select * from format6 where category = 'girls' and collection_id = '".$collection_id."'";
                                                          }
                                                       
                                                        if($result = mysqli_query($link, $selectStudents)){
                                                        if(mysqli_num_rows($result) > 0){

                                                        ?>
                                                        <table class="table">
                                                            <thead class=" text-primary">
                                                                <th>
                                                                Page No
                                                                </th>
                                                                <th>
                                                                    Page Heading
                                                                </th>
                                                                <th>
                                                                    Style
                                                                </th>
                                                                <th>
                                                                    Fabric
                                                                </th>
                                                                <th>
                                                                    COM
                                                                </th>
                                                                <th>
                                                                    Wash
                                                                </th>
                                                                <th>
                                                                    Tittle
                                                                </th>
                                                                <th>Action</th>
                                                            </thead>
                                                            <tbody>


                                                                <?php  while($row = mysqli_fetch_array($result)){ ?>
                                                                <tr>
                                                                    <td>
                                                                        <?=$row['page_id']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['heading1']?><?=$row['heading2']?><?=$row['heading3']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['style']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['fabric']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['com']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['wash']?>
                                                                    </td>
                                                                    <td>
                                                                        <?=$row['tittle_name']?>
                                                                    </td>
                                                                    <td>
                                                                        <a href="./editproposals.php?edit=<?php echo $row['page_id'] ?>" class="btn">Edit</a>
                                                                        <a href="index.php?delete=<?php echo $row['page_id'] ?>" style="background-color:red"
                                                                            class="btn" onclick="return confirm('Are you sure to delete this record?')">Delete</a>

                                                                    </td>
                                                                </tr>
                                                                <?php
                                                                    }
                                                                    }
                                                                    else{
                                                                    echo "No records matching your query were found.";
                                                                }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-boys" role="tabpanel" aria-labelledby="nav-boys-tab">
                                                        <a href="./addProposal.php?tabid=boys&col_id=<?php echo $collection_id; ?>" class="btn pull-right" >Add Page</a>
                                                        <a href="./addtittle.php?tabid=boys&col_id=<?php echo $collection_id; ?>" class="btn pull-right"id="addTittle" >Add Tittle</a>
                                                        <br>
                                                        <br>
                                                        <?php
                                                         if($format_id == 1){
                                                            $selectStudents1 = "select * from format1 where category = 'boys' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 2){
                                                            $selectStudents1 = "select * from format2 where category = 'boys' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 3){
                                                            $selectStudents1 = "select * from format3 where category = 'boys' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 4){
                                                            $selectStudents1 = "select * from format4 where category = 'boys' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 5){
                                                            $selectStudents1 = "select * from format5 where category = 'boys' and collection_id = '".$collection_id."'";
                                                          }
                                                          if($format_id == 6){
                                                            $selectStudents1 = "select * from format6 where category = 'boys' and collection_id = '".$collection_id."'";
                                                          }
                                                       
                                                            if($result = mysqli_query($link, $selectStudents1)){
                                                            if(mysqli_num_rows($result) > 0){

                                                            ?>
                                                            <table class="table">
                                                                <thead class=" text-primary">
                                                                    <th>
                                                                    Page No
                                                                    </th>
                                                                    <th>
                                                                        Page Heading
                                                                    </th>
                                                                    <th>
                                                                        Style
                                                                    </th>
                                                                    <th>
                                                                        Fabric
                                                                    </th>
                                                                    <th>
                                                                        COM
                                                                    </th>
                                                                    <th>
                                                                        Wash
                                                                    </th>
                                                                    <th>
                                                                        Tittle
                                                                    </th>
                                                                    <th>Action</th>
                                                                </thead>
                                                                <tbody>


                                                                    <?php  while($row = mysqli_fetch_array($result)){ ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?=$row['page_id']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['heading1']?><?=$row['heading2']?><?=$row['heading3']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['style']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['fabric']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['com']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['wash']?>
                                                                        </td>
                                                                        <td>
                                                                            <?=$row['tittle_name']?>
                                                                        </td>
                                                                        <td>
                                                                        <a href="./editproposals.php?edit=<?php echo $row['page_id'] ?>" class="btn">Edit</a>
                                                                            <a href="index.php?delete=<?php echo $row['page_id'] ?>" style="background-color:red"
                                                                                class="btn" onclick="return confirm('Are you sure to delete this record?')">Delete</a>

                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                        }
                                                                        }
                                                                        else{
                                                                        echo "No records matching your query were found.";
                                                                    }
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </section>
                        
                            

                            </div>
                        </div>
                    </div>

                </div>


            
            </div>

        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  
    <!-- Chart JS -->
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
 
    function generatePdf(){
    
    var e = document.getElementById("filter");
    let batch = e.options[e.selectedIndex].text;
    let collection_id = <?php echo $collection_id;?>;
    let format_id = <?php echo $format_id;?>;
    if(batch == "All"){
        swal("Sorry!", "Invalid Category!", "error");
    }
    else{
        window.location = `./generate_pdf.php?batch=${batch}&col_id=${collection_id}&format_id=${format_id}`
    }
    
    }
    </script>
</body>

</html>