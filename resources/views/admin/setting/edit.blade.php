@extends('layouts.admin')
@section('title','Tənzimləmələr')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{route('admin.setting.update',$data->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Logo</label>
                                        <input type="file" class="form-control " name="logo" value="{{old('logo')}}">
                                        <span
                                            class="text-danger">@error('logo'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                        <div>Logo: <img width="100" src="{{$data->logo_file_path}}"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Favicon</label>
                                        <input type="file" class="form-control " name="favicon"
                                            value="{{old('favicon')}}">
                                        <span
                                            class="text-danger">@error('favicon'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                        <div>Favicon: <img width=" 100" src="{{$data->favicon_file_path}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Telefon 1</label>
                                        <input type="text" class="form-control " name="phone_1"
                                            value="{{old('phone_1',$data->phone_1)}}" placeholder="Yazin...">
                                        <span
                                            class="text-danger">@error('phone_1'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Telefon 2</label>
                                        <input type="text" class="form-control " name="phone_2"
                                            value="{{old('phone_2',$data->phone_2)}}" placeholder="Yazin...">
                                        <span
                                            class="text-danger">@error('phone_2'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Ünvan</label>
                                        <input type="text" class="form-control " name="adress"
                                            value="{{old('adress',$data->adress)}}" placeholder="Yazin...">
                                        <span
                                            class="text-danger">@error('adress'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label>E-poçt</label>
                                        <input type="text" class="form-control " name="email"
                                            value="{{old('email',$data->email)}}" placeholder="Yazin...">
                                        <span
                                            class="text-danger">@error('email'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control " name="activ" value="{{$data->activ}}"
                                            placeholder="Yazin...">
                                        <span
                                            class="text-danger">@error('activ'){{'Bu sahə boşola bilməz!'}}@enderror</span>
                                    </div>
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
</div>
@endsection