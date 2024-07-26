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
            'submenu' => [],
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
