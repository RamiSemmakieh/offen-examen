<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding: 40px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 10px;
            margin: 10px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.2rem;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 20px 0;
        }

        .btn-primary,
        .btn-success {
            border-radius: 25px;
            font-size: 1rem;
            padding: 10px 20px;
            display: block;
            width: 80%;
            margin: 10px auto;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .text-center {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            flex: 1;
            min-width: 300px;
            /* Ensure minimum width */
            max-width: 400px;
            /* Ensure maximum width */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Dashboard</h1>

        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4>Results</h4>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route('results.index') }}" class="btn btn-primary">View Results</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Courses</h4>
                </div>
                <div class="card-body text-center">
                    <a href="{{ route('courses.index') }}" class="btn btn-primary">View Courses</a>
                    <a href="{{ route('courses.create') }}" class="btn btn-success">Create Course</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>