<div class="container-xxl pt-5 pb-3">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">{{__('word.team')}}</h5>
            <h1 class="mb-5">{{__('word.chefs')}}</h1>
        </div>
        <div class="row g-4">
            @foreach($chefs as $item)
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item text-center rounded overflow-hidden">
                    <div class="rounded-circle overflow-hidden m-4">
                        <img class="img-fluid" src="{{$item->file_path}}" alt="">
                    </div>
                    <h5 class="mb-0">{{$item->name}}</h5>
                    <small>{{$item->position}}</small>

                    <div class="d-flex justify-content-center mt-3">

                        @foreach($chefs_social as $social)
                        @if($item->id == $social->chefs_id)
                        <a class="btn btn-square btn-primary mx-1" href="{{$social->social_url}}"><i class="fa-brands fa-{{$social->name}}"></i></a>
                        @endif
                        @endforeach




                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>