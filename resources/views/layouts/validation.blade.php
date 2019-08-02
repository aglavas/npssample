<div class="alert alert-danger">
    @if(is_array($error))
        @foreach($error as $singleError)
            <strong>{{ $errors->first($singleError) }}</strong><br>
        @endforeach
    @else
        <strong>{{ $errors->first($error) }}</strong>
    @endif
</div>
