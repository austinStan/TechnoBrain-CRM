<?php

namespace App\Traits;

use Carbon\Carbon;

trait FieldsCrudTrait {

    
    //fake fields
    public function fakeField($name, $label, $type, $store_in = "extras", $others)
    {
        $extras = [
            'name' => $name,
            'label' => ucfirst($label),
            'type' => $type,
            'fake' => true,
            'store_in' => $store_in,
            $others
        ];  
        return $extras;      
    }

    //address_algolia
    public function addressAlgolia($name, $label, $store_as_json = false)
    {
        $address = [   // Address
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'address_algolia',
            // optional
            'store_as_json' => $store_as_json
        ];

        return $address;
    }

    //address_google  ie set google api key in services
    public function addressGoogle($name, $label, $store_as_json, ...$others)
    {
        $google = [   // Address
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'address_google',
            // optional
            'store_as_json' => $store_as_json
        ];

        return $google;
    }

    //browse by finder
    public function browse($name, $label)
    {
        $image = [   // Browse
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'browse'
        ];

        return $image;
    }

    //browse_multiple 
    public function browseMultiple($name, $label)
    {
        $multiple = [   // Browse multiple
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'browse_multiple',
            // 'multiple' => true, // enable/disable the multiple selection functionality
            // 'mime_types' => null, // visible mime prefixes; ex. ['image'] or ['application/pdf']
        ];

        return $multiple;
    }

    //checkbox
    public function checkbox($name, $label)
    {
        $checkbox = [   // Checkbox
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'checkbox'
        ];

        return $checkbox;
    }

    //checklist 
    public function checklist($name, $label, $entity, $attribute, $model, $pivot = true)
    {
        $checklist = [
            'label'     => $label,
            'type'      => 'checklist',
            'name'      => $name,
            'entity'    => $entity,
            'attribute' => $attribute,
            'model'     => $model,
            'pivot'     => $pivot,
        ];

        return $checklist;
    }

    //checklist_dependency
    public function checklistDependency($name, $label, $methodName, $priLabel, $priMethodName, $priAttribute, $priModel, $secLabel, $secMethodName, $secAttribute, $secModel)
    {
        $checklist_dependency = [// two interconnected entities
                                'label'             => $label,
                                'field_unique_name' => $name,
                                'type'              => 'checklist_dependency',
                                'name'              => $methodName, // the methods that defines the relationship in your Model
                                'subfields'         => [
                                    'primary' => [
                                        'label'            => $priLabel,
                                        'name'             => $priMethodName, // the method that defines the relationship in your Model
                                        'entity'           => $priMethodName, // the method that defines the relationship in your Model
                                        'entity_secondary' => $secMethodName, // the method that defines the relationship in your Model
                                        'attribute'        => $priAttribute, // foreign key attribute that is shown to user
                                        'model'            => $priModel, // foreign key model
                                        'pivot'            => true, // on create&update, do you need to add/delete pivot table entries?]
                                        'number_columns'   => 3, //can be 1,2,3,4,6
                                    ],
                                    'secondary' => [
                                        'label'          => $secLabel,
                                        'name'           => $secMethodName, // the method that defines the relationship in your Model
                                        'entity'         => $secMethodName, // the method that defines the relationship in your Model
                                        'entity_primary' => $priMethodName, // the method that defines the relationship in your Model
                                        'attribute'      => $secAttribute, // foreign key attribute that is shown to user
                                        'model'          => $secModel, // foreign key model
                                        'pivot'          => true, // on create&update, do you need to add/delete pivot table entries?]
                                        'number_columns' => 3, //can be 1,2,3,4,6
                                    ],
                                ],];
        return $checklist_dependency;
    }

    //ckeditor 
    public function ckeditor($name, $label)
    {
        $ckeditor = [   // CKEditor
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'ckeditor',
            // optional:
            'extra_plugins' => ['oembed', 'widget'],
            'options' => [
                'autoGrow_minHeight' => 200,
                'autoGrow_bottomSpace' => 50,
                'removePlugins' => 'resize,maximize',
            ]
        ];
        return $ckeditor;
    }

    //color 
    public function color($name, $label)
    {
        $color = [   // Color
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'color'
        ];

        return $color;
    }

