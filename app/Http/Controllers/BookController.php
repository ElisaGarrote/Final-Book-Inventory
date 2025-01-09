<?php

namespace App\Http\Controllers;

use App\Models\Book;  // Import Book model
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Display the book inventory
    public function index()
    {
        // Fetch all books from the database
        $books = Book::all(); // Or use a more specific query if needed (e.g., pagination)
        
        // Pass the books data to the view
        return view('admin.book_inventory', compact('books'));
    }

    // Show the form to add a new book
    public function create()
    {
        return view('book_create');
    }

    // Store a new book in the database
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'book_number' => 'required|max:4',
            'research_title' => 'required|max:100',
            'researcher' => 'required|max:50',
            'abstract' => 'required|max:1250',
            'held_by' => 'required|max:50',
            'location' => 'required',
            'category' => 'required',
            'status' => 'required',
            'book_code' => 'required|max:50', // Validate book_code
        ]);

        // Create a new book record with the validated data
        Book::create($request->all());

        // Redirect to the correct route name with success message
        return redirect()->route('admin.book_inventory.index')->with('success', 'Book added successfully');
    }

     // Edit: Show the form to edit an existing book
    public function edit(Book $book)
    {
        return view('book_update', compact('book'));
    }

    // Update: Save changes to an existing book
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'research_title' => 'required|string|max:255',
            'researcher' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'status' => 'required|string|in:Active,Inactive',
            'category' => 'required|string|max:255',
            'abstract' => 'required|string|max:1250',
        ]);
    
        $book->update($validatedData);
    
        return redirect()->route('admin.book_inventory.index')->with('success', 'Book updated successfully!');
    }

    //show records
    public function show($id)
    {
        $book = Book::findOrFail($id); // Retrieve the book or fail if not found
        return view('book_show', compact('book'));
    }

    // Destroy: Soft delete a book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete(); // Perform soft delete

        return redirect()->route('admin.book_inventory.index')
            ->with('success', 'Book deleted successfully.');
    }

    // Restore: Restore a soft-deleted book
    public function restore($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->restore();

        return redirect()->route('admin.book_inventory.index')
            ->with('success', 'Book restored successfully.');
    }

    // Force Delete: Permanently delete a soft-deleted book
    public function forceDelete($id)
    {
        $book = Book::onlyTrashed()->findOrFail($id);
        $book->forceDelete();

        return redirect()->route('admin.book_inventory.index')
            ->with('success', 'Book permanently deleted.');
    }
}
