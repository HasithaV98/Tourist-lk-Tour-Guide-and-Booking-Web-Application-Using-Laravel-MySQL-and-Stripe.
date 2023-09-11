<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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
                <form action="{{url('updatedpackage',$update->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table >
                        <tr>
                            <td>Location:</td>
                            <td><select name="city" id="" style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;">
                                <option value="{{$update->city}}">{{$update->city}}</option>
                                @foreach($destination as $destination)
                                <option value="{{$destination->city}}">{{$destination->city}}</option>
                                @endforeach
                                
                            </select></td>
                        </tr>
                        <br>
                        
                        <tr>
                            <td>Price:</td>
                            <td><input type="text" name="price" placeholder="Price"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;" value="{{$update->price}}"></td>
                        </tr>
                        <tr>
                            <td>Persons:</td>
                            <td><input type="number" name="person"placeholder="Persons"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;"  value="{{$update->person}}"></td>
                        </tr>
                        <tr>
                            <td>Days:</td>
                            <td><input type="number" name="day"placeholder="Days"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;"  value="{{$update->day}}"></td>
                        </tr>
                        <tr>
                            <td>Image:</td>
                            <td><img src="images_package/{{$update->image}}" alt="" height="200px" width="200px"></td>
                        </tr>
                        <tr>
                            <td>Update Image:</td>
                            <td><input type="file" name="image"placeholder="Days"style="border-radius:20px; width:300px;background-color:black; border:1px solid #14141f;" ></td>
                        </tr>
                        <tr><td></td>
                    <td><input type="submit" class="btn btn-danger" value="Update Details" style="margin-left:90px;background-color:#e3050c; border:none;"></td></tr>
                    </table>
                </form>
                
            </div>
            </div>
            

            


            
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