<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>
    @if ($approvals->isEmpty())
        <p>No locations found.</p>
    @else
        <ul>
            @foreach ($approvals as $approval)
                <li>{{ $approval->id }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
