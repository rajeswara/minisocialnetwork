<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //protected $table = 'the_name_of_the_table';

    use SoftDeletes;

    protected $fillable = [
    	'user_id', 'content', 'live', 'post_on'
    ];

    protected $dates = ['post_on', 'deleted_at'];
    protected $guarded = ['id'];

    public function setLiveAttribute($value){
    	$this->attributes['live'] = (boolean)($value);
    }

    public function getShortContentAttribute(){
    	return substr($this->content, 0, random_int(60,150)). '...';
    }

    public function setPostOnAttribute($value)
    {
    	$this->attributes['post_on'] = Carbon::parse($value);
    }
}
