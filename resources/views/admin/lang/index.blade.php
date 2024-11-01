@extends('layouts.admin')
@section('title','Dil əlavə et')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><a href="{{route('admin.lang.create')}}" class="btn btn-info"><i
                        class="icon-plus3 mr-3 icon-xl"></i>Dil əlave et</a></h5>
        </div>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Dil</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($langs as $lang)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$lang->name}}</td>
                    <td> <a href="{{route('admin.lang.edit',$lang->id)}}"><i class="btn btn-info fa fa-edit"></i></a>
                        <a class="deleteRecord" data-id="{{ $lang->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<script>
    $(".deleteRecord").click(function() {
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var confirmDelete = confirm("Silməyə əminsiniz?");
        if (!confirmDelete) {
            return false;
        }

        $.ajax({
            url: "delete_lang/" + id,
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