
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    

    <link rel="stylesheet"  href="{{asset('style.css') }}">

    <title>Teacher Dashboard</title>
    <script>
    $(document).ready(function() {
        $("#datatable").dataTable();
    });
    </script>
</head>

<body>

    <div class="d-flex" id="wrapper">

        <!-- Sidebar starts here -->
        <div class="primary-bg" id="sidebar-wrapper">
            

                <div class="sidebar-heading text-center py-4 primary-text fs-4 fw bold text-uppercase border-bottom">
                    <!-- <i class="fas fa-user-secret me-2"></i> -->
                   <h1> <b>Anjana Little Friends</b></h1>
                </div>

                

                <div class="list-group list-group-flush my-3">

                    <a href="#" class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fa fa-calendar" aria-hidden="true"></i> Dashboard
                    </a>


                    <a href="{{route('t-teacher')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fa fa-users" aria-hidden="true"></i> Teacher
                    </a>

                    <a href="{{route('t-student')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fa fa-child" aria-hidden="true"></i> Student
                    </a>

                    <a href="{{route('uploadfile')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="bi bi-cloud-upload-fill" aria-hidden="true"></i> File Uploading
                    </a>

                </div>
            </div>
    
        <!--Sidebar ends here-->

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-trransparent py-4 px-4">

                <div class="d-flex align-items-center">

                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>

                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggle-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item-dropdown">

                            <a href="#" class="nav-link dropdown-toggle second-text fw-bold" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                <i class="fas fa-user me-2"></i>Teacher
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end me-4" style="top:70%" ;
                                aria-labelledby="navbarDropdown">

                                <li><a href="#" class="dropdown-item">Profile</a></li>
                                <li><a href="#" class="dropdown-item">Settings</a></li>
                                <li><a href="{{route('logout')}}" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

          

            <!-- <div class="container-fluid px-4">

                <div class="row g-3 my-2">

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color:#aee7b2;">

                            <div>
                                <p class="fs-5 primary-text">Admin</p>
                                <h3 class="fs-2 primary-text">1</h3>
                            </div>

                            <i class="fa fa-user-plus fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #aee7b2;">

                            <div>
                                <p class="fs-5 primary-text">Coordinators</p>
                                <h3 class="fs-2 primary-text">2</h3>
                            </div>

                            <i class="fa fa-user fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #aee7b2;">

                            <div>
                                <p class="fs-5 primary-text">Teachers</p>
                                <h3 class="fs-2 primary-text">2</h3>
                            </div>

                            <i class="fa fa-users fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>
                    

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color:  #aee7b2;">
                            </i>

                            <div>
                                <p class="fs-5 primary-text">Students</p>
                                <h3 class="fs-2 primary-text">2</h3>
                            </div>

                            <i class="fa fa-child fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
                
            </div>  -->

            <div class="container-fluid px-2">
                @yield('content')
            </div>

        </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        }
    </script>
</body>

</html>
