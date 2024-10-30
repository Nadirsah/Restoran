@if(session('message'))
<div class="alert alert-{{session('type')}} no-border">
    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
            class="sr-only">Bağla</span></button>{{session('message')}}
</div>
@endif