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


    <!-- About Start -->
    @include('user.about')
    <!-- About End -->


    <!-- Service Start -->
    
    <!-- Service End -->
    @include('user.service')

    <!-- Destination Start -->
    
    <!-- Destination Start -->
    @include('user.destination')

    <!-- Package Start -->
    
    <!-- Package End -->
    @include('user.package')

    


    <!-- Process Start -->
    @include('user.process')
    <!-- Process Start -->


    <!-- Team Start -->
    @include('user.team')
    <!-- Team End -->


    <!-- Testimonial Start -->
    @include('user.testimonial')
    <!-- Testimonial End -->
        

    <!-- Footer Start -->
    @include('user.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    @include('user.script')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
</body>

</html>