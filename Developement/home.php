<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <style media="screen">
      body{
        background-image: url(img/home.jpg);
        background-size: cover;
        background-repeat: no-repeat;
      }
    </style>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#login').submit(function(event) {
          // get the form data
          // there are many ways to get this data using jQuery (you can use the class or id also)
          var formData = {
          'email'              : $('#email').val(),
          'password'             : $('#password').val(),
          };
          $.ajax({
          type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
          url         : 'Controllers/login.php', // the url where we want to POST//where controller that we want to go to is exist
          data        : formData, // our data object //this data will be sent to contrller in $_POST
          dataType    : 'json', // what type of data do we expect back from the server
          encode          : true
          }).done(function(data) {

            if(data['status']==1)
            {
              window.location.href = "homelogged.php";

            }
            else if(data['status']==0) {
              $(".check").children().remove();
              if(($(".check").children().length==0)&&($("#email").val()))
              {
                var warning = $("<div class='mt-2 alert alert-danger' role='alert'>E-mail and password aren't matching</div>");
                $(".check").append(warning);
                $(".check").slideDown();
                $(".check").delay(2000).slideUp();
              }
            }
          });
          // stop the form from submitting the normal way and refreshing the page
          event.preventDefault();
          });
          $("#submit").click(function(){
          if(!$("#email").val()){
            var warning = $("<div class='mt-2 alert alert-danger' role='alert'>e-mail field is empty</div>");
            $(this).after(warning);
            warning.slideUp(2000);
            return false;
          }
          if(!$("#password").val()){
            var warning = $("<div class='mt-2 alert alert-danger' role='alert'>password field is empty</div>");
            $(this).after(warning);
            warning.slideUp(2000);
            return false;
          }
          return true;
        });
      });
    </script>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" >
      <img class="mr-2" src="img/logo.png" width="40 px"  height="35 px"/>
      <a class="navbar-brand" href="#"><span style="color:#5f6bdd;">C</span>ode<span style="color:#5f6bdd;">G</span>uide</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="./aboutus.php">About us</a>
          </li>
          <li>
            <!-- search form for questions -->
            <form action="home.php" method="get">
              <div class="input-group ml-5 my-2 my-lg-0">
                <input class="form-control" type="search" placeholder="Search for questions" aria-label="Search" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary" type="button" id="button-addon2"><img src="img/search.png" width="20px"></button>
                </div>
              </div>
            </form>
          </li>
          <li class="nav-item dropdown ml-5 pl-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Filter posts by
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item"  href="#">C/C++</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item"  href="#">C#</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">java</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">python</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">HTML</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">CSS</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">javascript</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">jquery</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">php</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav mr-5 pr-5">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Create account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="signup.php">sign up</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" style="color:#f0bc06; font-weight:bold;" href="premiumaccount.php">Create premium account</a>
            </div>
          </li>
        </ul>
      </div>
    </nav><br><br><br>

    <div class="row">
      <div class="col-lg-8 col-sm-12">
        <div class="container">
          <!-- loop for posts -->
          <div class="card mb-3">
            <div class="card-header">
              <!-- username -->
              Omar alam
            </div>
            <div class="card-body">
              <!-- programming language -->
              <h5 class="card-title">java</h5>
              <!-- Question text -->
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <hr>
              <div class="row">
                <div class="col-lg-12">
                  <button type="button" class="btn btn-light btn-lg btn-block"><img src="img/answer.png" width="20px">  Answers</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end loop -->
        </div>
      </div>
      <div class="col-lg-4 col-sm-12">
        <div class="container">
          <div class="jumbotron">
            <img class="mr-2" src="img/logo.png" width="60 px"  height="50 px"/>
            <span style="font-size:35px; font-weight:bold;"><span style="color:#5f6bdd;">C</span>ode<span style="color:#5f6bdd;">G</span>uide</span>
            <!-- form for login -->
            <form id="login"action="" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary">log in</button><br>
              <small >Don't have account ?</small>
              <a  href="signup.php">sign up</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>
