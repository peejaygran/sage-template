@php
$dt_buttons = 'frtip';
if (is_user_logged_in()) {
    $dt_buttons = 'Bfrtip';
}
@endphp

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <table id="per-tank" class="display" style="width:100%"></table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#per-tank').DataTable({
            ajax: home_url('api/index.php/_extras/get_fuel_per_tank'),
            order: [
                [7, 'desc']
            ],
            columnDefs: [{
                    title: "Country",
                    visible: true,
                    targets: 0
                },
                {
                    title: "2018",
                    visible: true,
                    targets: 1
                },
                {
                    title: "2019",
                    visible: true,
                    targets: 2
                },
                {
                    title: "2020",
                    visible: true,
                    targets: 3
                },
                {
                    title: "2021",
                    visible: true,
                    targets: 4
                },
                {
                    title: "2022",
                    visible: true,
                    targets: 5
                },
                {
                    title: "YoY % change",
                    visible: true,
                    targets: 6
                },
                {
                    title: "5 Year % change",
                    visible: true,
                    targets: 7
                },
                {
                    title: "YoY Change",
                    visible: true,
                    targets: 8
                },
                {
                    title: "5 Year Change",
                    visible: true,
                    targets: 9
                }
            ],
            columns: [{
                    data: 'Country'
                },
                {
                    data: '2018'
                },
                {
                    data: '2019'
                },
                {
                    data: '2020'
                },
                {
                    data: '2021'
                },
                {
                    data: '2022'
                },
                {
                    data: 'YoY % change'
                },
                {
                    data: '5 Year % change'
                },
                {
                    data: 'YoY Change'
                },
                {
                    data: '5 Year Change'
                }
            ],
            responsive: true,
            dom: '{{ $dt_buttons }}',
            buttons: ['colvis', 'pageLength']
        });
    });
</script>