    //color_picker 
    public function colorPicker($name, $label)
    {
        $color_picker = [   // color_picker
            'label' => $name,
            'name' => $name,
            'type' => 'color_picker',
            'color_picker_options' => ['customClass' => 'custom-class']
        ];

        return $color_picker;
    }

    //custom_html 
    public function customHtml($name, $value)
    {
        $custom_html = [   // CustomHTML
            'name' => $name,
            'type' => 'custom_html',
            'value' => $value
        ]; 
        return $custom_html;
    }

    //date 
    public function date($name, $label)
    {
        $date = [   // Date
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'date'
        ];
        return $date;
    }

    //date picker 
    public function datePicker($name, $label)
    {
        $datePicker = [   // date_picker
            'name' => $name,
            'type' => 'date_picker',
            'label' => ucfirst($label),
            // optional:
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format' => 'dd-mm-yyyy',
                'language' => 'en'
            ],
        ];

        return $datePicker;
    }

    //date range 
    public function dateRange($name, $label, $start_date, $end_date)
    {
        $dateRange = [
                        'name' => $name, // a unique name for this field
                        'start_name' => $start_date, // the db column that holds the start_date
                        'end_name' => $end_date, // the db column that holds the end_date
                        'label' => ucfirst($label),
                        'type' => 'date_range',
                        // OPTIONALS
                        'start_default' => Carbon::now(), // default value for start_date
                        'end_default' => Carbon::now()->addDays(5), // default value for end_date
                        'date_range_options' => [ // options sent to daterangepicker.js
                            'timePicker' => true,
                            'locale' => ['format' => 'DD/MM/YYYY HH:mm']
                        ]
                    ];
        return $dateRange;
    }

    //datetime 
    public function dateTime($name, $label)
    {
        $dateTime = [   // DateTime
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'datetime'
        ];

        return $dateTime;
    }

    //datetime picker  requires a mutator
    public function dateTimePicker($name, $label)
    {
        $dateTimePicker = [   // DateTime
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'datetime_picker',
            // optional:
            'datetime_picker_options' => [
                'format' => 'DD/MM/YYYY HH:mm',
                'language' => 'en'
            ],
            'allows_null' => true,
            // 'default' => '2017-05-12 11:59:59',
        ];

        return $dateTimePicker;
    }

    //email 
    public function email($name, $label)
    {
        $email = [   // Email
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'email'
        ];

        return $email;
    }

    //enum 
    public function enum($name, $label)
    {
        $enum = [   // Enum
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'enum'
        ];

        return $enum;
    }

    //hidden 
    public function hidden($name, $value)
    {
        $hidden = [   // Hidden
            'name' => $name,
            'type' => 'hidden',
            'value' => $value
        ];

        return $hidden;
    }

    //icon picker 
    public function iconPicker($name, $label, $type = 'fontawesome')
    {
        $iconPicker = [
            'label' => ucfirst($label),
            'name' => $name,
            'type' => 'icon_picker',
            'iconset' => $type // options: fontawesome, glyphicon, ionicon, weathericon, mapicon, octicon, typicon, elusiveicon, materialdesign
        ];

        return $iconPicker;
    }

    //month  
    public function month($name, $label)
    {
        $month = [   // Month
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'month'
        ];

        return $month;
    }

    //number 
    public function number($name, $label, $prefix = '#', $suffix = '.00')
    {
        $number = [   // Number
            'name' => $name,
            'label' => ucfirst($label),
            'type' => 'number',
            // optionals
            // 'attributes' => ["step" => "any"], // allow decimals
            'prefix' => $prefix,
            'suffix' => $suffix,
        ];

        return $number;
    }

    //page or link 
    public function pageOrLink($name, $label)
    {
        $link = [   // PageOrLink
            'name' => $name,
            'label' => $label,
            'type' => 'page_or_link',
            'page_model' => '\Backpack\PageManager\app\Models\Page'
        ];

        return $link;
    }

    //password 
    public function password($name, $label)
    {
        $password = [   // Password
            'name' => $name,
            'label' => $label,
            'type' => 'password'
        ];

        return $password;
    }

    //radio 
    public function radio($name, $label, $options, $inline = false)
    {
        $radio = [
            'name'        => $name, // the name of the db column
            'label'       => $label, // the input label
            'type'        => 'radio',
            'options'     => $options,
            // optional
            'inline'      => $inline, // show the radios all on the same line?
        ];

        return $radio;
    }

    //range 
    public function range($name, $label)
    {
        $range = [   // Range
            'name' => $name,
            'label' => $label,
            'type' => 'range'
        ];

        return $range;
    }

    //select 1-n 
    public function selectOneMany($name, $label, $entity, $attribute, $model, $option = false)
    {
        $select = [  // Select2
            'label' => $label,
            'type' => 'select2',
            'name' => $name, // the db column for the foreign key
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => $attribute, // foreign key attribute that is shown to user
            'model' => $model, // foreign key model
            'option' => $option
            // 'options '   => (function ($query) {
            //     return $query->orderBy(' name ', ' ASC ')->where(' depth ', 1)->get();
            // }),
        ];
        return $select;
    }

    //select grouped 
    public function select2Grouped($name, $label, $entity, $attribute, $groupBy, $groupByAttribute, $groupByRelationBack)
    {
        $grouped = [ // select_grouped
            'label' => $label,
            'type' => 'select2_grouped', //https://github.com/Laravel-Backpack/CRUD/issues/502
            'name' => $name,
            'entity' => $entity,
            'attribute' => $attribute,
            'group_by' => $groupBy, // the relationship to entity you want to use for grouping
            'group_by_attribute' => $groupByAttribute, // the attribute on related model, that you want shown
            'group_by_relationship_back' => $groupByRelationBack, // relationship from related model back to this model
        ];

        return $grouped;
    }

    //select n-n 
    public function selectManyToMany($name, $label, $entity, $attribute, $model, $option = null)
    {
        $many = [       // Select2Multiple = n-n relationship (with pivot table)
                    'label' => $label,
                    'type' => 'select2_multiple',
                    'name' => $name, // the method that defines the relationship in your Model
                    'entity' => $entity, // the method that defines the relationship in your Model
                    'attribute' => $attribute, // foreign key attribute that is shown to user
                    'model' => $model, // foreign key model
                    'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
                    'select_all' => true, // show Select All and Clear buttons?
                    'option' => $option

                    // optional
                    // 'options'   => (function ($query) {
                    //     return $query->orderBy('name', 'ASC')->where('depth', 1)->get();
                    // }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
                ];

        return $many;
    }

    /**
     * select2 nest 
     * a children() relationship pointing to itself
     * the usual lft, rgt, depth attributes;
     */
    public function select2Nested($name, $label, $entity, $model)
    {
        $select = [ // select2_nested
            'name' => $name,
            'label' => $label,
            'type' => 'select2_nested',
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => $name, // foreign key attribute that is shown to user
            'model' => $model, // force foreign key model
        ];

        return $select;
    }

    //select_and_order 
    public function selectAndOrder($name, $label, $options)
    {
        $order = [ // select_and_order
                    'name' => $name,
                    'label' => $label,
                    'type' => 'select_and_order',
                    'options' => $options
                    /**
                     * 'options' => [1 => "Option 1",2 => "Option 2"],
                     * 'options' => Product::get()->pluck('title','id')->toArray(),
                     */
                ];
        return $order;
    }

    //select from array 
    public function selectFromArray($name, $label, array $options, $multiple = false)
    {
        $arr = [ // select_from_array
            'name' => $name,
            'label' => $label,
            'type' => 'select2_from_array',
            'options' => $options,
            'allows_null' => false,
            'allows_multiple' => $multiple, // OPTIONAL; needs you to cast this to array in your model;
        ];

        return $arr;
    }

    //select2_from_ajax 
    public function select2FromAjax($name, $label, $entity, $attribute, $model, $url, $placeholder)
    {
        $select2 = [
            // 1-n relationship
            'label' => $label, // Table column heading
            'type' => "select2_from_ajax",
            'name' => $name, // the column that contains the ID of that connected entity
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => $attribute, // foreign key attribute that is shown to user
            'model' => $model, // foreign key model
            'data_source' => url($url), // url to controller search function (with /{id} should return model)
            'placeholder' => $placeholder, // placeholder for the select
            'minimum_input_length' => 2, // minimum characters to type before querying results
            'select_all' => true,
            // 'dependencies'         => [‘category’], // when a dependency changes, this select2 is reset to null
            // ‘method'                    => ‘GET’, // optional - HTTP method to use for the AJAX call (GET, POST)
            // 'include_all_form_fields'  => false, // optional - only send the current field through AJAX (for a smaller payload if you're not using multiple chained select2s)
        ];

        return $select2;
    }

    //select2_from_ajax_multiple 
    public function select2FromAjaxMultiple($name, $label, $entity, $attribute, $model, $url, $placeholder)
    {
        $select2 = [
            // n-n relationship
            'label' => $label, // Table column heading
            'type' => "select2_from_ajax_multiple",
            'name' => $name, // the column that contains the ID of that connected entity
            'entity' => $entity, // the method that defines the relationship in your Model
            'attribute' => $attribute, // foreign key attribute that is shown to user
            'model' => $model, // foreign key model
            'data_source' => url($url), // url to controller search function (with /{id} should return model)
            'placeholder' => $placeholder, // placeholder for the select
            'minimum_input_length' => 0, // minimum characters to type before querying results
            'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
            // 'include_all_form_fields'  => false, // optional - only send the current field through AJAX (for a smaller payload if you're not using multiple chained select2s)
        ];

        return $select2;
    }

    //table 
    public function table($name, $label, $entity, $options, $min = 0, $max = 5)
    {
        $table = [ // Table
            'name' => $name,
            'label' => $label,
            'type' => 'table',
            'entity_singular' => $entity, // used on the "Add X" button
            'columns' => $options,
            'max' => $max, // maximum rows allowed in the table
            'min' => $min, // minimum rows allowed in the table
        ];

        return $table;
    }

    //text 
    public function text($name, $label, $hint = "", $placeholder = 'Input')
    {
        $text = [ // Text
            'name' => $name,
            'label' => $label,
            'type' => 'text',

            // optional
            //'prefix' => '',
            //'suffix' => '',
            //'default'    => 'some value', // default value
            'hint'       => $hint, // helpful text, show up after input
            //'attributes' => [
            'placeholder' => $placeholder,
            //'class' => 'form-control some-class'
            //], // extra HTML attributes and values your input might need
            //'wrapperAttributes' => [
            //'class' => 'form-group col-md-12'
            //], // extra HTML attributes for the field wrapper - mostly for resizing fields 
            //'readonly'=>'readonly',
        ];
        return $text;
    }

    //textarea
    public function textarea($name, $label)
    {
        $textarea = [   // Textarea
            'name' => $name,
            'label' => $label,
            'type' => 'textarea'
        ];

        return $textarea;
    }

    //time 
    public function time($name, $label)
    {
        $time = [   // Time
            'name' => $name,
            'label' => $label,
            'type' => 'time'
        ];
        return $time;
    }

    //upload
    public function upload($name, $label)
    {
        $upload = [   // Upload
            'name' => $name,
            'label' => $label,
            'type' => 'upload',
            'upload' => true,
             // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
        ];

        return $upload;
    }

    //upload multiple 
    public function uploadMultiple($name, $label)
    {
        $upload = [   // Upload
            'name' => $name,
            'label' => $label,
            'type' => 'upload_multiple',
            'upload' => true,
            // if you store files in the /public folder, please ommit this; if you store them in /storage or S3, please specify it;
        ];
        return $upload;
    }

    //url 
    public function url($name, $label)
    {
        $url = [   // URL
            'name' => $name,
            'label' => $label,
            'type' => 'url'
        ];

        return $url;
    }

    //video 
    public function video($name, $label)
    {
        $video = [   // URL
            'name' => $name,
            'label' => $label,
            'type' => 'video',
        ];
        return $video;
    }
    
    //view  
    public function viewField($name, $view)
    {
        $view = [
            'name' => $name,
            'type' => 'view',
            'view' => $view
        ];
        return $view;
    } 
    
    //week 
    public function week($name, $label)
    {
        $week = [   // Week
            'name' => $name,
            'label' => $label,
            'type' => 'week'
        ];

        return $week;
    }

}