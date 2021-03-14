<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'finished',
        'task',
        'thumbnail',
        'thumbnail_path',
        'created',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

     /**
     * Get the finished attribute.
     *
     * @return boolean 
     */
    public function getFinishedAttribute() {
        return $this->attributes['finished'];
    }

     /**
     * Set the finished attribute.
     *
     * @param  boolean  $value
     * @return void
     */
    public function setFinishedAttribute($value) {
        $this->attributes['finished'] = $value;
    }

    /**
     * Get the task.
     *
     * @return string 
     */
    public function getTaskAttribute() {
        return $this->attributes['task'];
    } 
    
    /**
     * Set the task.
     *
     * @param  string  $value
     * @return void
     */
    public function setTaskAttribute($value) {
        $this->attributes['task'] = $value;
    }

    /**
     * Get the thumbnail.
     *
     * @return string 
     */
    public function getThumbnailAttribute() {
        return $this->attributes['thumbnail'];
    } 
    
    /**
     * Set the thumbnail.
     *
     * @param  string  $value
     * @return void
     */
    public function setThumbnailAttribute($value) {
        $this->attributes['thumbnail'] = $value;
    }

    /**
     * Get the thumbnail path.
     *
     * @return string 
     */
    public function getThumbnailPathAttribute() {
        return $this->attributes['thumbnail_path'];
    } 
    
    /**
     * Set the thumbnail path.
     *
     * @param  string  $value
     * @return void
     */
    public function setThumbnailPathAttribute($value) {
        $this->attributes['thumbnail_path'] = $value;
    }

}