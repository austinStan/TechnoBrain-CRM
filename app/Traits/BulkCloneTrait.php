<?php 

namespace App\Traits;

trait BulkCloneTrait {
    
    public function clone($crud)
    {
        $crud->allowAccess('clone');
        $crud->addButton('bottom', 'bulk_clone', 'view', 'crud::buttons.bulk_clone', 'beginning');
    }
}