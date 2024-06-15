<!-- Modal -->
<div class="modal fade" id="update_status{{ $doctor->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard/doctors_trans.change_status') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_status') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                @csrf
                <input type="hidden" name="id" value="{{ $doctor->id }}">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">{{trans('Dashboard/doctors_trans.change_status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>-- {{trans('Dashboard/doctors_trans.select_status')}} --</option>
                            <option value="1">{{trans('Dashboard/doctors_trans.doctor_enable')}}</option>
                            <option value="0">{{trans('Dashboard/doctors_trans.doctor_not_enable')}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/doctors_trans.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/doctors_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>