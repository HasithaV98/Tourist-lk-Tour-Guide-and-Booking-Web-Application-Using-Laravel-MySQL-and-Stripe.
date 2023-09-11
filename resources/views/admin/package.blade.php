<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/css/style.css" rel="stylesheet">
    <style>
        .table-style{
            align:center;
            padding-left:300px;
            padding-top:60px;
            
        }
        td{
            border-radius:10px;
        }
        .table-responsive{
            width:100%;
            margin-right:100px;
        }
        .input{
            font-color:white;
            
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        @include('admin.spinner')
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.sidebar')
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            @include('admin.navbar')
            <!-- Navbar End -->

            <div class="table-style">
                <form action="{{url('addpackage')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table >
                        <tr>
                            <td>Location:</td>
                            <td><select name="city" id="" style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;">
                                <option value="">--Location--</option>
                                @foreach($data as $data)
                                <option value="{{$data->city}}">{{$data->city}}</option>
                                @endforeach
                                
                            </select></td>
                        </tr>
                        <br>
                        
                        <tr>
                            <td>Price:</td>
                            <td><input type="text" name="price" placeholder="Price"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;"></td>
                        </tr>
                        <tr>
                            <td>Persons:</td>
                            <td><input type="number" name="person"placeholder="Persons"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;"></td>
                        </tr>
                        <tr>
                            <td>Days:</td>
                            <td><input type="number" name="day"placeholder="Days"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;"></td>
                        </tr>
                        <tr>
                            <td>Image:</td>
                            <td><input type="file" name="image"placeholder="Days"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;"></td>
                        </tr>
                        <tr><td></td>
                    <td><input type="submit" class="btn btn-danger" value="Submit Details" style="margin-left:90px;background-color:#e3050c; border:none;"></td></tr>
                    </table>
                </form>
                <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4" style="width: 1000px; margin-left:-300px; " align="start">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Packages</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    
                                    <th scope="col">Location</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Persons</th>
                                    <th scope="col">Days</th>
                                    <th scope="col">Location Image</th>
                                    <th scope="col">Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($package as $package)
                                <tr>
                                    
                                    <td>{{$package->city}}</td>
                                    <td>{{$package->price}}</td>
                                    <td>{{$package->day}}</td>
                                    <td>{{$package->person}}</td>
                                    <td align="center"><img src="images_package/{{$package->image}}" alt="" style="height:100px;width:100px;"></td>
                                    <td align="center"><a href="{{url('updatepackage',$package->id)}}" class="btn btn-success">Update</a><a href="{{url('deletepackage',$package->id)}}"class="btn btn-danger" style="margin-left:10px;" onclick="return confirm('Do you want delete this?')">Delete</a></td>
                                </tr>
                               @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
            

            


            <!-- Footer Start -->
            @include('admin.footer')
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin/lib/chart/chart.min.js"></script>
    <script src="admin/lib/easing/easing.min.js"></script>
    <script src="admin/lib/waypoints/waypoints.min.js"></script>
    <script src="admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="admin/js/main.js"></script>
</body>

</html>