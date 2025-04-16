<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacultyResearch extends Model
{
    use CrudTrait;
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'faculty_research';
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'project_name',
        'members',
        'department',
        'abstract',
        'banner_image',
        'file',
        'approved',
        'rejected',
        'rejection_reason',
        'view_count'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the user that owns the research.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    /**
     * Handle file uploads for banner image
     */
    public function setBannerImageAttribute($value)
    {
        $attribute_name = "banner_image";
        $disk = "public";
        $destination_path = "faculty/banners";

        // If a new file is uploaded, delete the previous one
        if ($value && is_file($value) && $this->{$attribute_name}) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
        }

        // Handle the upload
        if (request()->hasFile($attribute_name)) {
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
            return;
        }

        // If no new file has been uploaded, keep the current value
        if (is_null($value) && request()->has($attribute_name . '_delete')) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
            return;
        }
    }

    /**
     * Handle file uploads for research file
     */
    public function setFileAttribute($value)
    {
        $attribute_name = "file";
        $disk = "public";
        $destination_path = "faculty/files";

        // If a new file is uploaded, delete the previous one
        if ($value && is_file($value) && $this->{$attribute_name}) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
        }

        // Handle the upload
        if (request()->hasFile($attribute_name)) {
            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
            return;
        }

        // If no new file has been uploaded, keep the current value
        if (is_null($value) && request()->has($attribute_name . '_delete')) {
            \Storage::disk($disk)->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
            return;
        }
    }
}