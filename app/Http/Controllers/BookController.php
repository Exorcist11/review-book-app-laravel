<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $book = Book::select('books.id', 'book_name', 'name', 'publisherName', 'categoryName')
                ->join('authors', 'books.author_id', '=', 'authors.id')
                ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                ->join('categories', 'books.category_id', '=', 'categories.id')
                ->get();

            $res = [
                'status' => true,
                'message' => 'List Book',
                'data' => $book
            ];

            return response()->json($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $err->getMessage()
            ];
            return response()->json($res, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'book_name' => 'required',
                'author_id' => 'required',
                'publisher_id' => 'required',
                'category_id' => 'required',
            ]);

            if ($validator->fails()) {
                $res = [
                    'success' => false,
                    'message' => 'Erorr validator',
                    'error' => $validator->errors()
                ];
                return response()->json($res, 400);
            }

            $author_id = $request->input('author_id');
            $publisher_id = $request->input('publisher_id');
            $category_id = $request->input('category_id');

            $isAuthor = Author::find($author_id);
            if (is_null($isAuthor)) {
                $res = [
                    'success' => false,
                    'message' => 'Author not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }

            $isPublisher = Publisher::find($publisher_id);
            if (is_null($isPublisher)) {
                $res = [
                    'success' => false,
                    'message' => 'Publisher not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }

            $isCategory = Category::find($category_id);
            if (is_null($isCategory)) {
                $res = [
                    'success' => false,
                    'message' => 'Category not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }
            $book_image = Str::random(32). "." . $request->image_path->getClientOriginalExtension();
           Storage::disk('public')->put($book_image, file_get_contents($request->image_path));

            $book = Book::create([
                'book_name' => $request->input('book_name'),
                'author_id' => $author_id,
                'publisher_id' => $publisher_id,
                'category_id' => $category_id,
            ]);
            $bookDetail = BookDetail::create([
                'bookID' => $book->id,
                'release' => $request->input('release'),
                'pageCount' => $request->input('pageCount'),
                'description' => $request->input('description'),
                'image_path' => $book_image
            ]);

            $res = [
                'status' => true,
                'message' => 'Create book successed',
                'data' => [$book, $bookDetail]
            ];

            return response($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $err->getMessage()
            ];
            return response()->json($res, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $book = Book::leftJoin('book_details', 'books.id', '=', 'book_details.bookID')
                ->where('books.id', '=', $id)
                ->get();
            if ($book->count() <= 0) {
                $res = [
                    'success' => false,
                    'message' => 'Book not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }

            $res = [
                'status' => true,
                'message' => 'Information book ' . $id,
                'data' => $book
            ];

            return response()->json($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $err->getMessage()
            ];
            return response()->json($res, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $book = Book::leftJoin('book_details', 'books.id', '=', 'book_details.bookID')
                ->where('books.id', '=', $id)
                ->get();
            if ($book->count() <= 0) {
                $res = [
                    'success' => false,
                    'message' => 'Book not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }

            $deletedBD = BookDetail::where('bookID', '=', $id)->delete();
            $delete = Book::where('id', '=', $id)->delete();
            $res = [
                'status' => true,
                'message' => 'Delete book ' . $id,
            ];

            return response()->json($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $err->getMessage()
            ];
            return response()->json($res, 500);
        }
    }
}
