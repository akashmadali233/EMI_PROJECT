{{--<table class="display table table-bordered" id="loanDetails">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>Client ID</th>--}}
{{--        <th>num_of_payment</th>--}}
{{--        <th>first_payment_date</th>--}}
{{--        <th>last_payment_date</th>--}}
{{--        <th>loan_amount</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody id="loantablebodyid">--}}
{{--    @foreach($bankDetails as $bankDetail)--}}
{{--        <tr>--}}
{{--            <td>{{$bankDetail->clientid}}</td>--}}
{{--            <td>{{$bankDetail->num_of_payment}}</td>--}}
{{--            <td>{{$bankDetail->first_payment_date}}</td>--}}
{{--            <td>{{$bankDetail->last_payment_date}}</td>--}}
{{--            <td>{{$bankDetail->loan_amount}}</td>--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--<table class="display table table-bordered" id="loanEMIS">--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>Client ID</th>--}}
{{--        @foreach($columns as $column)--}}
{{--            <th>{{ $column }}</th>--}}
{{--        @endforeach--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody id="loanEMIStablebodyid">--}}
{{--    @foreach($emiDetails as $detail)--}}
{{--        <tr>--}}
{{--            <td>{{ $detail['clientid'] }}</td>--}}
{{--            @foreach($columns as $column)--}}
{{--                <td>{{ $detail[$column] ?? 'N/A' }}</td>--}}
{{--            @endforeach--}}
{{--        </tr>--}}
{{--    @endforeach--}}
{{--    </tbody>--}}
{{--</table>--}}
