<?php

/**
 * @package    block_messagestreamblock
 * @copyright  2025 Bernhard Strehl <moodle@bytesparrow.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_messagestreamblock\output;

class renderer extends \plugin_renderer_base {
  static $refinement_intro = 
    "\n\n### SONSTIGE FOKUSSIERUNG / VERFEINERUNG \n\n";
  
  public function render_content(?\stdClass $config = null): string {
    global $PAGE, $USER;


    $this->page->requires->js_call_amd('block_messagestreamblock/popup', 'init');


    if (!empty($config->firstposition)) {
      $this->page->requires->js_call_amd('block_messagestreamblock/bookfix', 'init');
    }
 
    $data = [
      'buttonlabel' => get_string('askquestion', 'block_messagestreamblock'),
      'textbeforestream' => format_text($config->textbeforestream["text"],FORMAT_HTML),
      'headertext' => $config->title ?? get_string('pluginname', 'block_messagestreamblock'),
      // Beispiel für Konfigurationswert – falls gesetzt
      'customtitle' => $this->config->title ?? ''
    ];

    //set base stream options
    $stream_options = array(
      "enableai" => true,
      "default_privacy" => true,
      "default_ai" => true);


    //do we need to send  some context to the AI?
    $currentpagetitle = $PAGE->title;

    $site = get_site();
    $sitename = $site->shortname;
    $removefromtitle = array(get_string('course', 'core') . ":", $sitename, $PAGE->course->fullname, $PAGE->course->shortname, "|", ":");
    $contexttitle = trim(str_replace($removefromtitle, "", $currentpagetitle));
    $contexttitle_clear = html_entity_decode($contexttitle); // Removes special chars.
    //yes, send Context
    if ($contexttitle_clear) {
      $stream_options["promptRefinement"] = "{{ DefaultSystemPrompt }}".self::$refinement_intro.get_string("aicontextrefinement", "block_messagestreamblock") . $contexttitle_clear;
    }
    /*$stream_options["promptRefinement"] = '{{ DefaultSystemPrompt }}'."\n"
      . "mach was cooles!";*/

    // Use StreamService to get context and render the stream
    $service = new \local_nmstream\StreamService();
    $coursecontext = $service->getStreamRootContext(true);

    if (empty($coursecontext)) {
      $data["messagestreamhtml"] = "Error loading Stream Root Context";
    }
    else {
      $data["messagestreamhtml"] = $service->renderStream($coursecontext, $stream_options);
    }
    //$data["messagestreamhtml"] = "using refinement: " . $promptrefinement. " <br> " . $data["messagestreamhtml"];

    return $this->render_from_template('block_messagestreamblock/content', $data);
  }

}
