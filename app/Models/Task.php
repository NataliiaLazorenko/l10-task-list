<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Models have protection against mass assignment by default, which prevents setting or changing multiple attributes at once.
    // To enable mass assignment, redefine the protected 'fillable' property in the model with the column names you want to
    // allow. Columns not listed in 'fillable' cannot be modified via mass assignment, which helps prevent unauthorized
    // changes to sensitive attributes like passwords.
    protected $fillable = ['title', 'description', 'long_description'];
    // // 'guarded' property is the opposite of 'fillable'.
    // // If a model has many attributes, we can use 'guarded' to specify which attributes should not be mass assigned (e.g., passwords or secrets),
    // // while the rest are fillable by default.
    // // However, using 'guarded' can be riskier because any new attributes added to the model will be mass assignable unless explicitly guarded.
    // // Generally, using 'fillable' is considered more secure as you explicitly specify which properties can be mass assigned
    // protected $guarded = ['secret'];

    // // We can configure what key should be used to identify the model using the route model binding.
    // // Eg. We want to use a slug property. We should add a function 'getRouteKeyName' and return 'slug' from it
    // public function getRouteKeyName() {
    //     return 'slug';
    // }

    public function toggleComplete()
    {
        $this->completed = !$this->completed;
        $this->save();
    }
}
