@if (count($breadcrumbs))
    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item breadcrumb-list"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title}} &nbsp;</a></li>
            @elseif ($breadcrumb->url && $loop->first)
                <li> {{$breadcrumb->title }}</li>
            @else
                <li> {{' > ' . $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
@endif
