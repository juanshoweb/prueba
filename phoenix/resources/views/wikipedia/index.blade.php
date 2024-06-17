<!DOCTYPE html>
<html>
<head>
    <title>Wikipedia Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Wikipedia Search</h1>


        <div class="form-group">
            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
        </div>
        <ul id="searchResults" class="list-group"></ul>

        <h2>Search History</h2>
        <div class="row">
            <div class="col-sm">
                <a class="nav-link" href="{{ route('wikipedia.index') }}">Home</a>
            </div>
            <div class="col-sm">
                <a class="nav-link" href="{{ route('wikipedia.searchHistory') }}">Search History</a>
            </div>
        </div>
        
        <ul id="searchHistory" class="list-group">
            @foreach($searchHistories as $history)
                <li class="list-group-item">{{ $history->query }}</li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var query = $(this).val();

                if (query.length >= 3) {
                    $.ajax({
                        url: "{{ route('wikipedia.search') }}",
                        method: 'GET',
                        data: { query: query },
                        success: function(response) {
                            $('#searchResults').empty();

                            if (response.title) {
                                $('#searchResults').append(
                                    '<li class="list-group-item">' +
                                    '<h5>' + response.title + '</h5>' +
                                    '<p>' + response.extract + '</p>' +
                                    '</li>'
                                );
                            }
                        }
                    });
                } else {
                    $('#searchResults').empty();
                }
            });
        });
    </script>
</body>
</html>
