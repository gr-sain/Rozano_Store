<section class="breadcrumb">
    <ul class="breadcrumb__list flex container">

        <li>
            <a href="{{ url('/') }}" class="breadcrumb__link">Home</a>
        </li>

        @foreach($items as $item)
            <li><span class="breadcrumb__link">></span></li>

            @if(isset($item['url']))
                <li>
                    <a href="{{ $item['url'] }}" class="breadcrumb__link">
                        {{ $item['label'] }}
                    </a>
                </li>
            @else
                <li>
                    <span class="breadcrumb__link">
                        {{ $item['label'] }}
                    </span>
                </li>
            @endif
        @endforeach

    </ul>
</section>
