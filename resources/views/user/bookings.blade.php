<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.css')
</head>

<body>
    <!-- Spinner Start -->
    @include('user.spinner')
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('user.topbar')
    <!-- Topbar End -->


    <!-- Navbar & Hero Start -->
    @include('user.navbar')
    <!-- Navbar & Hero End -->

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="booking p-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-6 text-white">
                        <h6 class="text-white text-uppercase">Booking</h6>
                        <h1 class="text-white mb-4">Online Booking</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-outline-light py-3 px-5 mt-2" href="{{url('my_bookings')}}">My Bookings</a>
                    </div>
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">Book A Tour</h1>
                        @foreach($data as $datas)
                        <form action="{{url('customized_booking',$datas->id)}}" method="POST">
                        @endforeach  
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-transparent" id="name" name="name" placeholder="Your Name">
                                        <label for="name">Your Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-transparent" id="email" name="email" placeholder="Your Email">
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="text" class="form-control bg-transparent datetimepicker-input" id="datetime" name="datetime" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                        <label for="datetime">Date & Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select bg-transparent" id="destination" name="destination">
                                            <option value="1">--Select--</option>
                                            @foreach($data as $data)
                                            <option value="{{$data->city}}">{{$data->city}} </option>
                                            @endforeach
                                        </select>
                                        <label for="select1">Destination</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-transparent" id="day" placeholder="Days" name="day">
                                        <label for="email">Days</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-transparent" id="person" placeholder="Persons" name="person">
                                        <label for="email">Persons</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control bg-transparent" id="price" placeholder="Price" disabled style="color:red;" name="price">
                                        <label for="price">Price</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-transparent" placeholder="Special Request" id="request" style="height: 100px" name="request"></textarea>
                                        <label for="message">Special Request</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-outline-light w-100 py-3" type="submit">Book Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   


    

    
    
    
    <!-- Footer Start -->
    @include('user.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('user.script')
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Default price
        let defaultPrice = 100;
        
        // Get the input elements
        let dayInput = document.getElementById("day");
        let personInput = document.getElementById("person");
        let priceInput = document.getElementById("price");

        // Function to update the price
        function updatePrice() {
            let days = parseInt(dayInput.value) || 0;
            let persons = parseInt(personInput.value) || 0;
            
            // Calculate the total price
            let totalPrice = defaultPrice + (days * 100) + (persons * 100);
            
            // Update the price input field
            priceInput.value = totalPrice;
        }

        // Add event listeners to the day and person inputs
        dayInput.addEventListener("input", updatePrice);
        personInput.addEventListener("input", updatePrice);

        // Initialize the price
        updatePrice();
    });
</script>

</body>

</html>