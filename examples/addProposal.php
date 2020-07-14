<?php require_once('./connection.php');

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
              <a class="navbar-brand" href="#pablo">Proposal Form</a>
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
                  <h5 class="card-title">Project Detail</h5>
                </div>
                <div class="card-body">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-4 pr-1">
                      <div class="form-group">
                          <label>Heading 1</label>
                          <input
                            type="text"
                            class="form-control"
                            name="heading1"
                          />
                        </div>
                      </div>
                      <div class="col-md-4 px-1">
                      <div class="form-group">
                          <label>Heading 2</label>
                          <input
                            type="text"
                            class="form-control"
                            name="heading2"
                          />
                        </div>
                          
                      </div>
                      <div class="col-md-4 pl-1">
                      <div class="form-group">
                          <label>Heading 3</label>
                          <input
                            type="text"
                            class="form-control"
                            name="heading3"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-5 pr-1">
                      <div class="form-group">
                          <label>Category</label>

                          <select class="form-control" name="dept" id="ddlFruits">
                              <option value="Men" name="men">Men</option>
                              <option value="Women" name="women">Women</option>
                          </select>
                          
                      </div>
                      </div>
                      
                      <div class="col-md-3 px-1">
                        <div class="form-group">
                          <label>Style</label>

                          <input class="form-control" name="style" />
                        </div>
                      </div>
                      <div class="col-md-4 pl-1">
                        <div class="form-group">
                          <label>Fabric</label>

                          <input class="form-control" name="fabric" />
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4 pr-1">
                        <div class="form-group">
                          <label>COM</label>
                          <input type="text" class="form-control" name="com" />
                        </div>
                      </div>
                      <div class="col-md-4 px-1">
                        <div class="form-group">
                          <label>Wash</label>
                          <input type="text" name="wash" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <label>Front Image</label>
                        <input
                          type="file"
                          class="form-control files"
                          name="front_image"
                        />
                      </div>
                      <div class="col-md-6 pr-1">
                        <label>Back Image</label>
                        <input
                          type="file"
                          class="form-control"
                          name="back_image"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <label>Box1 Image</label>
                        <input type="file" name="box1" class="form-control" />
                      </div>
                      <div class="col-md-6 pr-1">
                        <label>Box2 Image</label>
                        <input type="file" name="box2" class="form-control" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <label>Box3 Image</label>
                        <input type="file" name="box3" class="form-control" />
                      </div>
                      <div class="col-md-6 pr-1">
                        <label>Box4 Image</label>
                        <input type="file" name="box4" class="form-control" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="update ml-auto mr-auto">
                          <button type="submit" name="submit" class="btn btn-primary btn-round">
                              Submit Proposal</button>
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
  </body>
</html>
<?php


if(isset($_POST['submit'])){
  $heading1 = $_POST['heading1'];
  $heading2 = $_POST['heading2'];
  $heading3 = $_POST['heading3'];
  $style = $_POST['style'];
  $fabric = $_POST['fabric'];
  $com = $_POST['com'];
  $wash = $_POST['wash'];
  $front_image = $_FILES['front_image']['name'];
  $back_image = $_FILES['back_image']['name'];
  $box1 = $_FILES['box1']['name'];
  $box2 = $_FILES['box2']['name'];
  $box3 = $_FILES['box3']['name'];
  $box4 = $_FILES['box4']['name'];
  $category = strtolower($_POST['dept']);
  $target_dir = "./upload/";
  $target_file1 = $target_dir.basename($_FILES["front_image"]["name"]);
  $target_file2 = $target_dir.basename($_FILES["back_image"]["name"]);
  $target_file3 = $target_dir.basename($_FILES["box1"]["name"]);
  $target_file4 = $target_dir.basename($_FILES["box2"]["name"]);
  $target_file5 = $target_dir.basename($_FILES["box3"]["name"]);
  $target_file6 = $target_dir.basename($_FILES["box4"]["name"]);

  // Select file type
  $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
  $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
  $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
  $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));
  $imageFileType5 = strtolower(pathinfo($target_file5,PATHINFO_EXTENSION));
  $imageFileType6 = strtolower(pathinfo($target_file6,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType1,$extensions_arr) ){
  
      // Insert record
      $query = "insert into students(heading1,heading2,heading3,category,style,fabric,com,wash,front_image,back_image,box1,box2,box3,box4,collection_id) values('".$heading1."','".$heading2."','".$heading3."','".$category."','".$style."','".$fabric."','".$com."','".$wash."','".$front_image."','".$back_image."','".$box1."','".$box2."','".$box3."','".$box4."','".$collection_id."')";
      mysqli_query($link,$query);
  
      // Upload file
      move_uploaded_file($_FILES['front_image']['tmp_name'],$target_dir.$front_image);
      move_uploaded_file($_FILES['back_image']['tmp_name'],$target_dir.$back_image);
      move_uploaded_file($_FILES['box1']['tmp_name'],$target_dir.$box1);
      move_uploaded_file($_FILES['box2']['tmp_name'],$target_dir.$box2);
      move_uploaded_file($_FILES['box3']['tmp_name'],$target_dir.$box3);
      move_uploaded_file($_FILES['box4']['tmp_name'],$target_dir.$box4);
      header('location:index.php');

  }
}
?>