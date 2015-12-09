<?php
/**
 * Copyright (c) Xerox Corporation, Codendi Team, 2001-2009. All rights reserved
 * Copyright (c) Enalean, 2011-2015. All Rights Reserved.
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
 */

namespace Tuleap\Svn\Explorer;

use Tuleap\Svn\ServiceSvn;
use Tuleap\Svn\Presenter\ExplorerPresenter;

use HTTPRequest;

class ExplorerController {
    const NAME = 'explorer';

    public function __construct() {

    }

    public function getName() {
        return self::NAME;
    }

    public function index(ServiceSvn $service, HTTPRequest $request) {
        $this->renderIndex($service, $request);
    }

    private function renderIndex(ServiceSvn $service, HTTPRequest $request) {
        $project = $request->getProject();

        $service->renderInPage(
            $request,
            'Welcome',
            'index',
            new ExplorerPresenter($project)
        );
    }

}
