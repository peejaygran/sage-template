@php
$dt_buttons = 'frtip';
if (is_user_logged_in()) {
    $dt_buttons = 'Bfrtip';
}
@endphp

{{-- @section('assets')
    @include('partials.imports.datatables')
@endsection --}}

<div class="container">
    <div class="card">
        <div class="card-body">
            <table id="gas-price" class="display" style="width:100%"></table>
        </div>
    </div>
</div>

<script>
    $('#gas-price').DataTable({
        ajax: home_url('api/index.php/_extras/get_highest_fuel_cost'),
        order: [
                [3, 'desc']
            ],
        columnDefs: [
            {
                title: "Country",
                visible: true,
                targets: 0
            },
            {
                title: "Price by Litre",
                visible: true,
                targets: 1
            },
            {
                title: "Price by Gallon",
                visible: true,
                targets: 2
            },
            {
                title: "Price by Tank",
                visible: true,
                targets: 3
            }
        ],
        columns: [
            {
                data: 'Country'
            },
            {
                data: 'litre'
            },
            {
                data: 'gallon'
            },
            {
                data: 'tank'
            }
        ],
        responsive: true,
        dom: '{{ $dt_buttons }}',
        buttons: ['colvis', 'pageLength']
    });
</script>
