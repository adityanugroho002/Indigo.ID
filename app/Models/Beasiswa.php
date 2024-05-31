<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $fillable = [
        'name',
        'provider',
        'description',
        'field_of_study',
        'country',
        'eligibility_criteria',
        'education_level',
        'benefits',
        'selection_process',
        'document_requirements',
        'language_requirements',
        'application_method',
        'status',
        'guide_book',
        'official_website',
        'bulan',
        'poster'
    ];

    protected $table = 'beasiswa';
}
