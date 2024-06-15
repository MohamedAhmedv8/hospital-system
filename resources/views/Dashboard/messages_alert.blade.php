@if(count($errors)> 0)
<div class="alert alert-danger">
<button aria-label="Close" class="close" data-dismiss="alert" type="button">
<span aria-hidden="true">*</span>
</button>
<storng>خطأ</storng>
<ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
</div>
@endif

@if(session()->has('add'))
    <script>
        window.onload = function(){
            notif({
                msg: "{{ trans('Dashboard/messages_trans.add') }}",
                type: "success"
            })
        }
    </script>
@endif

@if(session()->has('edit'))
    <script>
        window.onload = function(){
            notif({
                msg: "{{ trans('Dashboard/messages_trans.edit') }}",
                type: "success"
            })
        }
    </script>
@endif

@if(session()->has('delete'))
    <script>
        window.onload = function(){
            notif({
                msg: "{{ trans('Dashboard/messages_trans.delete') }}",
                type: "success"
            })
        }
    </script>
@endif