<div class="modal fade" id="Delete{{$insurance->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/Insurances_trans.delete')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('insurance.destroy','test')}}" method="post">
                    @method('DELETE')
                    @csrf
                    {{-- input hidden value => id   --}}
                    <input type="hidden" name="id" value="{{$insurance->id}}">
                    <div class="row">
                        <div class="col">
                            <p class="h5 text-danger">{{trans('Dashboard/Insurances_trans.warning')}} {{$insurance->name}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/Insurances_trans.close')}}</button>
                        <button class="btn btn-success">{{trans('Dashboard/Insurances_trans.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>