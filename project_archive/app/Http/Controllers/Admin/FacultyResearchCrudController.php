<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FacultyResearchRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class FacultyResearchCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        CRUD::setModel(\App\Models\FacultyResearch::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/faculty-research');
        CRUD::setEntityNameStrings('faculty research', 'faculty research');
    }

    protected function setupListOperation()
    {
        // Simple columns
        CRUD::column('project_name')->label('Research Title');
        CRUD::column('members')->label('Co-Researchers');
        CRUD::column('department');
        CRUD::column('created_at')->type('datetime');
        CRUD::column('approved')->type('boolean');
        
        // User who submitted
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Submitted By',
            'type' => 'relationship',
            'entity' => 'user',
            'attribute' => 'name',
        ]);

        // Display banner image
        CRUD::addColumn([
            'name' => 'banner_image',
            'label' => 'Banner Image',
            'type' => 'image',
            'prefix' => 'storage/'
        ]);

        // File link
        CRUD::addColumn([
            'name' => 'file',
            'label' => 'Research File',
            'type' => 'closure',
            'function' => function($entry) {
                if ($entry->file) {
                    return '<a href="'.asset('storage/'.$entry->file).'" target="_blank">View File</a>';
                }
                return 'No file uploaded';
            }
        ]);
        
        // View count
        CRUD::column('view_count')->type('number');
    }

    protected function setupCreateOperation()
    {
        CRUD::setValidation(FacultyResearchRequest::class);

        // Basic fields
        CRUD::field('project_name')->label('Research Title');
        CRUD::field('members')->label('Co-Researchers');
        CRUD::field('department')->type('select_from_array')->options([
            'College of Engineering and Architecture' => 'College of Engineering and Architecture',
            'College of Computer Studies' => 'College of Computer Studies',
            'College of Health Sciences' => 'College of Health Sciences',
            'College of Social Work' => 'College of Social Work',
            'College of Teacher Education, Arts and Sciences' => 'College of Teacher Education, Arts and Sciences',
            'School of Business and Accountancy' => 'School of Business and Accountancy',
            'Graduate School' => 'Graduate School',
        ]);
        
        // Abstract editor
        CRUD::field('abstract')->type('wysiwyg');
        
        // File upload fields
        CRUD::field('banner_image')->type('upload')->upload(true)->disk('public');
        CRUD::field('file')->type('upload')->upload(true)->disk('public');
        
        // Status fields
        CRUD::field('approved')->type('checkbox');
        CRUD::field('rejected')->type('checkbox');
        CRUD::field('rejection_reason')->type('textarea');
        
        // User ID (who uploaded it)
        CRUD::field('user_id')->type('hidden')->default(backpack_auth()->id());
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
    
    protected function setupShowOperation()
    {
        $this->setupListOperation();
        
        // Add the abstract for viewing
        CRUD::column('abstract')->type('textarea');
        
        // Add document preview for PDFs
        CRUD::addColumn([
            'name' => 'document_preview',
            'label' => 'Document Preview',
            'type' => 'closure',
            'function' => function($entry) {
                if ($entry->file && strtolower(pathinfo($entry->file, PATHINFO_EXTENSION)) === 'pdf') {
                    return '<div class="pdf-preview">
                                <iframe src="'.asset('storage/'.$entry->file).'" width="100%" height="500px"></iframe>
                            </div>';
                }
                return 'Preview not available for this file type.';
            }
        ]);
    }
}