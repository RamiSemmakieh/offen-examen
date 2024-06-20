<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        .table {
            margin-top: 20px;
        }

        .back-button {
            margin-top: 20px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Result Details</h1>
        <h2 class="text-center">Student: {{ $result->student->name }}</h2>
        <h2 class="text-center">Course: {{ $result->course->name }}</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <tbody>
                    <tr>
                        <th>Result</th>
                        <td>{{ $result->result }}</td>
                    </tr>
                    <tr>
                        <th>Period</th>
                        <td>{{ $result->period }}</td>
                    </tr>
                    <tr>
                        <th>Remarks</th>
                        <td>{{ $result->remarks }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="back-button text-center">
            <a href="{{ route('results.index') }}" class="btn btn-primary">Back to Results Index</a>
        </div>
    </div>
</body>

</html>