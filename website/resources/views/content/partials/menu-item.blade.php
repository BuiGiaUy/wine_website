<li class="{{ isset($menu->children) ? 'uk-parent' : '' }}">
    <a href="{{ $menu->url }}">
        {{ $menu->name }}
        @if (isset($menu->children))
            <span uk-icon="icon: triangle-down"></span>
        @endif
    </a>
    @if (isset($menu->children))
        <div class="uk-navbar-dropdown uk-width-auto" uk-drop="boundary: !.uk-navbar; stretch: x; flip: false">
            <div class="uk-drop-grid uk-child-width-1-4" uk-grid>
                @foreach ($menu->children as $child)
                    <div>
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            @if($child->url === null)
                                <li class="uk-nav-header">{{ $child->name }}</li>
                            @else
                                <li >
                                    <a href="{{ $child->url }}">
                                        {{ $child->name }}
                                    </a>
                                </li>
                            @endif
                            @if (isset($child->children) && !empty($child->children))
                                @foreach ($child->children as $subChild)
                                    @include('content.partials.menu-item', ['menu' => $subChild])
                                @endforeach
                            @endif
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</li>
