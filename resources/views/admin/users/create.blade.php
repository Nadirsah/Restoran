@extends('layouts.admin')
@section('title','İstifadəçi əlave et')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{route('admin.user.store')}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Ad</label>
                                    <input type="text" class="form-control " name="name" value="{{old('name')}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>E-poçt</label>
                                    <input type="email" class="form-control " name="email" value="{{old('email')}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('email'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Parol</label>
                                    <input type="text" class="form-control " name="password" value="{{old('password')}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('password'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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