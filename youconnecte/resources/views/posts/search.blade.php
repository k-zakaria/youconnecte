<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- icon font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <input type="search" id="search_title" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                    <button class="btn btn-outline-secondary" type="button" id="search-addon"><i class="fas fa-search"></i></button>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm" id="searchResults">

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

$(document).ready(function() {
    $('#search_title').keyup(function() {
        var title = $(this).val();

        $.ajax({
            type: 'GET',
            url: '/search/users',
            data: { title_s: title },
            success: function(data) {
                $('#searchResults').html(data);
            },
            error: function(error) {
                console.error("Error during search:", error);
            }
        });
    });
});
        </script>
</body>
</html>
