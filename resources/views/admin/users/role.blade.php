@extends('layouts.admin')
@section('title','İstifadəçilər')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection
@section('theme_js')


<script src="{{asset('admin')}}\global_assets\js\plugins\forms\selects\select2.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\demo_pages\form_select2.js"></script>
@endsection


@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="thumbnail">
                <div class="thumb thumb-rounded">
                    <img src="{{asset('admin')}}\global_assets\images\demo\users\face1.jpg" alt="">
                    <div class="caption-overflow">
                    </div>
                </div>
                <div class="caption text-center">
                    <h6 class="text-semibold no-margin">{{$user->name}} <small class="display-block">{{$user->email}}</small></h6>
                    <ul class="icons-list mt-15">
                        @if($user->roles)
                        @foreach($user->roles as $user_roles) <li title="Ləğv et">
                            <form action="{{route('admin.users.roles.remove',[$user->id,$user_roles->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{$user_roles->name}}</button>
                            </form>
                        </li>
                        @endforeach
                        @endif

                    </ul>
                </div>
            </div>
        </div>
        <span>
            <form action="{{ route('admin.users.roles',$user->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <select class="select" name="role" id="">
                                @foreach($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </div>
            </form>
        </span>
    </div>

</div>

@endsection