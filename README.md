moodle-block_scheduled_notifications
====================================

A Moodle block that can display notifications between specified start and end dates.

Use cases of this block include letting users know about scheduled downtime and maintenance tasks.

Notifications can be set up as normal or important. Important notifications are displayed in larger, red text.

Notifications are administered through the block site administration page.

<h2>Notification syntax</h2>
{notification text}|{start date/time}|{end date/time}|{notification type}

The date/times are of the format YYYY-MM-DDThh:mm
e.g. 2015-11-18T09:00
Date/times are in UTC.

Notification type is one of: normal, important

<h3>Example</h3>
Test notification|2015-11-18T09:00|2015-11-18T17:00|normal
