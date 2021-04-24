<?php

namespace App;

use App\Model;

class Reply extends Model
{
    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function discussion(){
        return $this->belongsTo(Discussion::class); // no need to specify key since the id of discussion is the default
    }
}
