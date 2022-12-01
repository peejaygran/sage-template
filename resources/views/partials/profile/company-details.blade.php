<div class="card shadow-none">
    <div class="card-body">

        <h4 class="font-weight-bold text-center text-md-left">Company Details</h4>

        <table>
            @if ($company->rmv_phone)
                <tr>
                    <td class="text-center">
                        <i class="fas fa-phone mr-1" style="transform: rotateZ(90deg);"></i>
                    </td>
                    <td>
                        {!! $company->rmv_phone !!}
                    </td>
                </tr>
            @endif
            @if ($company->rmv_mobile)
                <tr>
                    <td class="text-center">
                        <i class="fas fa-mobile-alt mr-1"></i>
                    </td>
                    <td>
                        {!! $company->rmv_mobile !!}
                    </td>
                </tr>
            @endif
            @if ($company->rmv_email)
                <tr>
                    <td class="text-center">
                        <i class="fas fa-envelope mr-1"></i>
                    </td>
                    <td>
                        {!! $company->rmv_email !!}
                    </td>
                </tr>
            @endif
            @if ($company->rmv_website)
                <tr>
                    <td class="text-center">
                        <i class="fas fa-laptop mr-1"></i>
                    </td>
                    <td>
                        {!! $company->rmv_website !!}
                    </td>
                </tr>
            @endif
        </table>

    </div>
</div>
