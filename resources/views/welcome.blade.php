<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fafc;
            color: #636b6f;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .full-height {
            height: 100vh;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            margin-bottom: 30px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn {
            font-size: 18px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                Welcome to My Application
            </div>

            <div class="links">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                @auth
                <a href="{{ route('results.index') }}" class="btn btn-primary">View Results</a>
                <a href="{{ route('courses.index') }}" class="btn btn-primary">View Courses</a>
                <a href="{{ route('courses.create') }}" class="btn btn-success">Create Course</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                <a href="{{ route('register') }}" class="btn btn-info">Register</a>
                @endauth
            </div>
        </div>
    </div>
</body>

</html>