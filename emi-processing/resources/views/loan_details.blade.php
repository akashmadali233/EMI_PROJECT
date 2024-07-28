<!DOCTYPE html>
<html>
<head>
    <title>Loan Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        .logout-button {
            background-color: #f44336;
            margin-left: 10px;
        }
        .logout-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>
<div class="top-right">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
</div>
<h1>Loan Details</h1>
<table>
    <thead>
    <tr>
        <th>Client ID</th>
        <th>Number of Payments</th>
        <th>First Payment Date</th>
        <th>Last Payment Date</th>
        <th>Loan Amount</th>
    </tr>
    </thead>
    <tbody>
    @foreach($loanDetails as $loan)
        <tr>
            <td>{{ $loan->clientid }}</td>
            <td>{{ $loan->num_of_payment }}</td>
            <td>{{ $loan->first_payment_date }}</td>
            <td>{{ $loan->last_payment_date }}</td>
            <td>{{ $loan->loan_amount }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<button id="process-button">Process Data</button>
<div id="emi-details-container"></div>

<script>
    document.getElementById('process-button').addEventListener('click', function() {
        fetch('{{ route('process-data') }}')
            .then(response => response.text())
            .then(html => {
                document.getElementById('emi-details-container').innerHTML = html;
            });
    });
</script>
</body>
</html>
