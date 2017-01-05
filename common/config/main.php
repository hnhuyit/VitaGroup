<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
                  'dateFormat' => 'd-M-Y',
                  'datetimeFormat' => 'H:i:s d-M-Y ',
                  'timeFormat' => 'H:i:s',

                  'locale' => 'vi-VN', //your language locale
                  'defaultTimeZone' => 'Asia/Ho_Chi_Minh', // time zone
             ],
    ],
];