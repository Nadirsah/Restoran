<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
            <h1 class="mb-5">Most Popular Items</h1>
        </div>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                @foreach($menu as $item)
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 " data-bs-toggle="pill" href="#tab-{{$item->id}}">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <!-- <small class="text-body">Popular</small> -->
                            <h6 class="mt-n1 mb-0">{{$item->name}}</h6>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach($menu as $item)
                <div id="tab-{{$item->id}}" class="tab-pane fade {{$loop->first ? 'show active' : ''}} p-0">
                    <div class="row g-4">
                        @foreach($data as $items)
                        @if($items->parent_id == $item->id)
                        <div class="col-lg-6">
                            <div class="d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid rounded" src="{{$items->file_path}}" alt="" style="width: 80px;">
                                <div class="w-100 d-flex flex-column text-start ps-4">
                                    <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>{{$items->name}}</span>
                                        <span class="text-primary">{{$items->price}}</span>
                                    </h5>
                                    <small class="fst-italic">{{$items->description}}</small>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>