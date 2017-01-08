<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'title',
        'body',
        'created_at'
    ];

   /**
    * Articles Date Accessor: created protected property for created_at function.
    *
    * @var array
    */
    protected $dates = ['created_at'];

   /**
    * Scope queries to articles that have been published
    *
    * @param $query
    */
    public function scopeCreated($query)
    {
        $query->where('created_at', '<=', Carbon::now())->get();
    }

   /**
    * Scope queries to articles that have are unpublished by the Admin.
    *
    * @param $query
    */
    public function scopeUncreated($query)
    {
        $query->where('created_at', '>', Carbon::now())->get();
    }

   /**
    * Set the create_at attribute (Date Mutator)
    *
    * @param @date
    */
    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * An article is "owned" by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function user()
     {
        return $this->belongsTo('App\User');
     }

     /**
      * Get the tags associated with the given articles, (Many-to-Many Relationship)
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
      public function tags()
      {
         return $this->belongsToMany('App\Tag')->withTimestamps();
      }

      /**
       * Get a list of tag ids associated with the current article.
       *
       * @return array
       */
       public function getTagListAttribute()
       {
          return $this->tags->lists('id');
       }
}
