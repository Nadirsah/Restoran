<div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            @foreach($about->pictures as $img)
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{$img->file_path}}">
                            </div>
                            @endforeach
                            
                           
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">{{__('navbar.about')}}</h5>
                        <h1 class="mb-4">{{__('word.welcme')}} <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                        <p class="mb-4">{{$about->text}}</p>
                       
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$about->experience}}</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">{{__('word.years')}}</p>
                                        <h6 class="text-uppercase mb-0">{{__('word.Experience')}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{$chefs_count}}</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">{{__('word.popular')}}</p>
                                        <h6 class="text-uppercase mb-0">{{__('word.chefs')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a> -->
                    </div>
                </div>
            </div>
        </div>