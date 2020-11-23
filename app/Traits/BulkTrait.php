<?php

namespace App\Traits;

use Carbon\Carbon;


trait BulkTrait
{
    public function bulkActions($crud)
    {
        $crud->enableBulkActions();
        $crud->addBulkDeleteButton();
        $crud->enableExportButtons();
        $crud->allowAccess('show');
    }
}