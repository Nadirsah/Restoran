@extends('layouts.admin')
@section('title','Mehsullar')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection
@section('theme_js')
<script src="{{asset('admin')}}\global_assets\js\plugins\tables\datatables\datatables.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\plugins\forms\selects\select2.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\demo_pages\datatables_advanced.js"></script>
<script src="{{asset('admin')}}\global_assets\js\plugins\forms\styling\switchery.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\plugins\forms\styling\switch.min.js"></script>
<script src="{{asset('admin')}}\global_assets\js\demo_pages\form_checkboxes_radios.js"></script>
@endsection


@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <div class="card">
        <table class="table datatable-show-all">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Favicon</th>
                    <th>Telefon 1</th>
                    <th>Telefon 2</th>
                    <th>Unvan</th>
                    <th>E-poçt</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img width="50" src="{{$data->logo_file_path}}"></td>
                    <td><img width="50" src="{{$data->favicon_file_path}}"></td>
                    <td>{{$data->phone_1}}</td>
                    <td>{{$data->phone_2}}</td>
                    <td>{{$data->adress}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        <div class="checkbox checkbox-switchery">
                            <label>
                                <input type="checkbox" name='activ' class="switchery" id="{{ $data->id }}"
                                    {{$data->activ==1 ? 'checked' :''}}>

                            </label>
                        </div>
                    </td>
                    <td> <a href="{{route('admin.setting.edit',$data->id)}}"><i class="btn btn-info fa fa-edit"></i></a>
                    
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.switchery').click(function() {
        var id = $(this).attr("id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
            }
        });
        $.ajax({
            url: "{{route('admin.isStatussite')}}",
            type: 'POST',
            data: {
                "id": id,
                is_active: $(this).is(':checked'),

            },
            success: function(data) {
                console.log('Status updated successfully');
            },
            error: function(error) {
                console.error('Error updating status:', error);
            }
        });
    });
});
</script>
@endsection