<?php

/**
 * @TODO Change links
 */
return [
    'cache' => [
        'ttl' => 3600
    ],
    'providers' => [
        /**
         * HideMy.name
         *
         * https://ya.ht/qCM
         */
        'hidemyname' => [
            /**
             * After receiving the code, log in to the site via a special form:
             * https://hidemy.name/api/proxylist.txt?out=plain&lang=en&utf
             */
            'code' => env('HIDEMYNAME_CODE', ''),

            /**
             * Filter proxies by anonymity level.
             *
             * 1 — No: The remote server knows your IP and knows that you are using a proxy.
             *
             * 2 — Low: The remote server does not know your IP, but knows that you are using a proxy.
             *
             * 3 — Medium: The remote server knows you are using a proxy and thinks it knows your IP,
             * but it is not yours (these are usually multihomed proxies showing the incoming interface
             * to the remote server as REMOTE_ADDR).
             *
             * 4 — High: The remote server does not know your IP address and cannot see headers from
             * the proxy information family. Therefore, there is no direct evidence that you are
             * using a proxy.
             */
            'anon' => env('HIDEMYNAME_ANONYMITY_LEVEL', '4'),

            /**
             * Filter proxy type.
             *
             * h — HTTP: regular proxies that support HTTP requests. You can use them to view websites and download
             *      files over HTTP.
             * s — HTTPS: Also called SSL-enabled proxy servers. Allow you to view HTTPS sites. Using specialized
             *      programs, they can be used for any protocol, like SOCKS proxy servers.
             * 4 — Socks 4: Proxies that support the SOCKS protocol version 4. They can be used to connect over
             *      TCP / IP protocol to any address and port.
             * 5 — Socks 5: Includes all the features of version 4. Additional features include use of the UDP Protocol,
             *      the ability to make DNS requests through a proxy, and use of the BIND method to open the port for
             *      incoming connections.
             */
            'type' => env('HIDEMYNAME_TYPE', '45'),
        ],

        /**
         * RSocks.net
         * https://rsocks.net/
         *
         * RSocks registration: https://ya.ht/9Qfv
         */
        'rsocks' => [
            'id' => env('RSOCKS_ID', ''),
            'key' => env('RSOCKS_KEY', ''),
        ],
    ]
];