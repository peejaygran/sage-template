<div class="d-none d-md-flex col-12 row">
    @foreach ($primaryNav as $key => $_menu_item)
        @if (!isset($_menu_item->menu_item_children) && !$_menu_item->menu_item_parent)
            <li class="">
                <a class="" href="{{ $_menu_item->url ?: get_permalink($_menu_item->ID) }}">
                    {{ $_menu_item->title ? $_menu_item->title : $_menu_item->post_title }}
                </a>
            </li>
        @endif

        @if (isset($_menu_item->menu_item_children))
            <ul class="col-6 col-lg-3">
                @if (!$_menu_item->menu_item_parent)
                    @isset($_menu_item->menu_item_children)
                        <a class="" href="{{ $_menu_item->url ?: get_permalink($_menu_item->ID) }}">
                            <h5> {{ $_menu_item->title ? $_menu_item->title : $_menu_item->post_title }}
                            </h5>
                        </a>

                        @foreach ($_menu_item->menu_item_children as $_item)
                            <li>
                                <a class="" href="{{ $_item->url ?: get_permalink($_item->ID) }}">
                                    {!! $_item->title ? $_item->title : $_item->post_title !!}
                                </a>
                            </li>
                        @endforeach
                    @endisset
                @endif
            </ul>
        @endif
    @endforeach
</div>

<div class="d-md-none col-12 row">
    <div class="col-6">

        @foreach ($primaryNav as $key => $_menu_item)
            @if (!isset($_menu_item->menu_item_children) && !$_menu_item->menu_item_parent)
                <li class="">
                    <a class="" href="{{ $_menu_item->url ?: get_permalink($_menu_item->ID) }}">
                        {{ $_menu_item->title ? $_menu_item->title : $_menu_item->post_title }}
                    </a>
                </li>
            @endif
            @if (isset($_menu_item->menu_item_children))
                @if (strtolower($_menu_item->post_title) == 'our services')
                    @if (!$_menu_item->menu_item_parent)
                        @isset($_menu_item->menu_item_children)
                            <h5>{{ $_menu_item->post_title }}</h5>

                            @foreach ($_menu_item->menu_item_children as $_item)
                                <li>
                                    {{-- <h1>skjdfskdjfnskd</h1> --}}
                                    <a class="" href="{{ $_item->url ?: get_permalink($_item->ID) }}">
                                        {!! $_item->title ? $_item->title : $_item->post_title !!}
                                    </a>
                                </li>
                            @endforeach
                        @endisset
                    @endif
                @endif
            @endif
        @endforeach
    </div>

    <div class="col-6">
        @php $row_count = 0; @endphp
        @foreach ($primaryNav as $key => $_menu_item)
            @if (!isset($_menu_item->menu_item_children) && !$_menu_item->menu_item_parent)
                <li class="">
                    <a class="" href="{{ $_menu_item->url ?: get_permalink($_menu_item->ID) }}">
                        {{ $_menu_item->title ? $_menu_item->title : $_menu_item->post_title }}
                    </a>
                </li>
            @endif
            @if (isset($_menu_item->menu_item_children))
                @if (strtolower($_menu_item->post_title) != 'our services')
                    @if (!$_menu_item->menu_item_parent)
                        @isset($_menu_item->menu_item_children)
                            <h5 class="{{ $row_count ? 'mt-5 mt-md-0' : '' }}">{{ $_menu_item->post_title }}</h5>

                            @foreach ($_menu_item->menu_item_children as $_item)
                                <li>
                                    <a class="" href="{{ $_item->url ?: get_permalink($_item->ID) }}">
                                        {!! $_item->title ? $_item->title : $_item->post_title !!}
                                    </a>
                                </li>
                            @endforeach
                        @endisset
                    @endif
                @endif
            @endif
            @php $row_count++; @endphp
        @endforeach
    </div>
</div>
