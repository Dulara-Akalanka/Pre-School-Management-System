
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
    

    <link rel="stylesheet"  href="{{asset('style.css') }}">


    <title>Admin Dashboard</title>                           
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
                    <!-- <table>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </table> -->
                    <a href="{{route('welcome')}}" class="list-group-item list-group-item-action bg-transparent second-text active">
                        <i class="fa fa-calendar" aria-hidden="true"></i> Dashboard
                    </a>

                    
                    <a href="{{route('admin-view')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> Admin
                    </a>

                    <a href="{{route('c-coordinator')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fa fa-user" aria-hidden="true"></i> Coordinator
                    </a>

                    <a href="{{route('c-teacher')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fa fa-users" aria-hidden="true"></i> Teacher
                    </a>

                    <a href="{{route('c-student')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active">
                        <i class="fa fa-child" aria-hidden="true"></i> Student
                    </a>
                    
                    <a href="#collapsePayments" class="lnav-link collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold active" 
                        data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fab fa-cc-amazon-pay" aria-hidden="true"></i> Payments <i class="fas fa-angle-down"></i>
                    </a>

                    <!-- <div class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"> -->
                        <div class="collapse" id="collapsePayments">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link second-text fw-bold" href="{{ route('c-student-month-pay') }}"><span style="margin-top: -10px;">Monthly Payments</span></a>
                                 <a class="nav-link second-text fw-bold" href="{{ route('c-student-function-pay') }}">Function Payments</a>
                                <a class="nav-link second-text fw-bold" href="{{ route('c-student-other-pay') }}">Other Payments</a>
                            </nav>
                        </div>
                    <!-- </div> -->

                    <a href="#collapseReports" class="lnav-link collapsed list-group-item list-group-item-action bg-transparent second-text fw-bold active" 
                    data-bs-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-file" aria-hidden="true"></i> Reports <i class="fas fa-angle-down"></i>
                    </a>

                <div class="collapse" id="collapseReports">
                    <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link second-text fw-bold" href="#">Attendance Reports</a>
                    <a class="nav-link second-text fw-bold" href="#">Payment Reports</a>
                    </nav>
                </div>

                    
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

                                <i class="fas fa-user me-2"></i>Coordinator
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
