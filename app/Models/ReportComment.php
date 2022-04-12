<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReportComment extends Model
{
    use HasFactory;
    use SearchableTrait;

    protected $guarded = [];

    // protected $searchable = [
    //     'columns'   => [],
    // ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function report()
    {
        return $this->belongsTo(FinancialReport::class, 'financial_report_id');
    }
}
