<?php
/**
 * @package    block_messagestreamblock
 * @copyright  2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/blocks/edit_form.php');

class block_messagestreamblock_edit_form extends block_edit_form {

  protected function specific_definition($mform) {
    // Fügt ein Eingabefeld für den Blocktitel hinzu.
    $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));
    $mform->addElement('text', 'config_title', get_string('configtitle', 'block_messagestreamblock'));
    $mform->setType('config_title', PARAM_TEXT);
    $mform->setDefault('config_title', get_string('pluginname', 'block_messagestreamblock'));
    
    $mform->addElement('advcheckbox', 'config_showheader', get_string('config_blockshowheader', 'block_messagestreamblock'));
    $mform->setDefault('config_showheader', 1); // Default of "yes"
    $mform->setType('config_showheader', PARAM_BOOL);

    $mform->addElement('advcheckbox', 'config_firstposition', get_string('config_blockatfirstposition', 'block_messagestreamblock'));
    $mform->setDefault('config_firstposition', 1); // Default of "yes"
    $mform->setType('config_firstposition', PARAM_BOOL);
  }

}
