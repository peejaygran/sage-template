@php
$dt_buttons = 'frtip';
if (is_user_logged_in()) {
    $dt_buttons = 'Bfrtip';
}
@endphp

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <table id="petrol-cost-yoy" class="display" style="width:100%"></table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#petrol-cost-yoy').DataTable({
            ajax: home_url('api/index.php/_extras/get_petrol_cost_yoy'),
            order: [
                [6, 'desc']
            ],
            columnDefs: [{
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
                },
                {
                    title: "Price Increase by Litre",
                    visible: true,
                    targets: 4
                },
                {
                    title: "Price Increase by Gallon",
                    visible: true,
                    targets: 5
                },
                {
                    title: "Price Increase by Tank",
                    visible: true,
                    targets: 6
                }
            ],
            columns: [{
                    data: 'Country'
                },
                {
                    data: 'litre_price'
                },
                {
                    data: 'gallon_price'
                },
                {
                    data: 'tank_price'
                },
                {
                    data: 'litre_increase_price'
                },
                {
                    data: 'gallon_increase_price'
                },
                {
                    data: 'tank_increase_price'
                }
            ],
            responsive: true,
            buttons: ['colvis', 'pageLength'],
            dom: '{{ $dt_buttons }}',
        });
    });
</script>
