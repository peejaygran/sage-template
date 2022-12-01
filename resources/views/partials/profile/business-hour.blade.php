<div class="card shadow-none">
    <div class="card-body">
        <h4 class="font-weight-bold text-center text-md-left">Business Hour</h4>

        <table class="business-hour w-100">
            @foreach ($company_details->operator_hrs as $hrs)
                @php
                    if ($hrs->day_of_week == 'sun') {
                        $hrs->day_of_week = 'Sunday';
                    }
                    if ($hrs->day_of_week == 'mon') {
                        $hrs->day_of_week = 'Monday';
                    }
                    if ($hrs->day_of_week == 'tue') {
                        $hrs->day_of_week = 'Tuesday';
                    }
                    if ($hrs->day_of_week == 'wed') {
                        $hrs->day_of_week = 'Wednesday';
                    }
                    if ($hrs->day_of_week == 'thu') {
                        $hrs->day_of_week = 'Thursday';
                    }
                    if ($hrs->day_of_week == 'fri') {
                        $hrs->day_of_week = 'Friday';
                    }
                    if ($hrs->day_of_week == 'sat') {
                        $hrs->day_of_week = 'Saturday';
                    }
                @endphp

                <tr>
                    <td class="font-weight-bold m-0">{!! $hrs->day_of_week !!} : </td>

                    <td>
                        {!! date('h:i a', strtotime($hrs->open_from)) !!} to
                        {!! date('h:i a', strtotime($hrs->open_to)) !!}
                    </td>
                </tr>
            @endforeach

        </table>

    </div>
</div>
