<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookListResource;
use App\Http\Requests\BookRequest;

class Library extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // needs to return multiple articles
        // so we use the collection method
        return BookListResource::collection(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        // get post request data for title, author, pages, published date, ISBN and rating
        $data = $request->only(["title", "pages", "published", "isbn", "rating"]);

        // create book with data and store in DB
        $book = Book::create($data);

        // return the Book Resource (with selected properties)
        return new BookResource($book);
    }

    /**
     * Display the specified resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // return the Book Resource (with selected properties)
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        // get the request data
        $data = $request->only(["title", "pages", "published", "isbn", "rating"]);
        // update the article
        $book->fill($data)->save();
        // return the updated version (with selected properties)
        return new BookResource($book);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        // use a 204 code as there is no content in the response
        return response(null, 204);
    }
}
