<div class="modal fade" id="delete{{ $laboratory_employee->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/laboratory_employee_trans.delete_data')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('laboratory_employee.destroy', $laboratory_employee->id) }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
            <div class="modal-body">
                <h5>{{trans('Dashboard/laboratory_employee_trans.warning')}} {{$laboratory_employee->name}}</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/laboratory_employee_trans.close')}}</button>
                <button type="submit" class="btn btn-danger">{{trans('Dashboard/laboratory_employee_trans.submit')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>