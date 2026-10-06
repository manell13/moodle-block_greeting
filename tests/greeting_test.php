<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Unit tests for block_greeting.
 *
 * @package    block_greeting
 * @copyright  2026 manell13
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_greeting;

defined('MOODLE_INTERNAL') || die();

/**
 * @covers \block_greeting
 * @covers \block_greeting\local\greeting_text
 */
final class greeting_test extends \advanced_testcase {
    public function test_greeting_string_is_rendered(): void {
        $this->resetAfterTest();

        global $PAGE;

        $message = \block_greeting\local\greeting_text::get_message();
        $html = $PAGE->get_renderer('core')->render_from_template('block_greeting/content', ['greeting' => $message]);

        $this->assertStringContainsString($message, $html);
        $this->assertSame($message, get_string('greeting', 'block_greeting'));
    }
}
