<?php

/*
 * First Child - Frog CMS behaviour
 *
 * Copyright (c) 2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   http://www.appelsiini.net/
 */

Plugin::setInfos(array(
    'id'          => 'redirect_to_first_child',
    'title'       => 'Redirect To First Child',
    'description' => 'Redirects page to its first child.',
    'version'     => '0.1.5',
    'license'     => 'MIT',
    'author'      => 'Jonne Haß/Mika Tuupola',
    'website'     => 'https://github.com/prellele/wolf_redirect_to_first_child',
    'update_url'  => 'https://raw.githubusercontent.com/prellele/wolf_redirect_to_first_child/master/plugin-versions.xml'
));

Behavior::add('Redirect_to_first_child', 'redirect_to_first_child/redirect_to_first_child.php');
