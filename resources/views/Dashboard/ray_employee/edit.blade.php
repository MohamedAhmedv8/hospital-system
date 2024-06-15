<div class="modal fade" id="edit{{ $ray_employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/ray_employee_trans.edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ray_employee.update', $ray_employee->id) }}" method="post">
                {{ method_field('patch') }}{{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashboard/ray_employee_trans.name')}}</label>
                    <input type="text" value="{{$ray_employee->name}}" name="name" class="form-control"><br>
                    <label for="exampleInputPassword1">{{trans('Dashboard/ray_employee_trans.email')}}</label>
                    <input type="email" value="{{$ray_employee->email}}" name="email" class="form-control"><br>
                    <label for="exampleInputPassword1">{{trans('Dashboard/ray_employee_trans.password')}}</label>
                    <input type="password" name="password" class="form-control" autocomplete="new-password">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/ray_employee_trans.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/ray_employee_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>