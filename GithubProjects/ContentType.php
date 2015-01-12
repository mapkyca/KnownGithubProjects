<?php

    namespace IdnoPlugins\GithubProjects {

        class ContentType extends \Idno\Common\ContentType {

            public $title = 'GithubProjects';
            public $category_title = 'GithubProjects';
            public $entity_class = 'IdnoPlugins\\GithubProjects\\GithubProject';
            public $indieWebContentType = array('text');

        }

    }