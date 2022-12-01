@if (!isset($_COOKIE['iwashere']) && !is_user_logged_in())

<style class="inline-bootstrap">
        /* .bg-gradient-primary {
            background: #107e7f linear-gradient(180deg, #349192, #107e7f) repeat-x !important;
            color: #ffffff;
        }

        .btn-outline-primary {
            color: #107e7f;
            border-color: #107e7f;
        }

        .bg-gradient-yellow {
            background: #f5dc4b linear-gradient(180deg, #f7e166, #f5dc4b) repeat-x !important;
            color: #1F2D3D;
        } */

        .modal {
            display: none;
        }

        *:not(h1,h2,h3,h4,h5,h6){
            font-size: 16px !important;
        }


    </style>

    @include('partials/core-web-vitals/bootstrap-inline')
@endif
