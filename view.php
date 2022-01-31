<?php
// This file is part of Moodle - http://moodle.org/
//
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
 * Display the list of courses relevant for a specific user in a specific step instance.
 *
 * @package tool_lifecycle
 * @copyright  2017 Tobias Reischmann WWU
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(__DIR__ . '/../../../config.php');

use tool_lifecycle\local\manager\step_manager;
use tool_lifecycle\local\manager\interaction_manager;
use tool_lifecycle\local\table\interaction_attention_table;

require_login(null, false);

$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');
$PAGE->set_url(new \moodle_url('/admin/tool/lifecycle/view.php'));
$PAGE->navbar->add(get_string('mycourses'))->add(get_string('managecourses_link', 'tool_lifecycle'),
        $PAGE->url);


$PAGE->set_title(get_string('viewheading', 'tool_lifecycle'));
$PAGE->set_heading(get_string('viewheading', 'tool_lifecycle'));

$controller = new \tool_lifecycle\view_controller();

$renderer = $PAGE->get_renderer('tool_lifecycle');

echo $renderer->header();

$controller->handle_view($renderer);

echo $renderer->footer();
