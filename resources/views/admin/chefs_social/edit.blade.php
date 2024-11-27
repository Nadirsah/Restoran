@extends('layouts.admin')
@section('title','Dil əlavə et')
@section('theme_css')
<link href="{{asset('admin')}}\global_assets\css\icons\fontawesome\styles.min.css" rel="stylesheet" type="text/css">
@endsection



@section('content')
<div class="content">
    @include('layouts.admin.alert')
    <form action="{{route('admin.lang.update',$data->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Dil</label>
                                    <input type="text" class="form-control " name="name" value="{{$data->name}}"
                                        placeholder="Yazin...">
                                    <span
                                        class="text-danger">@error('tags'){{'Bu sahəsi boş ola bilməz!'}}@enderror</span>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Göndər <i
                                            class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
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
            url: "role_delete/" + id,
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