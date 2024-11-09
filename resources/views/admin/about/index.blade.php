@extends('layouts.admin')
@section('title','Haqqımızda')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <div class="card">
        <div class="card-header header-elements-inline">

            <h5 class="card-title"><a href="{{route('admin.about.create')}}" class="btn btn-info"><i
                        class="icon-plus3 mr-3 icon-xl"></i> Məlumat əlavə et</a></h5>

        </div>

        <table class="table table-hover border table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Təcrübə müddəti</th>
                    <th>Mətin</th>
                    <th>Şəkil</th>
                    <th>Daxil etmə tarixi</th>
                    <th>Düzəliş tarixi</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $items)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$items->experience}}</td>
                    <td>{{$items->text}}</td>
                    <td><a type="button" class="btn bg-blue btn-block" data-toggle="modal"
                            data-target="#modal-login{{$items->id}}">Şəkil</a></td>
                    <td>{{$items->created_at}}</td>
                    <td>{{$items->updated_at}}</td>

                    <td> <a href="{{route('admin.about.edit',$items->id)}}"><i class="btn btn-info fa fa-edit"></i></a>
                        <a class="deleteRecord " data-id="{{ $items->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@foreach($data as $items)
<div id="modal-login{{$items->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items->pictures as $image)
                        <tr>
                            <td>
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                    </div>
                                    <div class="thumbnail">
                                        <div class="thumb">
                                            <img width="50" src="{{$image->file_path}}" alt="">
                                            <div class="caption-overflow">
                                                <span>
                                                    <a href="#" class="btn bg-warning-300 btn-icon deleteimg"
                                                        data-id="{{ $image->id }}"><i class="icon-link"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Resimleri Listeleme -->
            </div>
        </div>
    </div>
</div>
@endforeach

<script type="text/javascript">
    $(".deleteimg").click(function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var confirmDelete = confirm("Are you sure you want to delete this record?");
        if (!confirmDelete) {
            return false;
        }
        $.ajax({
            url: "delete_image/" + id,
            type: 'post',
            data: {
                "id": id,
                "_token": token,
            },
            success: function() {
                $('.modal').modal('hide');
                console.log("itcon Works");
                $(`.deleteRecord[data-id="${id}"]`).closest('tr').remove();
            }
        });

    });
</script>

<script>
    $(".deleteRecord").click(function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var confirmDelete = confirm("Silməyə əminsiniz?");
        if (!confirmDelete) {
            return false;
        }

        $.ajax({
            url: "about_delete/" + id,
            type: 'post',
            data: {
                "id": id,
                "_token": token,
            },
            success: function() {
                $(`.deleteRecord[data-id="${id}"]`).closest('tr').remove();
            }
        });

    });
</script>

@endsection