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
    <form action="{{route('admin.translate.update',$data->id)}}" method="POST" class="row"
        enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        @foreach($translations as $lang => $translation)
                        <li class="nav-item {{$loop->first ? 'active' : ''}}">
                            <a href="#{{$lang}}" class="nav-link rounded-top " data-toggle="tab">
                                {{$lang}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($translations as $lang => $translation)
                        <div class="tab-pane fade{{$loop->first ? 'show active' : ''}}" id="{{$lang}}">
                            <div class="card">
                                <div class="card-body">
                                    <fieldset class="content-group">
                                        <div class="form-group">
                                            <textarea rows="5" cols="5" class="form-control" name="text[{{$lang}}]"
                                                placeholder="Default textarea">{{old('text.'.$lang, $translations[$lang])}}</textarea>
                                            <span
                                                class="text-danger">@error('text.'.$lang){{'Translation field cannot be empty!'}}@enderror</span>
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
                        <input type="text" class="form-control " name="group" value="{{$data->group}}">
                        <span class="text-danger">@error('group'){{'Group sahəsi boş ola bilməz!'}}@enderror</span>
                    </div>
                    <div class="form-group">
                        <label>Key</label>
                        <input type="text" class="form-control" name="key" value="{{$data->key}}">
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