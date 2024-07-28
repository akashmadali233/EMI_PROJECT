<h2>EMI Details</h2>
<table>
    <thead>
    <tr>
        <th>Client ID</th>
        @foreach($emiDetails->first() as $column => $value)
            @if($column !== 'clientid')
                <th>{{ $column }}</th>
            @endif
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($emiDetails as $emi)
        <tr>
            <td>{{ $emi->clientid }}</td>
            @foreach($emi as $key => $value)
                @if($key !== 'clientid')
                    <td>{{ $value }}</td>
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
