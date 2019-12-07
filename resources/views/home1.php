
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bookstore</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <style>
    .book-position{
      width: 80%;
      text-align: center;
    }
    a {
      font-family: sans-serif;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <nav class="navbar navbar-expand-sm bg-primary row">
  
  <div class="col-lg-4 col-md-4 col-sm-4 col-sm-4">
    <h2 class="text-white">BOOKSTORE</h2>
  </div>
  
  <div class="col-lg-4 col-md-5">
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Search">
        <div class="input-group-append">
          <span class ="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
  </div>
  <!----space--->
  <div class="col-lg-2 col-md-0 col-sm-0"></div>
  
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link text-white" href="#">Giỏ hàng</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="#">Thông báo</a>
    </li>
    <li class="nav-item">
      <!--if checklogin == false -->
      <a class="nav-link text-white" data-toggle="modal" data-target="#login">Đăng nhập</a>
      <!--else -->
      <!-- show dropdown user info -->
      
    </li>
  </ul>

  </nav>
  <!-------------------------------------------------->
  <div class="general row"> <!--body-->
    <div class="category col-lg-2 col-sm-3"> <!--category-->
     <nav class="navbar bg-light">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-dark" href="#">Danh mục</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Truyện tranh</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Sách giáo khoa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Văn học</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Kinh tế</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="#">Văn phòng phẩm</a>
        </li>
      </ul>
      </nav> 
    </div>


    <div class="content col-lg-10 col-sm-9">
      <div class="row">
      <?php foreach($books as $book): ?>
          <div class="col-sm-3 col-lg-3">
            
            <img class="img-fluid img-thumbnail" src='<?php echo $book->image ?>'>
            
            <p><?php echo $book->name?></p>
            <p><?php echo "Gia : ".$book->cost."VND"?></p>
          </div>
        <?php endforeach ?>  
        
        
      </div>
    </div>
    
  </div>
<!------------------------------MODAL--------------------------->

</div>


<script>
</script>
</body>
</html>