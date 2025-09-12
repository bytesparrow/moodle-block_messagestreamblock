<?php
/**
 * @package    block_messagestreamblock
 * @copyright  2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'block_messagestreamblock';
$plugin->version = 2025080620;
$plugin->requires = 2024052700; // Moodle 4.5
$plugin->maturity = MATURITY_BETA;
$plugin->release = 'v0.1';

$plugin->dependencies = [
    'local_nmstream' => 2025052309 // oder die exakte Version von local_nmstream
];