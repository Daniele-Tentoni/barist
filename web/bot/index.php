<?php
/*This Source Code Form is subject to the terms of the Mozilla Public
  License, v. 2.0. If a copy of the MPL was not distributed with this
  file, You can obtain one at http://mozilla.org/MPL/2.0/.*/
//require_once '../definings.php';
//require_once ROOT_PATH . '/config/functions.php';
//require_once ROOT_PATH . '/controllers/event_controller.php';

include 'TGBot.php';
$TGBot = new TGBot(file_get_contents('php://input'), 'iL0UckMy9ACOExgVut2Hz4NW78pG1PoYhjRDJfl3', $_GET['fpam'], $_GET['token']);
$TGBot->SecTest();
include 'conf.php';
include 'mysql.php';
// include 'postgres.php';
include 'commands.php';
