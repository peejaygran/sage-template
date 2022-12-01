{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> --}}

{{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.3/js/dataTables.colReorder.min.js">
</script> --}}

{{-- @if (isset($dt_loaded)) --}}
@php $td_loaded = true; @endphp

<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.css" />

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.min.js">
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js">
</script>

<style>
    .dropdown-menu,
    div.dt-button-collection .dt-button {
        width: 100% !important;
        min-width: 100% !important;
        margin: 2px 0;
        border-radius: 4px;
    }

    div.dt-button-collection .dt-button {
        padding: 2px 4px !important;
    }

    table thead,
    table tfoot,
    .dt-buttons button:hover {
        background: #007bff !important;
        color: #fff !important;
    }

    table th,
    table td {
        padding: 0.5rem !important;
    }

    table tr.even {
        background: #c4c4c4 !important;
    }
</style>

<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.dt-buttons button').removeClass('btn-secondary');
            $('.dt-buttons button').addClass('btn-outline-dark m-1');
            $('.dataTables_filter input').addClass('d-block d-sm-inline-block');
        }, 1000);
    });
</script>
{{-- @endif --}}
