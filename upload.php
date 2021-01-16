<?php
session_start();
$_SESSION['user_session'];
if(!isset($_SESSION['user_session']))
{
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/ian-williams-rKE6rXOl14U-unsplash (1).jpg">
    <title>online art gallery</title>
    <link rel="stylesheet" href="boostrap/mdb.min.css">
    <link rel="stylesheet" href="boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="">


</head>
<style>
    <style>
    .card
        {
            box-shadow: 0 0 5px black;
        }
 #upload 
        {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}
    
    </style>
</style>

   <body style="">
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="border: 0; box-shadow: none;">

            <div class="container">

                <!-- Navbar brand -->
                <a class="navbar-brand font-weight-bold p-auto" href="#" style="font-size: 25px;"><i class="fas fa-paint-brush fa-1x"></i>   Online Art Gallery</a>

                <!-- Collapse button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="basicExampleNav">

                    <!-- Links -->
                    <ul class="navbar-nav ml-auto smooth-scroll font-weight-bold">
                        <li class="nav-item">
                            <a class="nav-link p-2" href="#upload">Uploading</a>
                        </li>
                        
                        
                        
                        
                        <li class="nav-item">
                            <a class="nav-link p-2"" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <!-- Links -->

                    <!-- Social Icon  -->
                    
                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar-->

        <!--Mask-->
        <div id="intro" class="view" style="background-image: url('images/ian-williams-rKE6rXOl14U-unsplash (2).jpg');">

            <div class="mask rgba-black-strong">

                <div class="container-fluid d-flex align-items-center justify-content-center h-100">

                    <div class="row d-flex justify-content-center text-center">

                        <div class="col-md">

                            <!-- Heading -->
                            <h2 class="display-4 font-weight-bold white-text pt-5 mb-2">Uploading painting</h>
                            <h4 class="display-4 font-weight-bold white-text pt-5 mb-2">ONLINE ART GALLERY</h4>

                            <!-- Divider -->
                            <hr class="hr-light">

                            <!-- Description -->
                            <h4 class="white-text my-4">"Art don't have to be pretty. It has to be meaningful"</h4>
                            <button type="button" class="btn btn-outline-white">Read more<i class="fa fa-book ml-2"></i></button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--/.Mask-->

    </header>
    <div class=" m-auto d-flex justify-content-center align-items-center" >
        <div class="container">
            <div class="row mt-5 ">
                <div class="col">
           <div class="card">
            <div class="card-header">
              <h1 class="display-4 text-center text-primary font-weight-bold">Upload Paints</h1> 
               
               
               </div>
               <div class="card-body">
               <form method="POST" action="insert_upload.php" enctype="multipart/form-data">
                 <div class="form-group">
                   <input type="text" class="form-control text-primary " name="name" placeholder="Name">
                   </div>
                    <div class="form-group">
                   <input type="text" class="form-control text-primary " name="artist"  placeholder="Artist Name">
                   </div>
                    <div class="form-group">
                   <input type="text" class="form-control text-primary " name="price"  placeholder="price">
                   </div>
                    <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" name="fileToUpload" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted" >Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"style="background-color:#57C4F3 " > <i class="fa fa-cloud-upload mr-2 text-muted" ></i><small class="text-uppercase font-weight-bold text-muted" >Choose file</small></label>
                    </div>
                </div>
                   <p class="font-italic text-white text-center">The image uploaded will be rendered inside the box below.</p>
                <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                  <button type="submit" class="btn text-white" style="background-color:#57C4F3 ">upload</button>
                   </form>
               
               </div>
            </div> 
                </div>
            </div>
            
            </div>
    </div>

                

                   
                       
    
        <footer class="">
        <div class="footer-copyright text-center py-3 mt-5">© 2020 Copyright:
            <a href="#">Developed by <strong>Lazares</strong>  <strong>Faizan</strong></a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
   </body> 
   <script>
    function readURL(input) {
if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#imageResult')
            .attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
}
}

$(function () {
$('#upload').on('change', function () {
    readURL(input);
});
});

var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
var input = event.srcElement;
var fileName = input.files[0].name;
infoArea.textContent = 'File name: ' + fileName;
}
    </script>      

    

<script src="./js/jquery.min.js">

</script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/mdb.min.js"></script>
</html>