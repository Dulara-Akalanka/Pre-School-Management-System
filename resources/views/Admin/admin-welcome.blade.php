@extends('Admin.admin-dashboard-layout')

@section('content')

<div class="container-fluid px-4">

                <div class="row g-3 my-2">

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color:#aee7b2;">

                            <div>
                                <p class="fs-5 primary-text">Admin</p>
                                <h3 class="fs-2 primary-text">{{$count1}}</h3>
                            </div>

                            <i class="fa fa-user-plus fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #aee7b2;">

                            <div>
                                <p class="fs-5 primary-text">Coordinators</p>
                                <h3 class="fs-2 primary-text">{{$count2}}</h3>
                            </div>

                            <i class="fa fa-user fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>

                    <div class="col-md-3">

                        <div class="p-3 shadow-sm d-flex justify-content-around align-items-center rounded" style="background-color: #aee7b2;">

                            <div>
                                <p class="fs-5 primary-text">Teachers</p>
                                <h3 class="fs-2 primary-text">{{$count3}}</h3>
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
                                <h3 class="fs-2 primary-text">{{$count4}}</h3>
                            </div>

                            <i class="fa fa-child fs-1 primary-text border rounded-full secondary-bg p-3"
                                aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
                
            </div> 
@endsection