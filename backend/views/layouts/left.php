<aside class="main-sidebar">

    <section class="sidebar">

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Филиалы', 'icon' => 'circle-o', 'url' => ['/branch/?']],
                    ['label' => 'Субдомены', 'icon' => 'circle-o', 'url' => ['/subdomen/?']],
                    ['label' => 'Страницы', 'icon' => 'circle-o', 'url' => ['/pages/?']],
                    ['label' => 'Категории срезов', 'icon' => 'circle-o', 'url' => ['/slices/?']],
                    ['label' => 'Срезы', 'icon' => 'circle-o', 'url' => ['/slices/?'],
                        'items' => [
                            ['label' => 'Алюминиевые прутки', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=alyuminievye_prutki']],
                            ['label' => 'Алюминиевая лента', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=alyuminievye_lenty']],
                            ['label' => 'Алюминиевые трубы', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=alyuminievye_truby']],
                            ['label' => 'Алюминиевые плиты', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=alyuminievye_plity']],
                            ['label' => 'Алюминиевые листы', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=alyuminievye_listy']],
                            ['label' => 'Алюминиевый двутавр', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=dvutavr']],
                            ['label' => 'Прямоугольный профиль', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=pryamougolnik']],
                            ['label' => 'Алюминиевый швеллер', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=shveller']],
                            ['label' => 'Алюминиевый тавр', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=tavr']],
                            ['label' => 'Алюминиевый уголок', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=ugolok']],
                            ['label' => 'Алюминиевые листы рифленые', 'icon' => 'circle-o', 'url' => ['/slices/category/?parent_alias=riflenye']],
                        ]
                    ],
                    ['label' => 'Статические блоки', 'icon' => 'circle-o', 'url' => ['/static-block/?']],
                ],
            ]
        ) ?>

    </section>

</aside>
