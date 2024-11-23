@extends('layouts.admin')
@section('title','Məlumat əlave et')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <form action="{{route('admin.about.update',$data->id)}}" method="POST" class="row" enctype="multipart/form-data">
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
                                                        <label>Mətin</label>
                                                        <textarea rows="5" cols="5" class="form-control summernote"
                                                            name="text[{{$lang->name}}]"
                                                            placeholder="Default textarea">{{old('text.'.$lang->name,$data->getTranslation('text',$lang->name))}}</textarea>
                                                        <span
                                                            class="text-danger">@error('text.'.$lang->name){{'Bu sahəs boş ola bilməz!'}}@enderror</span>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!--  -->
                                <div class="form-group">
                                    <label>Təcrübə müdəti</label>
                                    <input type="number" class="form-control " name="experience" value="{{$data->experience}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('experience'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label>picture</label>
                                    <input type="file" class="form-control " name="picture[]" multiple value="{{old('picture')}}"
                                        placeholder="Yazin...">
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