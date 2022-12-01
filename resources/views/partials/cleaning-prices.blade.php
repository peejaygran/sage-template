<style>
    .cleaning-prices-table tr td:nth-child(1) {
        text-align: left;
        vertical-align: middle;
    }

    .cleaning-prices a {
        border: 1px solid #f2f2f2 !important;
        padding: 20px;
    }

</style>

@php
$service_pricelist = get_field('service_prices');
@endphp

<div class="container cleaning-prices py-4">
    <div class="row px-1">
        <div class="col-sm-4">
            <div class="nav flex-column nav-tabs" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">

                @foreach ($service_pricelist['pricelist'] as $list)

                    <a class="nav-link text-dark">
                        <div class="row align-items-center">
                            <div class="col-2">
                                {!! $list['icon'] !!}
                            </div>
                            <div class="col-10">
                                <p class="m-0">{{ $list['service_name'] }}</p>
                                <p class="text-primary m-0">Price from {{ $list['price'] }}</p>
                            </div>
                        </div>
                    </a>

                @endforeach

            </div>
        </div>

        <div class="col-sm-8">

            <h2 class="text-center">
                {{ $service_pricelist['header'] }}
            </h2>
            <p>
                {{ $service_pricelist['description'] }}
            </p>


            <table class="cleaning-prices-table table table-bordered table-striped">
                <tbody class="text-center">
                    <tr class="bg-primary text-light">
                        <th>Property Type</th>
                        <th>Bond Cleaning</th>
                        <th>Bond Cleaning + Carpet Cleaning</th>
                    </tr>
                    <tr>
                        <td>Prices</td>
                        <td>
                            <p class="text-danger m-0">Fantastic Club</p>
                            <p class="m-0">Standard</p>
                        </td>
                        <td>
                            <p class="text-danger m-0">Fantastic Club</p>
                            <p class="m-0">Standard</p>
                        </td>
                    </tr>
                    <tr>
                        <td>Studio flat</td>
                        <td>
                            <p class="text-danger m-0">$180</p>
                            <p class="m-0">$240</p>
                        </td>
                        <td>
                            <p class="text-danger m-0">$215</p>
                            <p class="m-0">$275</p>
                        </td>
                    </tr>
                    <tr>
                        <td>1 Bedroom</td>
                        <td>
                            <p class="text-danger m-0">$209</p>
                            <p class="m-0">$269</p>
                        </td>
                        <td>
                            <p class="text-danger m-0">$294</p>
                            <p class="m-0">$354</p>
                        </td>
                    </tr>
                    <tr>
                        <td>2 Bedrooms</td>
                        <td>
                            <p class="text-danger m-0">$225</p>
                            <p class="m-0">$285</p>
                        </td>
                        <td>
                            <p class="text-danger m-0">$340</p>
                            <p class="m-0">$400</p>
                        </td>
                    </tr>
                    <tr>
                        <td>3 Bedrooms</td>
                        <td>
                            <p class="text-danger m-0">$315</p>
                            <p class="m-0">$375</p>
                        </td>
                        <td>
                            <p class="text-danger m-0">$460</p>
                            <p class="m-0">$520</p>
                        </td>
                    </tr>
                    <tr>
                        <td>4 Bedrooms</td>
                        <td>
                            <p class="text-danger m-0">$435</p>
                            <p class="m-0">$495</p>
                        </td>
                        <td>
                            <p class="text-danger m-0">$635</p>
                            <p class="m-0">$695</p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
