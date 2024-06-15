<!-- Modal -->
<div class="modal fade" id="delete{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/doctors_trans.delete_doctor') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('Doctors.destroy','test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                @csrf
                <input type="hidden" value="1" name="page_id">
                <h5>{{ trans('Dashboard/doctors_trans.warning_delete_doctor') }} {{ $doctor->name }}</h5>
                <input type="hidden" name="id"value="{{ $doctor->id }}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/doctors_trans.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ trans('Dashboard/doctors_trans.confirm_delete') }}</button>
        </div>
    </form>
        </div>
    </div>
</div>