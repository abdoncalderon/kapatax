{{-- Success Messages --}}

@if ($message = Session::get('success'))
    <div class="message">
        <div class="alert alert-success alert-dismissible" style="margin: 1em">
            <button type="button" class="close" data-dismiss="alert">&times;</button>	
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif

{{-- Error Messages --}}

@if($errors->any())
    <div class="message">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $errors->first() }}
        </div>
    </div>
@endif

