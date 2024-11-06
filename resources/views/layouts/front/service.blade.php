<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            @foreach($services as $item)
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <div class="rounded-circle overflow-hidden m-4">
                            <img class="img-fluid" src="{{$item->file_path}}" alt="">
                        </div>
                        <!-- <i class="fa fa-3x fa-user-tie text-primary mb-4"></i> -->
                        <h5>{{$item->header}}</h5>
                        <p>{{$item->text}}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>