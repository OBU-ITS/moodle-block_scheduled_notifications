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

class block_scheduled_notifications extends block_base {

    public function init() {
            $this->title = get_string(
                    'scheduled_notifications',
                    'block_scheduled_notifications');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        /* Get notifications from global block config and split into individual 
         * notification items on line breaks */
        $notifications = get_config('scheduled_notifications', 'notifications_list');
        $notificationsList = explode("\n", $notifications);

        $notificationsHTML = '';

        foreach ($notificationsList as $notification) {
            $components = explode('|', $notification);
            /* Notification items should have four components */
            if (count($components) != 4) continue;

            /* Check that notification item should be displayed */
            $startTimestamp = strtotime($components[1]);
            $endTimestamp = strtotime($components[2]);
            if ($startTimestamp > time() || $endTimestamp < time()) continue;

            $notificationsHTML .= '<li';
            if ($components[3] == 'important') {
                $notificationsHTML .= ' class="important-notification"';
            }
            $notificationsHTML  .=
                    '>'
                    . htmlspecialchars($components[0])
                    . '</li>';
        }

        $html = '';
        if (strlen($notificationsHTML) > 0) {
                $html .= 
                        '<ul class="scheduled-notifications">'
                        . $notificationsHTML
                        . '</ul>';
        }

        $this->content = new stdClass;
        $this->content->text = $html;
        $this->content->footer = '';

        return $this->content;
    }

    public function has_config() {
        return true;
    }

}
?>
