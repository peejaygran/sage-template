@php
$services_tables = get_field('service_table');
@endphp

@if ($services_tables)
    @foreach ($services_tables as $service_tables)
        <div service-table-key="service_{{ $service_tables['service'][0] }}" class="container tables mb-140">

            @foreach ($service_tables['tables'] as $table)
                <div class="container areas-table">

                    <h3 class="text-center pb-4">{!! $table['table_name'] !!}</h3>

                    <div class="row px-1">
                        <table class="table table-bordered">
                            <tbody class="text-center">
                                <tr>
                                    <th class="p-md-4_5"></th>
                                    <th class="p-md-4_5">Once off / Regular Cleans</th>
                                    <th class="p-md-4_5">End of lease / Move In</th>
                                </tr>
                                @foreach ($table['table_contents'] as $table_content)
                                    <tr>
                                        <th class="p-md-5">{!! $table_content['service_offered'] !!}</th>
                                        <td class="p-md-5">{!! $table_content['once_off_regular_cleans'] !!}</td>
                                        <td class="p-md-5">{!! $table_content['end_of_lease_move_in'] !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            @endforeach

        </div>
    @endforeach
@endif

<div class="no-pricing-table d-none">
    <h2 class="text-center">Pricing Guide coming soon</h2>
</div>
