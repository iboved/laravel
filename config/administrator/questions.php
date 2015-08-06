<?php

return [
    'title' => 'Question',

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
            'title' => 'Назва',
            'type' => 'text'
        ],
        'description' => [
            'title' => 'Короткий опис',
            'type' => 'textarea'
        ],
        'user' => [
            "title" => 'Автор',
            "type" => 'relationship',
            "name_field" => 'name'
        ],
        'active'  => [
            'type' => 'bool',
            'title' => 'Active',
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
