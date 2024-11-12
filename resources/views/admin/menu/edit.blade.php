@extends('layouts.admin')
@section('title','Məlumat əlave et')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{route('admin.menu.update',$data->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @method("PUT")
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
                                                        <label>Title</label>
                                                        <input class="form-control" name="name[{{$lang->name}}]" value="{{old('name.'.$lang->name,$data->getTranslation('name',$lang->name))}}" placeholder="Title">
                                                        <span class="text-danger">@error('name.'.$lang->name){{'Title sahəsi boş ola bilməz!'}}@enderror</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Təsvir</label>
                                                        <input class="form-control" name="description[{{$lang->name}}]" value="{{old('description.'.$lang->name,$data->getTranslation('description',$lang->name))}}" placeholder="Təsvir">
                                                        <span class="text-danger">@error('description.'.$lang->name){{'Təsvir sahəsi boş ola bilməz!'}}@enderror</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Menyu</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Menyu secin</option>
                                        @foreach($menu as $item)
                                        <option @if($data->parent_id==$item->id) selected @endif value="{{$item->id}}" >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">@error('subcategory'){{'Categoriya sahəsi boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>Qiymət</label>
                                    <input type="number" class="form-control " name="price" value="{{$data->price}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('price'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>picture</label>
                                    <input type="file" class="form-control " name="picture" value="{{old('picture')}}">
                                    <span
                                        class="text-danger">@error('picture'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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