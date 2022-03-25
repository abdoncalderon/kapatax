{{-- Success Messages --}}

@if ($message = Session::get('success'))
    <div class="message" >
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>	
            <strong>{{ $message }}</strong>
        </div>
    </div>
@endif

{{-- Error Messages --}}

@if(isset($errors) && $errors->any())
    <div class="message">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            @foreach ($errors->all() as $error )
                {{ $error }}
            @endforeach
        </div>
    </div>
@endif

