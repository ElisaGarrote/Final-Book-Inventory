<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Edit Book</h1>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Form -->
    <form action="{{ route('admin.book_inventory.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
            <label for="book_number" class="form-label">Book Number</label>
            <input type="text" class="form-control" id="book_number" name="book_number" value="{{ old('book_number', $book->book_number) }}" readonly>
        </div>
    
        <div class="mb-3">
            <label for="research_title" class="form-label">Research Title</label>
            <input type="text" class="form-control" id="research_title" name="research_title" value="{{ old('research_title', $book->research_title) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="researcher" class="form-label">Researchers</label>
            <input type="text" class="form-control" id="researcher" name="researcher" value="{{ old('researcher', $book->researcher) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <select class="form-control" id="location" name="location" required>
                <option value="Book shelf 1" {{ old('location', $book->location) == 'Book shelf 1' ? 'selected' : '' }}>Book shelf 1</option>
                <option value="Book shelf 2" {{ old('location', $book->location) == 'Book shelf 2' ? 'selected' : '' }}>Book shelf 2</option>
                <option value="Book shelf 3" {{ old('location', $book->location) == 'Book shelf 3' ? 'selected' : '' }}>Book shelf 3</option>
                <option value="Book shelf 4" {{ old('location', $book->location) == 'Book shelf 4' ? 'selected' : '' }}>Book shelf 4</option>
                <option value="Book shelf 5" {{ old('location', $book->location) == 'Book shelf 5' ? 'selected' : '' }}>Book shelf 5</option>
            </select>
        </div>
    
        <div class="mb-3">
            <label for="book_code" class="form-label">Book Code</label>
            <input type="text" class="form-control" id="book_code" name="book_code" value="{{ old('book_code', $book->book_code) }}" readonly>
        </div>
    
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Active" {{ old('status', $book->status) == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Inactive" {{ old('status', $book->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="Qualitative Research" {{ old('category', $book->category) == 'Qualitative Research' ? 'selected' : '' }}>Qualitative Research</option>
                <option value="Quantitative Research" {{ old('category', $book->category) == 'Quantitative Research' ? 'selected' : '' }}>Quantitative Research</option>
                <option value="Mixed-Methods Research" {{ old('category', $book->category) == 'Mixed-Methods Research' ? 'selected' : '' }}>Mixed-Methods Research</option>
                <option value="Explanatory Research" {{ old('category', $book->category) == 'Explanatory Research' ? 'selected' : '' }}>Explanatory Research</option>
                <option value="Descriptive Research" {{ old('category', $book->category) == 'Descriptive Research' ? 'selected' : '' }}>Descriptive Research</option>
                <option value="Applied Research" {{ old('category', $book->category) == 'Applied Research' ? 'selected' : '' }}>Applied Research</option>
                <option value="Health and Medical Research" {{ old('category', $book->category) == 'Health and Medical Research' ? 'selected' : '' }}>Health and Medical Research</option>
                <option value="Engineering and Technology Research" {{ old('category', $book->category) == 'Engineering and Technology Research' ? 'selected' : '' }}>Engineering and Technology Research</option>
                <option value="Business and Management Research" {{ old('category', $book->category) == 'Business and Management Research' ? 'selected' : '' }}>Business and Management Research</option>
                <option value="Environmental Research" {{ old('category', $book->category) == 'Environmental Research' ? 'selected' : '' }}>Environmental Research</option>
            </select>
        </div>
    
        <div class="mb-4">
            <label for="abstract" class="form-label">Abstract</label>
            <textarea class="form-control" id="abstract" name="abstract" rows="5" required>{{ old('abstract', $book->abstract) }}</textarea>
        </div>
    
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2">Update</button>
            <a href="{{ route('admin.book_inventory.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
