<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FacultyRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class FacultyCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    public function setup()
    {
        // Point to the ResearchRepository model instead
        CRUD::setModel(\App\Models\ResearchRepository::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/faculty');
        CRUD::setEntityNameStrings('faculty research', 'faculty research');
        
        // Add a where clause to only show faculty research
        $this->crud->addClause('where', 'faculty_research', true);
    }

    protected function setupListOperation()
    {
        CRUD::column('project_name')->label('Research Title');
        CRUD::column('members')->label('Co-Researchers');
        CRUD::column('department');
        CRUD::column('approved')->type('boolean');
        CRUD::column('created_at')->type('datetime');

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
        
        // Show who uploaded it
        CRUD::addColumn([
            'name' => 'user_id',
            'label' => 'Submitted By',
            'type' => 'relationship',
            'entity' => 'user',
            'attribute' => 'name',
        ]);
    }

    protected function setupCreateOperation()
    {
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
        CRUD::field('abstract')->type('textarea');
        CRUD::field('banner_image')->type('upload')->upload(true)->disk('public');
        CRUD::field('file')->type('upload')->upload(true)->disk('public');
        CRUD::field('approved')->type('checkbox');
        CRUD::field('rejected')->type('checkbox');
        CRUD::field('rejection_reason')->type('textarea');
        
        // Add the faculty_research flag with a default value of true
        // But hide it from the form since it's always true for faculty research
        CRUD::field('faculty_research')
            ->type('hidden')
            ->value(true);
        
        // Detect if we're creating a new entry so we can set faculty_research to true
        if (!$this->crud->getCurrentEntry()) {
            // For new entries
            $this->crud->getRequest()->request->add(['faculty_research' => true]);
        }
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
        
        // Always ensure faculty_research is true when updating
        $this->crud->getRequest()->request->add(['faculty_research' => true]);
    }
    
    protected function setupShowOperation()
    {
        $this->setupListOperation();
        
        // Add the abstract for viewing
        CRUD::column('abstract')->type('textarea');
        
        // Add rejection fields
        CRUD::column('rejected')->type('boolean');
        CRUD::column('rejection_reason');
        
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
    
    /**
     * Override store operation to ensure faculty_research is set to true
     */
    public function store()
    {
        // Add the faculty_research flag
        $this->crud->getRequest()->request->add(['faculty_research' => true]);
        
        // Call the parent store method
        return $this->traitStore();
    }
}
