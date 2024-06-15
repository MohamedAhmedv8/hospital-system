<!-- Modal -->
<div class="modal fade" id="edit{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard/sections_trans.edit_section') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('Sections.update','test') }}" method="post">
                {{ method_field('patch') }}
                {{ csrf_field() }}
                @csrf
                <label for="name">{{ trans('Dashboard/sections_trans.name_section') }}</label>
                <input type="hidden" name="id"value="{{ $section->id }}">
                <input class="form-control" type="text"name="name" value="{{ $section->name }}">

                <label for="description">{{ trans('Dashboard/sections_trans.description') }}</label>
                <textarea rows="5" cols="10" class="form-control" name="description">{{ $section->description }}</textarea>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('Dashboard/sections_trans.close') }}</button>
            <button type="submit" class="btn btn-primary">{{ trans('Dashboard/sections_trans.submit') }}</button>
        </div>
    </form>
        </div>
    </div>
</div>