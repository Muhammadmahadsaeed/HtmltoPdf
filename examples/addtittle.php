<?php require_once('./connection.php');

$tab_id = $_GET['tabid'];
$collection_id = $_GET['col_id'];

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="../assets/img/apple-icon.png"
    />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
    DCC - DENIM CLOTHING COMPANY
    </title>
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
      name="viewport"
    />
    <!--     Fonts and icons     -->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200"
      rel="stylesheet"
    />
    <link
      href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <link href="./general.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      if(window.history.replaceState){
        window.history.replaceState(null,null,window.location.href)
      }
    

    </script>
  </head>

  <body class="">
    <div class="wrapper">
      <?php include('./sidebar.php'); ?>
      <div class="main-panel">
        <!-- Navbar -->
        <nav
          class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent"
        >
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="#pablo">Proposal Tittle</a>
            </div>
            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navigation"
              aria-controls="navigation-index"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div
              class="collapse navbar-collapse justify-content-end"
              id="navigation"
            >
              <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="http://example.com"
                    id="navbarDropdownMenuLink"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <i class="nc-icon nc-settings-gear-65"></i>
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="navbarDropdownMenuLink"
                  >
                    <a class="dropdown-item" href="#">Logout</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
        <!-- <div class="panel-header panel-header-sm">


</div> -->
        <div class="content">
          <div class="row">
            <div class="col-md-9">
              <div class="card card-user">
                <div class="card-header">
                  <h5 class="card-title">Proposal Tittle</h5>
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6 pr-1">
                      <div class="form-group">
                          <label>Tittle Name</label>
                          <input
                            type="text"
                            class="form-control"
                            name="tittle_name"
                          />
                        </div>
                      </div>
                      <div class="col-md-6 px-1">
                        <div class="form-group">
                            <label>Description</label>
                            <input
                                type="text"
                                class="form-control"
                                name="tittle_des"
                            />
                        </div>
                          
                      </div>
                     
                    </div>
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" name="tittle_image" type='file' onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                    <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                          <button type="submit" name="submit" class="btn btn-primary btn-round">
                              Submit Collection</button>
                      </div>
                    </div>
                  </form>
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
    <script
      src="../assets/js/paper-dashboard.min.js?v=2.0.0"
      type="text/javascript"
    ></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script src="./app.js"></script>
  </body>
</html>
<?php


if(isset($_POST['submit'])){
  $tittle_name = $_POST['tittle_name'];
  $tittle_des = $_POST['tittle_des'];
  $tittle_image = $_FILES['tittle_image']['name'];
  $target_dir = "./tittleImages/";

   
    $target_file1 = $target_dir.basename($_FILES["tittle_image"]["name"]);
  
    // Select file type
    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  
  
    // Valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");
  
    // Check extension
    if( in_array($imageFileType1,$extensions_arr) ){
    
        // Insert record
        $query = "insert into students(category,tittle_name,tittle_des,tittle_image,collection_id) values('".$tab_id."','".$tittle_name."','".$tittle_des."','".$tittle_image."','".$collection_id."')";
        mysqli_query($link,$query);
    
        // Upload file
        move_uploaded_file($_FILES['tittle_image']['tmp_name'],$target_dir.$tittle_image);
        header('location:index.php');
  
    }
  
 
  
  
}
?>