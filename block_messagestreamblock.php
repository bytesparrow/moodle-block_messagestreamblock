<?php
/**
 * @package    block_messagestreamblock
 * @copyright  2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_messagestreamblock extends block_base {

  public function init() {
    $this->title = get_string('pluginname', 'block_messagestreamblock');
  }

  public function get_content() {
    global $PAGE;

    if ($this->content !== null) {
      return $this->content;
    }
    //deaktiviere für das modul messagestream wegen code-dopplung
    if (strpos($PAGE->url->out(false), '/mod/messagestream') !== false) {
      // Block ausblenden, indem content leer bleibt
      $this->content = new stdClass();
      $this->content->text = '';
      $this->content->footer = '';
      return $this->content;
    }

    $renderer = $this->page->get_renderer('block_messagestreamblock');
    $this->content = new stdClass();
    $this->content->text = $renderer->render_content($this->config);
    $this->content->footer = '';

    return $this->content;
  }

  public function hide_header() {
    if (!is_object($this->config) || !property_exists($this->config, "showheader")) {
      return false;
    }
    if ($this->config->showheader == 0) {
      return true;
    }
  }

  public function specialization() {
    if (!empty($this->config->title)) {
      $this->title = $this->config->title;
    }
  }

  
  /**
   * Defines in which pages this block can be added.
   *
   * @return array of the pages where the block can be added.
   */
  public function applicable_formats() {
    return [
      'admin' => false,
      'site-index' => false,
      'course-view' => true,
      'mod-book' => true,
      'my' => false,
    ];
  }

  public function instance_allow_config() {
    return true;
  }
}
