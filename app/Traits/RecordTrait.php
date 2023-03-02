<?php

namespace App\Traits;

use App\Models\Record;
use Auth;

trait RecordTrait
{
    public function getRecords()
    {
        $userId = Auth::user()->id;
        $records = Record::where('user_id', $userId)->get();

        return $records;
    }
}
