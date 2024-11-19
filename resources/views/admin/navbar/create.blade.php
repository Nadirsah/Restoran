@extends('layouts.admin')
@section('title','Məlumat əlave et')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{route('admin.navbar.store')}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">



                                <!--  -->
                                <ul class="nav nav-tabs">
                                    @foreach($langs as $key=>$lang)
                                    <li class="nav-item {{$key===0 ? 'active':''}}"> <a href="#{{$lang->name}}"
                                            class="nav-link rounded-top " data-toggle="tab">{{$lang->name}}</a></li>
                                    @endforeach
                                </ul>

                                <div class="tab-content">
                                    @foreach($langs as $key=>$lang)
                                    <div class="tab-pane fade{{$key===0?'show active':''}}" id="{{$lang->name}}">
                                        <div class="card">
                                            <div class="card-body">
                                                <fieldset class="content-group">
                                                <div class="form-group">
                                                        <label>Başlıq</label>
                                                        <input type="text" class="form-control " name="title[{{$lang->name}}]" value="{{old('title.'.$lang->name)}}"
                                                            placeholder="Yazin...">
                                                        <span
                                                            class="text-danger">@error('title'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Text</label>
                                                        <input type="text" class="form-control " name="text[{{$lang->name}}]" value="{{old('text.'.$lang->name)}}"
                                                            placeholder="Yazin...">
                                                        <span
                                                            class="text-danger">@error('text'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label>Fon rəsmi</label>
                                    <input type="file" class="form-control " name="background_image" value="{{old('background_image')}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('background_image'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>picture</label>
                                    <input type="file" class="form-control " name="image" value="{{old('image')}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('image'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Göndər<i
                    class="icon-arrow-right14 position-center"></i></button>
        </div>
    </form>
    <!-- /basic tabs -->
</div>
@endsection