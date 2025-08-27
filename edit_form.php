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

    //header anzeigen
    $mform->addElement('advcheckbox', 'config_showheader', get_string('config_blockshowheader', 'block_messagestreamblock'));
    $mform->setDefault('config_showheader', 1); // Default of "yes"
    $mform->setType('config_showheader', PARAM_BOOL);

    //an erster position
    $mform->addElement('advcheckbox', 'config_firstposition', get_string('config_blockatfirstposition', 'block_messagestreamblock'));
    $mform->setDefault('config_firstposition', 1); // Default of "yes"
    $mform->setType('config_firstposition', PARAM_BOOL);

    //Buttonbeschriftung
    $mform->addElement('text', 'config_buttonlabel', get_string('config_buttonlabel', 'block_messagestreamblock'));
    $mform->setType('config_buttonlabel', PARAM_TEXT);
    $mform->setDefault('config_buttonlabel', get_string('askquestion', 'block_messagestreamblock'));



    //text before
    $mform->addElement('editor', 'config_textbeforestream', get_string('config_textbeforestream', 'block_messagestreamblock'), array('rows' => 3, 'cols' => 60));
    $mform->setType('config_textbeforestream', PARAM_RAW);
    $mform->addHelpButton('config_textbeforestream', 'config_textbeforestream', 'block_messagestreamblock');

    //greeting
    $mform->addElement('editor', 'config_greetings', get_string('config_greetings', 'block_messagestreamblock'), array('rows' => 30, 'cols' => 60));
    $mform->setType('config_greetings', PARAM_CLEANHTML);
    $mform->addHelpButton('config_greetings', 'config_greetings', 'block_messagestreamblock');

    //promptrefinement
    $mform->addElement('textarea', 'config_promptrefinement', get_string('config_promptrefinement', 'block_messagestreamblock'), array('rows' => 10, 'cols' => 60));
    $mform->addHelpButton('config_promptrefinement', 'config_promptrefinement', 'block_messagestreamblock');
    $mform->setType('config_promptrefinement', PARAM_TEXT);
    $mform->setDefault('config_promptrefinement', "");
  }

}
