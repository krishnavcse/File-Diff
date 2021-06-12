<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('index.css') }}">
    <title>File Diff Application</title>
  </head>
  <body>
    
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
       <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav">

            <a class="nav-link navlogo text-center" href="#">
              <img src="https://spaces-cdn.clipsafari.com/5jfz6nyjr8xpgm6ta0wbs89w24ei">
            </a>

          <li class="nav-item">
            <a class="nav-link sidefrst" href="#">
              <span class="textside">  Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link sidesecnd" href="#">
              <span class="textside">  V1</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link sidesthrd" href="#">
              <span class="textside">  V2</span>
            </a>
          </li>
        </ul>
        
        <ul class="navbar-nav2 ml-auto">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome Kalia</a>
              <ul class="dropdown-menu">
                  <li class="resflset"><a href="#"><i class="fa fa-fw fa-cog"></i> Edit profile</a></li>
                  <li class="divider"></li>
                  <li class="resflset"><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
              </ul>
          </li>
        </ul>
        
      </div>
    </nav>

    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">

        <!-- Icon Cards-->
          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4 rideone">
                      <img src="https://icon-library.net/images/file-system-icon/file-system-icon-25.jpg">
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8 fontsty">
                      <h5>V1 vs V2</h5>
                      <h4 id="v1vsv2" style="cursor: pointer;">{{ $missingFilesV1vsV2Count }}</h>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4 ridetwo">
                      <img src="https://icon-library.net/images/file-system-icon/file-system-icon-25.jpg">
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8 fontsty">
                      <h5>V2 vs  V1</h5>
                      <h4 id="v2vsv1" style="cursor: pointer;">{{ $missingFilesV2vsV1Count }}</h4>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-4 ridethree">
                      <img src="https://icon-library.net/images/file-system-icon/file-system-icon-25.jpg">
                  </div>
                  <div class="col-lg-8 col-md-8 col-sm-8 col-8 fontsty">
                      <h5>V1 vs V2 Content</h5>
                      <h4 id="dissimilarfilecontent" style="cursor: pointer;">{{ count($dissimilarFileContents) }} </h4>
                  </div>
                </div>
              </div>
          </div>

          @include('popups.filecount', ['missing_files' => $missingFilesV1vsV2, 'id' => 'modelv1vsv2', 'title' => 'V2 missing files list'])
          @include('popups.filecount', ['missing_files' => $missingFilesV2vsV1, 'id' => 'modelv2vsv1', 'title' => 'V1 missing files list'])
          @include('popups.filecontent', ['dissimilar_file_contents' => $dissimilarFileContents, 'id' => 'filecontent', 'title' => 'V1 Dissimilar File Contents'])

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>

  <script type="text/javascript">
    $( document ).ready(function() {
      $('#v1vsv2').on('click', function () 
      {
        $('#modelv1vsv2').modal('show');
      });

      $('#v2vsv1').on('click', function () 
      {
        $('#modelv2vsv1').modal('show');
      });

      $('#dissimilarfilecontent').on('click', function () 
      {
        $('#filecontent').modal('show');
      });
    });
  </script>
</html>
