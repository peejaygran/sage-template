@php
$dt_buttons = 'frtip';
if (is_user_logged_in()) {
    $dt_buttons = 'Bfrtip';
}
@endphp

@section('assets')
    @include('partials.imports.datatables')
@endsection

<div class="container">
    <div class="card">
        <div class="card-body">
            <table id="fuel-price" class="display" style="width:100%"> </table>
        </div>
    </div>
</div>

<script>
    $('#fuel-price').DataTable({
        ajax: home_url('api/index.php/_extras/get_petrol_cost'),
        order: [
            [4, 'desc']
        ],
        responsive: true,
        dom: '{{ $dt_buttons }}',
        buttons: ['colvis', 'pageLength'],
        columnDefs: [
            {
                title: "Country",
                visible: true,
                targets: 0
            },
            {
                title: "Per Tank (42L)",
                visible: true,
                targets: 1
            },
            {
                title: "Year-on-Year Change",
                visible: true,
                targets: 2
            },
            {
                title: "5-years Change",
                visible: true,
                targets: 3
            },
            {
                title: "YoY Relative Price Increase",
                visible: true,
                targets: 4
            },
            {
                title: "5-year Relative Price Increase",
                visible: true,
                targets: 5
            }
        ],
        columns: [
            {
                data: 'Country'
            },
            {
                data: 'per_tank'
            },
            {
                data: 'yoy_change'
            },
            {
                data: 'year_change'
            },
            {
                data: 'yoy_percentage'
            },
            {
                data: 'year_percentage'
            }
        ],
    });
</script>
