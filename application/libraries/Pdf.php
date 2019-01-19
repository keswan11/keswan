<?php defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH."third_party/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
class Pdf extends DOMPDF
{

  protected function ci()
  {
    return get_instance();
  }

  public function view_download($view, $data = array())
  {
    $html = $this->ci()->load->view($view, $data, TRUE);
    $this->load_html($html);
  }
}