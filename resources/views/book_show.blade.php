<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Book Details</h1>

    <div class="card mt-4">
        <div class="card-header">
            <h4>Book Information</h4>
        </div>
        <div class="card-body">
            <p><strong>Book Number:</strong> {{ $book->book_number }}</p>
            <p><strong>Title:</strong> {{ $book->research_title }}</p>
            <p><strong>Researchers:</strong> {{ $book->researcher }}</p>
            <p><strong>Location:</strong> {{ $book->location }}</p>
            <p><strong>Book Code:</strong> {{ $book->book_code }}</p>
            <p><strong>Status:</strong> {{ $book->status }}</p>
            <p><strong>Category:</strong> {{ $book->category }}</p>
            <p><strong>Abstract:</strong></p>
            <p>{{ $book->abstract }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.book_inventory.index') }}" class="btn btn-secondary">Back to Inventory</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
