<?php

require_once('./connection.php');
$format_id = $_GET['format_id'];
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $sql = "delete from students where page_id=".$id;
    if(mysqli_query($link, $sql)){
        header('location:index.php');
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
                        <a class="navbar-brand" href="#pablo">DCC Collection</a>
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
                                <h4 style="display:inline-block" class="card-title"> DCC Collection</h4>
                                <a href="./addcollection.php?format_id=<?php echo $format_id;?>" class="btn pull-right" >Add Collection</a>
                                
                            </div>
                            <div class="card-body">
                            
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <?php
                                        $selectStudents = "select * from collection where format_id ='".$format_id."'";
                                        if($result = mysqli_query($link, $selectStudents)){
                                        if(mysqli_num_rows($result) > 0){

                                        ?>
                                        <table class="table">
                                            <thead class=" text-primary">
                                                <th>
                                                Collection Name
                                                </th>
                                                <th>
                                                    Collection Code
                                                </th>
                                                
                                                <th>Action</th>
                                            </thead>
                                            <tbody>


                                                <?php  while($row = mysqli_fetch_array($result)){ ?>
                                                <tr>
                                                    <td>
                                                        <?=$row['col_name']?>
                                                    </td>
                                                    <td>
                                                    
                                                        <?=$row['col_code']?>
                                                    </td>
                                                    <td>
                                                        <a href="./proposals.php?id=<?php echo $row['collection_id']; ?>&format_id=<?php echo $format_id; ?>" class="btn">View</a>
                                                        
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

    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</body>

</html>