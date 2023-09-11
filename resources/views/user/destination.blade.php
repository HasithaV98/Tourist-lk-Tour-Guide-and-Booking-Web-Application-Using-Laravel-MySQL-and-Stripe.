<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
            <h1 class="mb-5">Popular Destination</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-7 col-md-6">
                <div class="row g-3">
                    @foreach($data as $datas)
                    <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                        <a class="position-relative d-block overflow-hidden" href="{{$datas->location_url}}">
                            <img class="img-fluid" src="images_des/{{$datas->location_image}}" alt="" height="700px" width="700px">
                            <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{$datas->city}}</div>
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$datas->country}}</div>
                        </a>
                    </div>
                    @endforeach
                    <span style="padding-top:20px">
                    {!!$data->withQueryString()->links('pagination::bootstrap-5')!!}
                </div>
            </div>
        </div>
    </div>
</div>
