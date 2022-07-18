<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    /**
     * Determine if the model should be searchable.
     *
     * @return bool
     */
    // public function shouldBeSearchable()
    // {
    //     return $this->published === true;
    // }
}
