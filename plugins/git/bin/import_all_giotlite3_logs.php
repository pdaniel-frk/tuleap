#!/usr/share/tuleap/src/utils/php-launcher.sh
<?php
/**
 * Copyright (c) Enalean, 2016. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 */

require_once 'pre.php';

use Tuleap\Git\Gitolite\Gitolite3LogParser;
use Tuleap\Git\Gitolite\GitoliteFileLogsDao;
use Tuleap\Git\Gitolite\VersionDetector;
use Tuleap\Git\History\Dao;
use Tuleap\Git\RemoteServer\Gerrit\HttpUserValidator;

$detector = new VersionDetector();
if ($detector->isGitolite3()) {
    $gitolite_parser = new Gitolite3LogParser(
        new GitBackendLogger(),
        new System_Command(),
        new HttpUserValidator(),
        new Dao(),
        new GitRepositoryFactory(new GitDao(), ProjectManager::instance()),
        UserManager::instance(),
        new GitoliteFileLogsDao()
    );

    $gitolite_parser->parseAllLogs(GITOLITE3_LOGS_PATH);
}
