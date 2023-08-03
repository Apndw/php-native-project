<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View {
  // The name of the view file to be rendered
  public $view;

  /*
  * Constructor

  * @param string $view
  */
  public function __construct(string $view) {
    $this->view = $view;
  }

  /*
  * Destructor
  */
  public function __destruct() {
    $this->view = null;
  }

  /*
  * Render the view file
  *
  * @param array $data
  */
  public function render(array $data = []) {
    if (file_exists('./view/' . $this->view . '.view.php')) {
      extract($data);
      include('./view/' . $this->view . '.view.php');
    }
  }

  /*
  * Render a partial view file
  *
  * @param string $view
  * @param array $data
  */
  public function render_partial(string $view, array $data = []) {
    if (file_exists('./view/' . $view . '.view.php')) {
      extract($data);
      include('./view/' . $view . '.view.php');
    }
  }
}