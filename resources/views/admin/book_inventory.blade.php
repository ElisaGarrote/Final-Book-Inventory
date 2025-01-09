<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-container {
            max-height: 500px; /* Increased height for better visibility */
            overflow-y: auto; /* Vertical scrolling */
        }
        .table {
            min-width: 1200px; /* Ensure the table has a minimum width */
        }
        .table th, .table td {
            white-space: nowrap; /* Prevent text wrapping */
        }
        .table th {
            position: sticky;
            top: 0;
            background: #f8f9fa; /* Light gray background for the header */
            z-index: 1;
        }
        .action-column {
            width: 200px; /* Adjusted width for the Action column */
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Book Inventory</h1>

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add Button -->
    <div class="text-end">
        <a href="{{ route('admin.book_inventory.create') }}" class="btn btn-success mb-3">Add Book</a>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Number</th>
                    <th>Title</th>
                    <th>Researchers</th>
                    <th>Location</th>
                    <th>Book Code</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th class="action-column">Action</th> <!-- Fixed width column -->
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->book_number }}</td>
                        <td>{{ $book->research_title }}</td>
                        <td>{{ $book->researcher }}</td>
                        <td>{{ $book->location }}</td>
                        <td>{{ $book->book_code }}</td>
                        <td>{{ $book->status }}</td>
                        <td>{{ $book->category }}</td>
                        <td class="action-column">
                            <!-- Action buttons -->
                            <a href="{{ route('admin.book_inventory.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('admin.book_inventory.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.book_inventory.destroy', $book->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
