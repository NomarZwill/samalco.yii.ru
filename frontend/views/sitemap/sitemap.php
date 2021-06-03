<?php
use common\models\Pages;
use common\models\Slices;


echo <<<XML
<?xml version="1.0" encoding="UTF-8"?>
    <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"> 
        <url>
            <loc>$host</loc>
        </url>
XML;
        if ($main_subdomain){
            echo <<<XML
                <url>
                    <loc>https://samalco.ru/teh_doc/</loc>
                </url>
            XML;
        }

        if ($main_subdomain){

            foreach (Pages::find()->where(['parent_id' => 2])->all() as $page){
                echo <<<XML
                <url>
                    <loc>https://samalco.ru/teh_doc/$page->alias/</loc>
                </url>
                XML;

                foreach (Pages::find()->where(['parent_id' => $page->id])->all() as $pageSecondLevel){
                    echo <<<XML
                    <url>
                        <loc>https://samalco.ru/teh_doc/$page->alias/$pageSecondLevel->alias/</loc>
                    </url>
                    XML;
                }
            }
        }

        echo <<<XML
        <url>
            <loc>$host/katalog/</loc>
        </url>
        <url>
            <loc>$host/katalog/alyuminievye_profili/</loc>
        </url>
        <url>
            <loc>$host/katalog/alyuminievaya_shina/</loc>
        </url>
        <url>
            <loc>$host/katalog/alyuminievye_pokovki_i_shtampovki/</loc>
        </url>
        <url>
            <loc>$host/katalog/alyuminieviy_profnastil/</loc>
        </url>
        XML;

        foreach (Slices::find()->where(['parent_alias' => ''])->all() as $mainSlice){
            echo <<<XML
            <url>
                <loc>$host/katalog/$mainSlice->alias/</loc>
            </url>
            XML;

            if (Slices::find()->where(['parent_alias' => $mainSlice->alias])->exists()){

                foreach (Slices::find()->where(['parent_alias' => $mainSlice->alias])->all() as $firstLevelSlice){
                    echo <<<XML
                    <url>
                        <loc>$host/katalog/$mainSlice->alias/$firstLevelSlice->alias/</loc>
                    </url>
                    XML;
                }    
            }
        }

        foreach (Slices::find()->where(['parent_alias' => 'alyuminievye_profili'])->all() as $mainSlice){
            echo <<<XML
            <url>
                <loc>$host/katalog/alyuminievye_profili/$mainSlice->alias/</loc>
            </url>
            XML;

            if (Slices::find()->where(['parent_alias' => $mainSlice->alias])->exists()){

                foreach (Slices::find()->where(['parent_alias' => $mainSlice->alias])->all() as $firstLevelSlice){
                    echo <<<XML
                    <url>
                        <loc>$host/katalog/alyuminievye_profili/$mainSlice->alias/$firstLevelSlice->alias/</loc>
                    </url>
                    XML;
                }    
            }

    
        }

        echo <<<XML
        <url>
            <loc>$host/delivery/</loc>
        </url>
        <url>
            <loc>$host/kontact/</loc>
        </url>
        <url>
            <loc>$host/filialy/</loc>
        </url>
        XML;

        if ($main_subdomain){
            echo <<<XML
                <url>
                    <loc>https://samalco.ru/agreement/</loc>
                </url>
            XML;
        }

echo <<<XML
    </urlset>
XML;
?>