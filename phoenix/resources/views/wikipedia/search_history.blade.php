<!DOCTYPE html>
<html>
<head>
    <title>Search History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Search History</h1>
        <div class="row">
            <div class="col-sm">
                <a class="nav-link" href="{{ route('wikipedia.index') }}">Home</a>
            </div>
            <div class="col-sm">
                <a class="nav-link" href="{{ route('wikipedia.searchHistory') }}">Search History</a>
            </div>
        </div>
        <ul class="list-group">
            @foreach($searchHistories as $history)
                <li class="list-group-item">{{ $history->query }}</li>
            @endforeach
        </ul>
        {{ $searchHistories->links() }}
    </div>
</body>
</html>
