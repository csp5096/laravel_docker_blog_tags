<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
      * Filliable fields for an article tag.
      *
      * @var arry
      *
      */
      protected $fillable = [
        'name'
      ];

    /**
      * Get the articles associated with the given tags for the inverse, (Many-to-Many Relationship)
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
      public function articles()
      {
         return $this->belongsToMany('App\Article');
      }
}
