@extends('layouts.admin')
@section('title','Mehsul elave et')
@section('theme_css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css"
    integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('theme_js')
@endsection
@section('content')
<div class="content">
    <!-- Basic tabs -->
    <form action="{{route('admin.translate.store')}}" method="POST" class="row" enctype="multipart/form-data">
        @csrf
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
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
                                            <textarea rows="5" cols="5" class="form-control "
                                                name="text[{{$lang->name}}]"
                                                placeholder="Default textarea">{{old('text.'.$lang->name)}}</textarea>
                                            <span
                                                class="text-danger">@error('text.'.$lang->name){{'Title sahəsi boş ola bilməz!'}}@enderror</span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

                    <div class="form-group">
                        <label>Group</label>
                        <input type="text" class="form-control " name="group" value="{{old('group')}}">
                        <span class="text-danger">@error('group'){{'Group sahəsi boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Key</label>
                        <input type="text" class="form-control" name="key" value="{{old('key')}}">
                        <span class="text-danger">@error('key'){{'Key sahəsi boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Göndər <i
                                class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /basic tabs -->

</div>
<script>
$('.summernote').summernote();
</script>
@endsection