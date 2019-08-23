<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // this would return the entire object with all properties 
        // return parent::toArray($request);

        // just show the id, title, author and isbn properties
        // this represents the current book
        return [
            "id" => $this->id,
            "title" => $this->title,
            "pages" => $this->pages,
            "published" => $this->published,
            "isbn" => $this->isbn, // remember the last comma - PHP needs it, JavaScript does not 
        ];
    }
}
