<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Country extends Model
{
	use HasFactory, Sortable, HasTranslations;

	protected $guarded = ['id'];

	public $translatable = ['name'];

	public $sortable = ['code', 'name', 'confirmed', 'recovered', 'deaths'];
}
