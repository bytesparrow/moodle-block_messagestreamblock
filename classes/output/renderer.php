<?php
/**
 * @package    block_messagestreamblock
 * @copyright  2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_messagestreamblock\output;

class renderer extends \plugin_renderer_base {

  public function render_content(?\stdClass $config = null): string {
    global $PAGE, $USER;

    $currentCourseId = $PAGE->course->id;
    $this->page->requires->js_call_amd('block_messagestreamblock/popup', 'init');

    
    if(!empty($config->firstposition))
    {
      $this->page->requires->js_call_amd('block_messagestreamblock/bookfix', 'init');
    }



    $data = [
      'buttonlabel' => get_string('askquestion', 'block_messagestreamblock'),
      'popupcontent' => 'Lorem ipsum dolor sit amet...',
      'headertext' => $config->title ?? get_string('pluginname', 'block_messagestreamblock'),
      // Beispiel für Konfigurationswert – falls gesetzt
      'customtitle' => $this->config->title ?? ''
    ];

    // Use StreamService to get context and render the stream
    $service = new \local_nmstream\StreamService();
    $currenctcontext = array();
    if ($currentCourseId) {
      $currenctcontext['id'] = $currentCourseId;
      $currenctcontext['type'] = \local_nmstream\RootType::COURSE;
      $currenctcontext['courseid'] = $currentCourseId;
    }

    if (empty($currenctcontext)) {
      $data["messagestreamhtml"] = "Error loading Stream Root Context";
    }
    else {
      $data["messagestreamhtml"] = $service->renderStream($currenctcontext, true);
    }

    return $this->render_from_template('block_messagestreamblock/content', $data);
  }

}
