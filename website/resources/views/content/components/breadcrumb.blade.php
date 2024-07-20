<nav class="uk-breadcrumb uk-margin-small-bottom">
    <ul class="uk-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li><span>{{ $breadcrumb['title'] }}</span></li>
            @else
                <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a></li>
            @endif
        @endforeach
    </ul>
</nav>
