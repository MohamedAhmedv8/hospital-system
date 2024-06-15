<!-- Modal -->
<div class="modal fade" id="edit{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{trans('Dashboard/single_service_trans.edit_service')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('Services.update', 'test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <div class="modal-body">
                    <label for="name">{{trans('Dashboard/single_service_trans.name_service')}}</label>
                    <input type="text" name="name" id="name" value="{{$service->name}}" class="form-control"><br>
                    <input type="hidden" name="id" value="{{$service->id}}" class="form-control"><br>
                    <label for="price">{{trans('Dashboard/single_service_trans.price')}}</label>
                    <input type="number" name="price" id="price" value="{{$service->price}}" class="form-control"><br>
                    <label for="description">{{trans('Dashboard/single_service_trans.descripton')}}</label>
                    <textarea class="form-control" name="description" id="description" rows="5">{{$service->description}}</textarea>
                    <div class="form-group">
                        <label for="status">{{trans('Dashboard/single_service_trans.status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="{{$service->status}}" selected>{{$service->status == 1 ? trans('Dashboard/single_service_trans.enabled'):trans('Dashboard/single_service_trans.not_enabled')}}</option>
                            <option value="1">{{trans('Dashboard/single_service_trans.enabled')}}</option>
                            <option value="0">{{trans('Dashboard/single_service_trans.not_enabled')}}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('Dashboard/single_service_trans.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/single_service_trans.submit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>