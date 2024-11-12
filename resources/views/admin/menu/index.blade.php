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

            <h5 class="card-title"><a href="{{route('admin.menu.create')}}" class="btn btn-info"><i
                        class="icon-plus3 mr-3 icon-xl"></i> Menyu əlavə et</a></h5>

        </div>

        <table class="table table-hover border table-bordered" id="dataTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menyu</th>
                    <th>Yeməy</th>
                    <th>Təsvir</th>
                    <th>Şəkil</th>
                    <th>Qiymət</th>
                    <th>Daxil etmə tarixi</th>
                    <th>Düzəliş tarixi</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item as $items)
                <tr>
                    <td>{{$loop->iteration }}</td>
                    <td>{{$items->name}}</td>
                    <td>@if($items->parent )
                        {{$items->parent->name}}
                        @else
                        -----
                        @endif
                    </td>
                    <td>@if($items->description)
                        {{$items->description}}
                        @else
                        -----
                        @endif
                    </td>
                    <td>@if($items->picture)
                    <img width="50" src="{{$items->file_path}}" class="projects-image img-fluid" alt="">
                        @else
                        -----
                        @endif
                    </td>
                    <td>@if($items->price)
                        {{$items->price}}
                        @else
                        -----
                        @endif
                    </td>
                    <td>{{$items->created_at}}</td>
                    <td>{{$items->updated_at}}</td>
                    <td> <a href="{{route('admin.menu.edit',$items->id)}}"><i class="btn btn-info fa fa-edit"></i></a>
                        <a class="deleteRecord " data-id="{{ $items->id }}"><i class="btn btn-danger fa fa-trash"></i></a>
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
            url: "menu_delete/" + id,
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