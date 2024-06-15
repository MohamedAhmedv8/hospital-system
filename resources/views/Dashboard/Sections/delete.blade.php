<div class="modal fade" id="delete{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/sections_trans.delete_section') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('Sections.destroy','test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                @csrf
                <h5>{{ trans('Dashboard/sections_trans.warning') }} {{ $section->name }}</h5>
                
                <input type="hidden" name="id"value="{{ $section->id }}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/sections_trans.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ trans('Dashboard/sections_trans.submit') }}</button>
        </div>
    </form>
        </div>
    </div>
</div>