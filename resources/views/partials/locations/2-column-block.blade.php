@php
$included = get_field('service_inclusion_columns');
@endphp
@if ($included['includes'])
    <div class="container-fluid mb-140 p-4" style="background: #FFFCF7;">
        <div class="container">

            <h2 class="text-center mb-5">{{ $included['header'] }}</h2>

            @foreach ($included['includes'] as $item)
                <div class="row mb-5">

                    <div class="col-6">
                        <h3>{{ $item['title'] }}</h3>
                    </div>

                    <div class="col-6">
                        <p>
                            {{ $item['description'] }}
                        </p>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endif
