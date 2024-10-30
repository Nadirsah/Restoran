@extends('layouts.admin')
@section('title','Düzəliş et')
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <!-- Basic tabs -->
    <div id="messageDiv"></div>
    <form action="{{route('admin.role.update',$role->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>Ad</label>
                                    <input type="text" class="form-control " name="name" value="{{$role->name}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('name'){{'Bu sahə boş ola bilməz!'}}@enderror</span>
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

    <hr>
   

    <div>
        <h5 class="text-center">İmtiyaz icazələri</h5>
        <div class="row">
            @foreach($role->permissions as $role_permission)
            <div class="permission col-lg-3 col-sm-6">
                <div class="thumbnail">
                    <div class="thumb">
                        <form id="revoke-permission-form" action="{{route('admin.roles.permission.revoke',[$role->id,$role_permission->id])}}" method="post" onsubmit="return confirm('Emisnisniz?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger ">{{$role_permission->name}}</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-flat">

                <div class="panel-body">
                    <h6 class="panel-title text-center">İcazələr</h6>
                    <hr>
                    <form action="{{ route('admin.roles.permissions',$role->id) }}" method="POST">
                        @csrf

                        <div class="row">
                            @foreach ($permissions as $value)
                            <div class="col-md-3 ">
                                <div class="form-group text-success">
                                    <label>
                                        <input type="checkbox" @if (in_array($value->name, $rolePermissions)) checked @endif name="permission[]"
                                        value="{{$value->name}}" class="text-danger">
                                        {{ $value->name }}</label>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Assign</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('#revoke-permission-form').on('submit', function(event) {
            event.preventDefault(); 
            var token = $("meta[name='csrf-token']").attr("content");
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var data = form.serialize();

            

            $.ajax({
                url: url,
                type: method,
                data: data,token, 
                success: function() {
                    form.closest('.permission').remove();
                },
                error: function(xhr) {
                    alert('Bir xəta baş verdi: ' + xhr.responseText);
                }
            });
        });
    });
</script>

@endsection