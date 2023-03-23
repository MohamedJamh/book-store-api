<?php

namespace App\Http\Resources\Book;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        $schema = [
            "isbn" => $this->id,
            "title" => $this->title,
            "content" => $this->content,
            "status" => $this->status,
            "datePublication" => $this->date_publication,
            "numberPages" => $this->number_pages,
            "authorId" => $this->author_id,
            "collectionId" => $this->collection_id,
            "genreId" => $this->genre_id
        ];
        $this->deleted_at != null ? $schema += ['deletedAt' => $this->deleted_at] : null;
        return $schema;
    }
}
