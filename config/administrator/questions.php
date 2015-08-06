<?php

return [
    'title' => 'Questions',

    'single' => 'question',

    'model' => 'App\Question',

    /**
     * The display columns
     */
    'columns' => [
        'id' => [
            'title' => '#'
        ],
        'title' => [
            'title' => 'Title',
        ],
        'description' => [
            'title' => 'Description',
        ],
        'user_id' => [
            'title' => 'Author',
            'relationship' => 'user',
            'select' => '(:table).name',
        ],
        'active'  => [
            'title' => 'Active',
            'output' => function ($value) {
                return ($value) ? 'Yes' : 'No';
            }
        ],
    ],

    /**
     * The editable fields
     */
    'edit_fields' => [
        'title' => [
            'title' => 'Title',
            'type' => 'text'
        ],
        'description' => [
            'title' => 'Description',
            'type' => 'textarea'
        ],
        'user' => [
            "title" => 'Author',
            "type" => 'relationship',
            "name_field" => 'name'
        ],
        'active'  => [
            'title' => 'Active',
            'type' => 'bool',
        ],
    ],

    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => [
        'id',
        'title' => [
            'title' => 'Title',
        ],
        'user' => [
            'title' => 'Author',
            'type' => 'relationship',
        ],
    ],
];
