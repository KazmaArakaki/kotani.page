<?php
declare(strict_types=1);

use Cake\Core\Configure;

//Configure::write('App.fullBaseUrl', php_uname('n'));

Configure::write('Log.debug.file', 'cli-debug');
Configure::write('Log.error.file', 'cli-error');

