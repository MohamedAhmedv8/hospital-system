<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/ray_employee_trans.new_employee')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('ray_employee.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <label for="exampleInputPassword1">{{trans('Dashboard/ray_employee_trans.name')}}</label>
                    <input type="text" name="name" class="form-control"><br>
                    <label for="exampleInputPassword1">{{trans('Dashboard/ray_employee_trans.email')}}</label>
                    <input type="email" name="email" class="form-control"><br>
                    <label for="exampleInputPassword1">{{trans('Dashboard/ray_employee_trans.password')}}</label>
                    <input type="password" name="password" class="form-control"><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/ray_employee_trans.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/ray_employee_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>