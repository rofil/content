<?php
return [
    'items' => [
        'beranda' => [
            'label'   => 'Konten <span class="caret"></span>',
            'url'     => '/',
            'options' => [
                'class' => 'dropdown',
            ],
            'attributes' => [
                'class'        =>'dropdown-toggle',
                'data-toggle'  =>'dropdown',
                'role'         =>'button',
                'aria-haspopup'=>"true",
                'aria-expanded'=>"false"
            ],
            'childs' => [
                'attributes' => [ 'class' => 'dropdown-menu' ],
                'items' => [
                    'news' => [
                        'label' => 'Manage News',
                        'route' => ['name'=> 'RofilContent.admin.news.index']
                    ],
                    'news-category' => [
                        'label' => 'Manage News Category',
                        'route' => ['name'=> 'RofilContent.admin.news-category.index']
                    ],
                    'topic' => [
                        'label' => 'Manage Topic',
                        'route' => ['name'=> 'RofilContent.admin.topic.index']
                    ],
                    'information' => [
                        'label' => 'Manage Information',
                        'route' => ['name'=> 'RofilContent.admin.information.index']
                    ],
                    
                ]
            ]
        ],
    ]
];