<div class="modal fade" id="delete{{$ambulance->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/ambulances_trans.delete_data') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('ambulances.destroy','test')}}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{$ambulance->id}}">
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger">{{ trans('Dashboard/ambulances_trans.warning') }}</p>
                            <input type="text" class="form-control" readonly value="{{$ambulance->car_number}}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/ambulances_trans.close') }}</button>
                        <button class="btn btn-success">{{ trans('Dashboard/ambulances_trans.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>