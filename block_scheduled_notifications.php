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
 * @author     Peter Welham
 * @copyright  2017, Oxford Brookes University
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

class block_scheduled_notifications extends block_base {

    public function init() {
		$this->title = get_string('notifications', 'block_scheduled_notifications');
    }

    public function get_content() {
		global $DB; 

       if ($this->content !== null) {
            return $this->content;
        }

        $notificationsHTML = '';
        $notifications = $DB->get_records('local_scheduled_notification');
        foreach ($notifications as $notification) {

            // Check that the notification item should be displayed
            if (($notification->start_time <= time()) && ($notification->stop_time >= time())) {
				if ($notificationsHTML == '') {
					$notificationsHTML = '<hr class="divider">';
				}
				$notificationsHTML .= $notification->text . '<hr class="divider">';
			}
        }

        $this->content = new stdClass;
		$this->content->text = $notificationsHTML;
        $this->content->footer = '';

        return $this->content;
    }

    public function has_config() {
        return true;
    }
}
?>
