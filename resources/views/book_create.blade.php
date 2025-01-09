<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Add Book</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form id="addBookForm" method="POST" action="{{ route('admin.book_inventory.store') }}">
        @csrf
        <div class="mb-3">
            <label for="book_number" class="form-label">Book Number</label>
            <input type="text" class="form-control" id="book_number" name="book_number" maxlength="4" value="{{ old('book_number') }}" required>
        </div>
        <div class="mb-3">
            <label for="book_code" class="form-label">Book Code</label>
            <input type="text" class="form-control" id="book_code" name="book_code" maxlength="4" value="{{ old('book_code') }}" required>
        </div>
        <div class="mb-3">
            <label for="research_title" class="form-label">Research Title</label>
            <input type="text" class="form-control" id="research_title" name="research_title" maxlength="100" value="{{ old('research_title') }}" required>
        </div>
        <div class="mb-3">
            <label for="researcher" class="form-label">Researcher</label>
            <input type="text" class="form-control" id="researcher" name="researcher" maxlength="50" value="{{ old('researcher') }}" required>
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Abstract</label>
            <textarea class="form-control" id="abstract" name="abstract" rows="3" maxlength="1250" required>{{ old('abstract') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="held_by" class="form-label">Held By</label>
            <input type="text" class="form-control" id="held_by" name="held_by" maxlength="50" value="{{ old('held_by') }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <select class="form-control" id="location" name="location" required>
                <option value="">Select a Location</option>
                <option value="Book shelf 1" {{ old('location') == 'Book shelf 1' ? 'selected' : '' }}>Book shelf 1</option>
                <option value="Book shelf 2" {{ old('location') == 'Book shelf 2' ? 'selected' : '' }}>Book shelf 2</option>
                <option value="Book shelf 3" {{ old('location') == 'Book shelf 3' ? 'selected' : '' }}>Book shelf 3</option>
                <option value="Book shelf 4" {{ old('location') == 'Book shelf 4' ? 'selected' : '' }}>Book shelf 4</option>
                <option value="Book shelf 5" {{ old('location') == 'Book shelf 5' ? 'selected' : '' }}>Book shelf 5</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" id="category" name="category" required>
                <option value="">Select a Category</option>
                <option value="Qualitative Research" {{ old('category') == 'Qualitative Research' ? 'selected' : '' }}>Qualitative Research</option>
                <option value="Quantitative Research" {{ old('category') == 'Quantitative Research' ? 'selected' : '' }}>Quantitative Research</option>
                <option value="Mixed-Methods Research" {{ old('category') == 'Mixed-Methods Research' ? 'selected' : '' }}>Mixed-Methods Research</option>
                <option value="Explanatory Research" {{ old('category') == 'Explanatory Research' ? 'selected' : '' }}>Explanatory Research</option>
                <option value="Descriptive Research" {{ old('category') == 'Descriptive Research' ? 'selected' : '' }}>Descriptive Research</option>
                <option value="Applied Research" {{ old('category') == 'Applied Research' ? 'selected' : '' }}>Applied Research</option>
                <option value="Health and Medical Research" {{ old('category') == 'Health and Medical Research' ? 'selected' : '' }}>Health and Medical Research</option>
                <option value="Engineering and Technology Research" {{ old('category') == 'Engineering and Technology Research' ? 'selected' : '' }}>Engineering and Technology Research</option>
                <option value="Business and Management Research" {{ old('category') == 'Business and Management Research' ? 'selected' : '' }}>Business and Management Research</option>
                <option value="Environmental Research" {{ old('category') == 'Environmental Research' ? 'selected' : '' }}>Environmental Research</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="">Select Status</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Book</button>
    </form>
</div>

<script>
    document.getElementById('addBookForm').addEventListener('submit', function (e) {
        const bookNumber = document.getElementById('book_number').value.trim();
        const bookCode = document.getElementById('book_code').value.trim();
        const researchTitle = document.getElementById('research_title').value.trim();
        const researcher = document.getElementById('researcher').value.trim();
        const abstract = document.getElementById('abstract').value.trim();
        const heldBy = document.getElementById('held_by').value.trim();
        const location = document.getElementById('location').value;
        const category = document.getElementById('category').value;
        const status = document.getElementById('status').value;

        if (!bookNumber || !bookCode || !researchTitle || !researcher || !abstract || !heldBy || !location || !category || !status) {
            alert('Please fill in all required fields.');
            e.preventDefault();
            return;
        }

        // Example: Additional duplicate check logic (placeholder for server-side validation).
        // You can replace this with an actual API call to check duplicate values.

        // Example Duplicate Check (Simulated)
        if (bookNumber === '1234') {
            alert('Book Number already exists.');
            e.preventDefault();
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
