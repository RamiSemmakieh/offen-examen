<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        .table {
            margin-top: 20px;
        }

        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .pagination .page-item .page-link {
            color: #007bff;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            /* Ensure the text color is white for better visibility */
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
        }

        .page-link {
            padding: 0.5rem 0.75rem;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            line-height: 1.5;
            border-radius: 0.2rem;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .pagination svg {
            width: 10px;
            height: 10px;
        }

        .action-buttons a,
        .action-buttons form {
            margin-right: 10px;
        }

        .action-buttons form {
            margin-bottom: 0;
        }

        .search-form {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Results Index</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="search-form">
            <form action="{{ route('results.index') }}" method="GET" class="form-inline">
                <div class="form-group mr-2">
                    <input type="text" name="student" class="form-control" placeholder="Search by Student" value="{{ request('student') }}">
                </div>
                <div class="form-group mr-2">
                    <input type="text" name="course" class="form-control" placeholder="Search by Course" value="{{ request('course') }}">
                </div>
                <div class="form-group mr-2">
                    <input type="text" name="result" class="form-control" placeholder="Search by Result" value="{{ request('result') }}">
                </div>
                <div class="form-group mr-2">
                    <input type="text" name="period" class="form-control" placeholder="Search by Period" value="{{ request('period') }}">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Search</button>
                <a href="{{ route('results.index') }}" class="btn btn-secondary mr-2">Clear Search</a>
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Result</th>
                        <th>Period</th>
                        <th>Remarks</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($results->count() > 0)
                    @foreach($results as $result)
                    <tr>
                        <td>{{ $result->student->name }}</td>
                        <td>{{ $result->course->title }}</td>
                        <td>{{ $result->result }}</td>
                        <td>{{ $result->period }}</td>
                        <td>{{ $result->remarks }}</td>
                        <td class="d-flex action-buttons">
                            <a href="{{ route('results.show', $result->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('results.edit', $result->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('results.destroy', $result->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this result?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" class="text-center">No results found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {{ $results->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</body>

</html>