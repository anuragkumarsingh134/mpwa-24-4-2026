<?php

@Artisan::call('route:clear');
@Artisan::call('cache:clear');
@Artisan::call('config:clear');
@Artisan::call('view:clear');
@Artisan::call('view:clear');
@Artisan::call('chat:fix-user-ids');
@file_get_contents(url('view-clear'));
@file_get_contents(url('clear-cache'));
@file_get_contents(url('migrate'));
@file_get_contents(url('fix-numbers'));
@Artisan::call('migrate');
