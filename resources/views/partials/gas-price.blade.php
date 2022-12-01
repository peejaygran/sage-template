@section('assets')
    @include('partials.imports.datatables')
@endsection

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Fuel Price Per Litre</h2>
        </div>
        <div class="card-body">
            <table id="per-litre" class="display" style="width:100%"></table>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Fuel Price Per Gallon</h2>
        </div>
        <div class="card-body">
            <table id="per-gallon" class="display" style="width:100%"></table>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Fuel Price Per Tank</h2>
        </div>
        <div class="card-body">
            <table id="per-tank" class="display" style="width:100%"></table>
        </div>
    </div>
</div>







<script>
    $(document).ready(function() {

        $('#per-litre').DataTable({
            ajax: home_url('api/index.php/_extras/get_fuel_per_litre'),
            columnDefs: [{
                    title: "ID",
                    visible: true,
                    targets: 0,
                    render: function(row) {
                        return row;
                    }
                },
                {
                    title: "Country",
                    visible: true,
                    targets: 1
                },
                {
                    title: "2018",
                    visible: true,
                    targets: 2
                },
                {
                    title: "2019",
                    visible: true,
                    targets: 3
                },
                {
                    title: "2020",
                    visible: true,
                    targets: 4
                },
                {
                    title: "2021",
                    visible: true,
                    targets: 5
                },
                {
                    title: "2022",
                    visible: true,
                    targets: 6
                },
                {
                    title: "YoY % change",
                    visible: true,
                    targets: 7
                },
                {
                    title: "5 Year % change",
                    visible: true,
                    targets: 8
                },
                {
                    title: "YoY Change",
                    visible: true,
                    targets: 9
                },
                {
                    title: "5 Year Change",
                    visible: true,
                    targets: 10
                }
            ],
            columns: [{
                    data: 'id'
                },
                {
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
            dom: 'Bfrtip',
            buttons: ['colvis', 'pageLength']
        });

        $('#per-gallon').DataTable({
            ajax: home_url('api/index.php/_extras/get_fuel_per_gallon'),
            columnDefs: [{
                    title: "ID",
                    visible: true,
                    targets: 0,
                    render: function(row) {
                        return row;
                    }
                },
                {
                    title: "Country",
                    visible: true,
                    targets: 1
                },
                {
                    title: "2018",
                    visible: true,
                    targets: 2
                },
                {
                    title: "2019",
                    visible: true,
                    targets: 3
                },
                {
                    title: "2020",
                    visible: true,
                    targets: 4
                },
                {
                    title: "2021",
                    visible: true,
                    targets: 5
                },
                {
                    title: "2022",
                    visible: true,
                    targets: 6
                },
                {
                    title: "YoY % change",
                    visible: true,
                    targets: 7
                },
                {
                    title: "5 Year % change",
                    visible: true,
                    targets: 8
                },
                {
                    title: "YoY Change",
                    visible: true,
                    targets: 9
                },
                {
                    title: "5 Year Change",
                    visible: true,
                    targets: 10
                }
            ],
            columns: [{
                    data: 'id'
                },
                {
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
            dom: 'Bfrtip',
            buttons: ['colvis', 'pageLength']
        });

        $('#per-tank').DataTable({
            ajax: home_url('api/index.php/_extras/get_fuel_per_tank'),
            columnDefs: [{
                    title: "ID",
                    visible: true,
                    targets: 0,
                    render: function(row) {
                        return row;
                    }
                },
                {
                    title: "Country",
                    visible: true,
                    targets: 1
                },
                {
                    title: "2018",
                    visible: true,
                    targets: 2
                },
                {
                    title: "2019",
                    visible: true,
                    targets: 3
                },
                {
                    title: "2020",
                    visible: true,
                    targets: 4
                },
                {
                    title: "2021",
                    visible: true,
                    targets: 5
                },
                {
                    title: "2022",
                    visible: true,
                    targets: 6
                },
                {
                    title: "YoY % change",
                    visible: true,
                    targets: 7
                },
                {
                    title: "5 Year % change",
                    visible: true,
                    targets: 8
                },
                {
                    title: "YoY Change",
                    visible: true,
                    targets: 9
                },
                {
                    title: "5 Year Change",
                    visible: true,
                    targets: 10
                }
            ],
            columns: [{
                    data: 'id'
                },
                {
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
            dom: 'Bfrtip',
            buttons: ['colvis', 'pageLength']
        });

















        // $('#fuel-yoy').DataTable({
        //     'ajax': home_url('api/index.php/_extras/get_fuel_price_data'),
        //     pageLength: 25,
        //     responsive: true,
        //     dom: 'BQfrtip',
        //     buttons: [
        //         'pageLength',
        //         'colvis',
        //         'copyHtml5',
        //         'excelHtml5',
        //         'csvHtml5',
        //         'pdfHtml5',
        //         'zipHtml5',
        //         'print'
        //     ],
        //     language: {
        //         searchBuilder: {
        //             title: ''
        //         }
        //     },
        //     initComplete: function(settings, json) {
        //         $('.dt-buttons button').removeClass('btn-secondary');
        //         $('.dt-buttons button').addClass('btn-outline-dark');
        //         setTimeout(() => {
        //             $('.dtsb-searchBuilder button').removeClass('btn-light');
        //             $('.dtsb-searchBuilder button').addClass('btn-outline-dark');
        //         }, 500);
        //     },
        //     columnDefs: [

        //         {
        //             title: "ID",
        //             visible: true,
        //             targets: 0
        //         },
        //         {
        //             title: "Country",
        //             visible: true,
        //             targets: 1
        //         },
        //         {
        //             title: "Category",
        //             visible: true,
        //             targets: 2
        //         },
        //         {
        //             title: "Date Time",
        //             visible: true,
        //             targets: 3,
        //             render: function(data) {
        //                 return moment(data).format('MMMM D, YYYY h:mm:ss A');
        //             }
        //         },
        //         {
        //             title: "Close",
        //             visible: true,
        //             targets: 4
        //         },
        //         {
        //             title: "Frequency",
        //             visible: true,
        //             targets: 5
        //         },
        //         {
        //             title: "Historical Data Symbol",
        //             visible: true,
        //             targets: 6
        //         },
        //         {
        //             title: "Last Update",
        //             visible: true,
        //             targets: 7
        //         }
        //     ],
        //     columns: [

        //         {
        //             data: 'id'
        //         },
        //         {
        //             data: 'Country'
        //         },
        //         {
        //             data: 'Category'
        //         },
        //         {
        //             data: 'DateTime'
        //         },
        //         {
        //             data: 'Close'
        //         },
        //         {
        //             data: 'Frequency'
        //         },
        //         {
        //             data: 'HistoricalDataSymbol'
        //         },
        //         {
        //             data: 'LastUpdate'
        //         }
        //     ]
        // });
    });
</script>
