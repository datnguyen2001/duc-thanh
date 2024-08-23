<?php

return [
    'admin' => [
        [
            'name' => 'dashboard',
            'title' => 'Dashboard',
            'icon' => 'bi bi-grid',
            'route' => 'admin.index',
            'submenu' => [],
            'number' => 1
        ],
        [
            'name' => 'banner',
            'title' => 'Banner hình ảnh',
            'icon' => 'bi bi-grid',
            'route' => 'admin.banner.index',
            'params' => ['page' => 'home'],
            'submenu' => [
                [
                    'name' => 'home',
                    'title' => 'Trang chủ',
                    'route' => 'admin.banner.index',
                    'params' => ['page' => 'home']
                ],
                [
                    'name' => 'about',
                    'title' => 'Về Đức Thanh',
                    'route' => 'admin.banner.index',
                    'params' => ['page' => 'about']
                ],
                [
                    'name' => 'products',
                    'title' => 'Sản phẩm',
                    'route' => 'admin.banner.index',
                    'params' => ['page' => 'products']
                ],
                [
                    'name' => 'activities',
                    'title' => 'Hoạt động',
                    'route' => 'admin.banner.index',
                    'params' => ['page' => 'activities']
                ],
                [
                    'name' => 'contact',
                    'title' => 'Liên hệ',
                    'route' => 'admin.banner.index',
                    'params' => ['page' => 'contact']
                ],
                [
                    'name' => 'privacy',
                    'title' => 'Chính sách bảo mật',
                    'route' => 'admin.banner.index',
                    'params' => ['page' => 'privacy']
                ]
            ],
            'number' => 2
        ],
        [
            'name' => 'policy',
            'title' => 'Chính sách bảo mật',
            'icon' => 'bi bi-grid',
            'route' => 'admin.policy.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'introduce',
            'title' => 'Giới thiệu',
            'icon' => 'bi bi-grid',
            'route' => 'admin.introduce.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'setting',
            'title' => 'Cài đặt',
            'icon' => 'bi bi-grid',
            'route' => 'admin.setting.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'contact',
            'title' => 'Danh sách Liên hệ',
            'icon' => 'bi bi-grid',
            'route' => 'admin.contact.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'category',
            'title' => 'Danh mục sản phẩm',
            'icon' => 'bi bi-grid',
            'route' => 'admin.category.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'product',
            'title' => 'Sản phẩm',
            'icon' => 'bi bi-grid',
            'route' => 'admin.product.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'work',
            'title' => 'Quản lý hoạt động',
            'icon' => 'bi bi-grid',
            'route' => null,
            'submenu' => [
                [
                    'title' => 'Hình ảnh',
                    'route' => 'admin.image.index',
                    'name' => 'image'
                ],
                [
                    'title' => 'Video',
                    'route' => 'admin.video.index',
                    'name' => 'video'
                ],
            ],
            'number' => 2
        ],
        [
            'name' => 'meta',
            'title' => 'SEO',
            'icon' => 'bi bi-grid',
            'route' => 'admin.seo.index',
            'submenu' => [],
            'number' => 2
        ],
]
];
