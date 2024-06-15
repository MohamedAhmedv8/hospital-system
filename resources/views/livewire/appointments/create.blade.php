<div >
    @if ($message)
        <div class="alert alert-info">{{ trans('WebSite/create_appointment.message') }}</div>
    @endif
    @if ($message2)
    <div class="alert alert-info">{{ trans('WebSite/create_appointment.message2') }}</div>
    @endif
    @if ($message3)
    <div class="alert alert-info">{{ trans('WebSite/create_appointment.message3') }}</div>
    @endif
    <form wire:submit.prevent="store">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="text" name="username" wire:model="name" placeholder="{{ trans('WebSite/create_appointment.name') }}" required="">
                <span class="icon fa fa-user"></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <input type="email" name="email" wire:model="email" placeholder="{{ trans('WebSite/create_appointment.email') }}" required="">
                <span class="icon fa fa-envelope"></span>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{ trans('WebSite/create_appointment.section') }}</label>
                <select class="form-select" name="section" wire:model.live="section" id="exampleFormControlSelect1">
                    <option>-- {{ trans('WebSite/create_appointment.choose_from_list') }} --</option>
                    @foreach($sections as $section)
                        <option value="{{$section->id}}">{{$section->name}}</option>
                    @endforeach
                </select>
            </div>
                <div  class="col-lg-6 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{ trans('WebSite/create_appointment.doctor') }}</label>
                <select wire:model="doctor" name="doctor"  class="form-select" id="exampleFormControlSelect1">
                    @foreach($doctors as $doctor)
                        <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <input type="tel" name="phone" wire:model="phone" placeholder="{{ trans('WebSite/create_appointment.phone') }}" required>
                <span class="icon fas fa-phone"></span>
            </div>
            <div class="col-lg-12 col-md-6 col-sm-12 form-group">
                <label for="exampleFormControlSelect1">{{ trans('WebSite/create_appointment.date') }}</label>
                <input type="date" name="appointment_patient" wire:model="appointment_patient" class="form-control"required>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <textarea name="notes" wire:model="notes" placeholder="{{ trans('WebSite/create_appointment.notes') }}"></textarea>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                <button class="theme-btn btn-style-two" type="submit" name="submit-form">
                    <span class="txt">{{ trans('WebSite/create_appointment.submit') }}</span></button>
            </div>
        </div>
    </form>
</div>
