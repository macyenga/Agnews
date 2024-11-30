<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
       'meta' => [
    /*
     * The default configurations to be used by the meta generator.
     */
    'defaults' => [
        'title' => 'Amakuru Agezweho | '.config('app.name'), // set false to totally remove
        'titleBefore' => true, // Displays 'Amakuru Agezweho | Agezweho - Page Title' structure
        'description' => 'Menya amakuru agezweho akakanya, inkuru zigezweho, n’ibiri kubera muri Kigali, u Rwanda, no ku isi yose kuri '.config('app.name').'.', // set false to totally remove
        'separator' => ' | ',
'keywords' => [
                'agezweho', 'amakuru agezweho akakanya', 'amakuru agezweho', 'amazina agezweho', 'amafoto agezweho',
                'igituba amafoto mashya agezweho', 'rushyashya amakuru agezweho', 'amakuru agezweho mu rwanda', 
                'www.igihe.com amakuru agezweho', 'agezweho akakanya', 'amazina agezweho wakwita umwana w\'umuhungu', 
                'amazina agezweho y\'abakobwa', 'amazina ya kinyarwanda agezweho', 'amaribaya agezweho', 
                'amakuru agezweho bwiza.com', 'ubusobanuro bw\'amazina agezweho', 'amakuru agezweho burundi', 
                'amakuru agezweho mu burundi', 'amakuru agezweho muri ukraine', 'amakuru agezweho ku isi', 
                'bwiza.com amakuru agezweho rwanda', 'bwiza amakuru agezweho', 'bbc gahuzamiryango amakuru agezweho', 
                'btn tv amakuru agezweho mu', 'bbc gahuza.com amakuru agezweho', 'amakuru agezweho mu burezi', 
                'ubusobanuro bw\'amazina agezweho abahungu', 'amazina y\'abana b\'abahungu agezweho', 'agezweho congo', 
                'amakuru agezweho.com', 'amakuru agezweho congo', 'amakuru agezweho m23', 'amakuru agezweho ku isi yose', 
                'amakuru agezweho akakanya muri congo', 'amakuru agezweho yo muri congo', 'amakuru agezweho ku gihe.com', 
                'umuseke.com amakuru agezweho', 'bwiza.com amakuru agezweho', 'rugali.com amakuru agezweho', 
                'www.ukwezi.com amakuru agezweho', 'amaribaya agezweho dresses', 'amazina agezweho y\'abakobwa', 
                'amakuru agezweho akakanya', 'amakuru agezweho', 'amakuru agezweho m23', 'amakuru agezweho umuseke em23', 
                'agezweho muri apr fc', 'amakuru agezweho nonaha', 'amakuru agezweho muri apr fc', 'amakuru agezweho ya fc barcelona', 
                'amakuru agezweho muri afurika', 'veritasinfo.fr amakuru agezweho', 'amakuru agezweho ya politiki', 
                'rwanda paparazzi amakuru agezweho', 'amakuru agezweho rubavu', 'amakuru agezweho rwanda', 
                'amakuru agezweho rdc', 'amakuru agezweho rba', 'urutonde rw amazina agezweho', 
                'radio rwanda - amakuru agezweho', 'umuseso com amakuru agezweho kigali today', 
                'radio rwanda amakuru agezweho today', 'amakuru agezweho kuri tv1', 'amakuru agezweho uyumunsi', 
                'amakuru agezweho ubu', 'amakuru agezweho umuseke', 'amakuru agezweho uganda', 'umuseke amakuru agezweho', 
                'amazina agezweho wakwita umwana', 'amazina agezweho wakwita umwana wumukobwa', 
                'amakuru agezweho mu rwanda na congo', 'umuseke.com amakuru agezweho mashya kuri', 
                'veritas info amakuru agezweho', 'umuryango amakuru agezweho', 'amakuru agezweho akakanya rwanda', 
                'amakuru agezweho mu rwanda', 'amakuru agezweho ku rwanda', 'amakuru agezweho mu burundi', 
                'amakuru agezweho muri ukraine', 'amakuru agezweho mu burezi', 'amakuru agezweho ya sport', 
                'amakuru agezweho muri sport', 'amakuru agezweho murwanda', 'amakuru agezweho mu gihugu', 
                'amakuru agezweho mu burundi', 'amakuru agezweho muri congo', 'amakuru agezweho muburundi'
            ], // Comprehensive list of keywords for SEO        'canonical' => 'full', // Uses full URL for the canonical link
        'robots' => 'index, follow', // Allows indexing and following of pages
    ],
    /*
     * Webmaster tags are always added.
     */
    'webmaster_tags' => [
        'google' => 'YOUR_GOOGLE_VERIFICATION_CODE',
        'bing' => 'YOUR_BING_VERIFICATION_CODE',
        'alexa' => null,
        'pinterest' => null,
        'yandex' => null,
        'norton' => null,
    ],

    'add_notranslate_class' => false,
],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => ' Agezweho | '.config('app.name'), // set false to totally remove
            'description' => 'Menya amakuru agezweho akakanya, inkuru zigezweho, n’ibiri kubera muri Kigali, u Rwanda, no ku isi yose kuri '.config('app.name').'.', // set false to totally remove
            'url' => false, // Set null for using Url::current(), set false to totally remove
            'type' => false,
            'site_name' => false,
            'images' => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@YourTwitterHandle',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => 'Agezweho | '.config('app.name'), // set false to totally remove
            'description' => 'Menya amakuru agezweho akakanya, inkuru zigezweho, n’ibiri kubera muri Kigali, u Rwanda, no ku isi yose kuri '.config('app.name').'.', // set false to totally remove
            'url' => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to totally remove
            'type' => 'WebPage',
            'images' => [],
        ],
    ],
];
