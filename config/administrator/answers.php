<?php

return [
    'title' => 'Answers',

    'single' => 'answer',

    'model' => 'App\Answer',

    /**
     * The display columns
     */
    'columns' => [
        'id' => [
            'title' => '#'
        ],
        'description' => [
            'title' => 'Answer',
        ],
        'user_id' => [
            'title' => 'Author',
            'relationship' => 'user',
            'select' => '(:table).name',
        ],
        'question_id' => [
            'title' => 'Question',
            'relationship' => 'question',
            'select' => '(:table).title',
        ],
    ],

    /**
     * The editable fields
     */
    'edit_fields' => [
        'description' => [
            'title' => 'Answer',
            'type' => 'textarea'
        ],
        'user' => [
            "title" => 'Author',
            "type" => 'relationship',
            "name_field" => 'name'
        ],
        'question'  => [
            'title' => 'Question',
            'type' => 'relationship',
            "name_field" => 'title'
        ],
    ],

    /**
     * The filter fields
     *
     * @type array
     */
    'filters' => [
        'id',
        'user' => [
            'title' => 'Author',
            'type' => 'relationship',
            'name_field' => 'name'
        ],
        'question' => [
            'title' => 'Question',
            'type' => 'relationship',
            'name_field' => 'title'
        ],
    ],
];
