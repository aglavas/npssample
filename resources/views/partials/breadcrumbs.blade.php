@if (count($breadcrumbs))

    {{--<div style="display: inline">--}}
    {{--@foreach ($breadcrumbs as $breadcrumb)--}}

        {{--@if ($breadcrumb->url && !$loop->last)--}}
            {{--<a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> >--}}
        {{--@else--}}
            {{--{{ $breadcrumb->title }}--}}
        {{--@endif--}}

    {{--@endforeach--}}
    {{--</div>--}}

    <ol class="breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                {{--<li class="breadcrumb-item breadcrumb-list"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>--}}
            @else
                <li>{{ $breadcrumb->title }}</li>
            @endif

        @endforeach
    </ol>

@endif
