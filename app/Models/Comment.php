<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

    protected $table = 'comment';
    protected $fillable = ['fitness_id', 'user', 'email', 'ip', 'text', 'approved'];

}