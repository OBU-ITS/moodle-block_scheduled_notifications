<?php

// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Scheduled notifications block
 *
 * @package    block_scheduled_notifications
 * @author     Peter Andrew
 * @copyright  2015, Oxford Brookes University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

$string['pluginname'] = 'Scheduled notifications block';
$string['scheduled_notifications'] = 'Notifications';

$string['notifications_list'] = 'Notifications list';
$string['notifications_list_desc'] = 'Each notification should be on a new line. The format of each notification should be: {notification text}|{start date/time}|{end date/time}|{type}. date/time should be YYYY-MM-DDThh:mm. date/times are UTC. type should be one of normal, important. Example: Test notification|2015-11-18T09:00|2015-11-18T17:00|normal';
