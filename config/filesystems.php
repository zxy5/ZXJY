<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [


        // 七牛云存储
        'qiniu' => [
            'driver' => 'qiniu',
            'domain' => 'http://p18p2qc2j.bkt.clouddn.com',
            //你的七牛域名，支持 http 和 https，也可以不带协议，默认 http
            'access_key'    => 'kGm0zerhCJTZkx8fE6j5Sqjhv6QQ_Nq0G873rV6F',                          //AccessKey
            'secret_key' => 'NMaiW0qTUb2WsyVU-XzrLap0zNWboULzE64dyIfo',                             //SecretKey
            'bucket' => 'qzsy',                                 //Bucket名字
        ],
        //在线教育平台的本地存储驱动
        'edu' => [
            'driver' => 'local',
            'root' => 'uploads',#等同于public/uploads目录
        ],

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),#等同于storage/app目录
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',#等同于storage/app/public的目录
        ],

        's3' => [
            'driver' => 's3',#亚马逊云存储驱动
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

    ],

];
