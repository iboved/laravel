<?php

return [
    'title' => 'Питання',

    'single' => 'Питання',

    'model' => 'App\Question',

    /**
     * The display columns
     */
    'columns' => [
        'id' => [
            'title' => '#'
        ],
        'title' => [
            'title' => 'Назва',
        ],
        'description' => [
            'title' => 'Опис',
        ],
        'user_id' => [
            "title" => "Автор",
            "output" => function($id){
                $user = \App\User::find($id);

                return $user->name;
            }
        ],
        'active'  => [
            'title' => 'Активне?',
            'output' => function ($value) {
                return ($value)?"Так":"Ні";
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
        ],
        'user' => [
            "title" => 'Автор',
            "type" => 'relationship',
            "name_field" => 'name'
        ],
        'active'  => [
            'type' => 'integer',
            'title' => 'Активный?',
        ],
    ],
];
