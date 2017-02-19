<?php
class Controller {
  private $controller;
  private $action;

  public function __CONSTRUCT($controller,$action) {
    $this->controller = $controller;
    $this->action = $action;
  }

  protected function view($view='') {
		$view = $view == '' ? $this->action: $view;
    require_once __DIR__ . "/../view/$this->controller/$view.php";
	}
}
?>
