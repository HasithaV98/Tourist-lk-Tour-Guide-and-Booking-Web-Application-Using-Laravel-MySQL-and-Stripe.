<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.css')
    <style>
        .h2{
            text-align:center;
        }
        .table{
            text-align:center; 
        }
        .table-td{
            text-align:start;
        }

    </style>
</head>

<body>
    <!-- Spinner Start -->
    @include('user.spinner')
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('user.topbar')
    <!-- Topbar End -->


    <h2 class="h2">My Bookings</h2>
    <table class="table">
        <tr>
            <th>Destination</th>
            <th>Price</th>
            <th>Days</th>
            <th>Persons</th>
            <th>Check Out</th>
            <th>Cancellation</th>


        </tr>
        @foreach($booking as $booking)
        <tr>
            <td class="table-td">{{$booking->destination}}</td>
            <td>{{$booking->price}}</td>
            <td>{{$booking->day}}</td>
            <td>{{$booking->person}}</td>
            <td><a href="{{url('checkout',$booking->price)}}" class="btn btn-success">Check Out</a></td>
            <td><a href="{{url('booking_cancel',$booking->id)}}" class="btn btn-warning" style="color:white;" onclick="return confirm('Do you want cancel this booking?')">Cancel</a></td>
        </tr>
        @endforeach
    </table>


    

   
        

    <!-- Footer Start -->
    @include('user.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('user.script')
</body>

</html>