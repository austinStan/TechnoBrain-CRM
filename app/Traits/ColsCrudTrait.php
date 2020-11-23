<?php

namespace App\Traits;

use Carbon\Carbon;

trait ColsCrudTrait {
    //array 
    public function arrayCol($name, $label)
    {
        $arrCol = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'array'
        ];

        return $arrCol;
    }

    //array count 
    public function arrayCountCol($name, $label, $suffix = 'items')
    {
        $arrayCount = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'array_count',
            'suffix' => $suffix, // if you want it to show "2 options" instead of "2 items"
        ];
        return $arrayCount;
    }

    //boolean 
    public function booleanCol($name, $label, $options = [0 => 'No', 1 => 'Yes'])
    {
        $boolean = [
            'name' => $name,
            'label' => $label,
            'type' => 'boolean',
            // optionally override the Yes/No texts
            'options' => $options
        ];
        return $boolean;
    }

    //check 
    public function checkCol($name, $label)
    {
        $check = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'check'
        ];

        return $check;
    }

    //closure 
    public function closureCol($name, $label, $func)
    {
        $closure = [
            'name' => $name,
            'label' => $label,
            'type' => 'closure',
            'function' => $func
            // 'function' => function ($entry) {
            //     return 'Created on ' . $entry->created_at;
            // }
        ];

        $closure;
    }

    //date col 
    public function dateCol($name, $label)
    {
        $dateCol = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => "date",
            // 'format' => 'l j F Y', // use something else than the base.default_date_format config value
        ];

        return $dateCol;
    }

    //datetime 
    public function datetimeCol($name, $label)
    {
        $datetime = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => "datetime",
            // 'format' => 'l j F Y H:i:s', // use something else than the base.default_datetime_format config value
        ];
        return $datetime;
    }

    //email 
    public function emailCol($name, $label)
    {
        $email = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'email',
            // 'limit' => 500, // if you want to truncate the text to a different number of characters
        ];

        return $email;
    }

    //image col
    public function imageCol($name, $label, $height = "50px", $width = "50px")
    {
        $image = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'image',
            // 'prefix' => 'folder/subfolder/',
            // optional width/height if 25px is not ok with you
            'height' => $width,
            'width' => $height,
        ];

        return $image;
    }

    //markdown 
    public function markdownCol($name, $label)
    {
        $markdown = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'markdown',
        ];

        return $markdown;
    }

    //model function 
    public function modelFunctionCol($name, $label, $func, $params = null)
    {
        if($params === null)
        {
            $modelFunc = [
                // run a function on the CRUD model and show its return value
                'name' => $name,
                'label' => $label, // Table column heading
                'type' => "model_function",
                'function_name' => $func, // the method in your Model
                // 'limit' => 100, // Limit the number of characters shown
            ];
        }
        else 
        {
            $modelFunc = [
                // run a function on the CRUD model and show its return value
                'name' => $name,
                'label' => $label, // Table column heading
                'type' => "model_function",
                'function_name' => $func, // the method in your Model
                'function_parameters' => $params, // pass one/more parameters to that method
                // 'limit' => 100, // Limit the number of characters shown
            ];
        }
        

        return $modelFunc;
    }

    //model_function_attribute 
    public function modelFunctionAttributeCol($name, $label, $func, $attribute, $params = null)
    {

        $modelFuncAtrr = [
            'name' => $name,
            'label' => $label, // Table column heading
            'type' => "model_function_attribute",
            'function_name' => $func, // the method in your Model
            // 'function_parameters' => [$one, $two], // pass one/more parameters to that method
            'attribute' => $attribute,
            // 'limit' => 100, // Limit the number of characters shown
        ];

        if($params !== null)
        {
            array_push($modelFuncAtrr, "function_parameters => $params");
        };

        return $modelFuncAtrr;
    }

    //multidimensional_array 
    public function multidimensionalArrayCol($name, $label, $visible)
    {
        $multi = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'multidimensional_array',
            'visible_key' => $visible // The key to the attribute you would like shown in the enumeration
        ];
        
        return $multi;
    }

    //number 
    public function numberCol($name, $label, $prefix = null, $suffix = null)
    {
        $number = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => "number",
            // 'prefix' => "$",
            // 'suffix' => " EUR",
            // 'decimals' => 2,
            // 'dec_point' => ',',
            // 'thousands_sep' => '.',
            // decimals, dec_point and thousands_sep are used to format the number;
            // for details on how they work check out PHP's number_format() method, they're passed directly to it;
            // https://www.php.net/manual/en/function.number-format.php
        ];

        if($prefix !== null)
        {
            $number = [
                'name' => $name, // The db column name
                'label' => $label, // Table column heading
                'type' => "number",
                'prefix' => $prefix,
                // 'suffix' => " EUR",
                // 'decimals' => 2,
                // 'dec_point' => ',',
                // 'thousands_sep' => '.',
                // decimals, dec_point and thousands_sep are used to format the number;
                // for details on how they work check out PHP's number_format() method, they're passed directly to it;
                // https://www.php.net/manual/en/function.number-format.php
            ];
        }

        if($suffix !== null)
        {
            $number = [
                'name' => $name, // The db column name
                'label' => $label, // Table column heading
                'type' => "number",
                // 'prefix' => "$",
                'suffix' => $suffix,
                // 'decimals' => 2,
                // 'dec_point' => ',',
                // 'thousands_sep' => '.',
                // decimals, dec_point and thousands_sep are used to format the number;
                // for details on how they work check out PHP's number_format() method, they're passed directly to it;
                // https://www.php.net/manual/en/function.number-format.php
            ];
        }

        if($suffix !== null && $prefix === null )
        {
            $number = [
                'name' => $name, // The db column name
                'label' => $label, // Table column heading
                'type' => "number",
                'prefix' => $prefix,
                'suffix' => $suffix,
                // 'decimals' => 2,
                // 'dec_point' => ',',
                // 'thousands_sep' => '.',
                // decimals, dec_point and thousands_sep are used to format the number;
                // for details on how they work check out PHP's number_format() method, they're passed directly to it;
                // https://www.php.net/manual/en/function.number-format.php
            ];
        }

        return $number;
    }

    //radio col 
    public function radioCol($name, $label, array $options)
    {
        $radio = [
            'name'        => $name,
            'label'       => $label,
            'type'        => 'radio',
            'options'     => $options
        ];
        
        return $radio;
    }

    //row col 
    public function rowNumberCol($crud)
    {
        $crud->addColumn([
            'name' => 'row_number',
            'type' => 'row_number',
            'label' => '#',
            'orderable' => false,
        ])->makeFirstColumn();
    }

    //text co 
    public function textCol($name, $label, $limit = 120)
    {
        $textCol = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            // 'prefix' => "Name: ",
            // 'suffix' => "(user)",
            'limit' => $limit, // character limit; default is 50;
        ];
        
        return $textCol;
    }

    //select 1-n
    public function selectOneManyCol($name, $label, $entity, $attribute, $model)
    {
        $select = [  // Select2
            'label' => $label,
            'type' => 'select',
            'name' => $name, // the db column for the foreign key
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => $attribute, // foreign key attribute that is shown to user
            'model' => $model, // foreign key model
        ];
        return $select;
    }

    //video col
    public function videoCol($name, $label)
    {
        $vid = [
            'name' => $name,
            'type' => 'video',
            'label' => $label
        ];

        return $vid;
    }

    //table col
    public function tableCol($name, $label, $cols)
    {
        $table = [
            'name' => $name,
            'label' => $label,
            'type' => 'table',
            'columns' => $cols,
        ];
        return $table;
    }

    //multiple images from array 
    public function arrayImagesCol($name, $label)
    {
        $arr = [
            'name' => $name,
            'label' => $label,
            'type' => 'upload_multiple',
            // 'disk' => 'public', // filesystem disk if you're using S3 or something custom
        ];

        return $arr;
    }

    //select multiple 
    public function selectMultipleCol($name, $label, $entity, $attribute, $model)
    {
        $mul = [
            // n-n relationship (with pivot table)
            'label' => $label, // Table column heading
            'type' => "select_multiple",
            'name' => $name, // the method that defines the relationship in your Model
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => $attribute, // foreign key attribute that is shown to user
            'model' => $model, // foreign key model
        ];

        return $mul;
    }

    //view col 
    public function viewCol($name, $label, $view)
    {
        $view = [
            'name' => $name, // The db column name
            'label' => $label, // Table column heading
            'type' => 'view',
            'view' => $view, // or path to blade file
        ];
        return $view;
    }

}
