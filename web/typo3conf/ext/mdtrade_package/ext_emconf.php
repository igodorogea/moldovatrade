<?php

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Moldova Trade Package',
    'description' => 'This distribution extension extends bootstrap_package theme and allows you to customize it',
    'category' => 'templates',
    'version' => '1.0.0',
    'state' => 'stable',
    'createDirs' => 'fileadmin/user_upload/documents/,fileadmin/user_upload/images/,fileadmin/user_upload/news/',
    'clearcacheonload' => 1,
    'author' => 'Ivan Godorogea',
    'author_email' => 'igodorogea@gmail.com',
    'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'php' => '7.1.0-',
			'typo3' => '8.7.0-8.9.99',
			'bootstrap_package' => '8.7.0-8.99.99',
            'realurl' => '2.2.0-',
            'crawler' => '5.2.0-',
            // no dependency, only auto install
            'indexed_search' => '8.5.1-8.6.99',
            'scheduler' => '8.5.1-8.6.99',
            'recycler' => '8.5.1-8.6.99',
        ),
        'conflicts' => array(
            'fluidpages' => '*',
            'themes' => '*',
        ),
    ),
);
