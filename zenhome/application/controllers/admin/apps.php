<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps extends MY_Controller {

	/**
	 * Admin App interface
	 *
	 * Shows and allows managment of all installed apps.
	 *
	 *
	 */

	public function __construct(){
		parent::__construct();
		$this->check_access( 'access_admin' );
	}
	
	public function index(){
		$this->load->model( 'AppsModel' );
		$data = array(
			'admin_menu' => $this->admin_menu(),
			'apps' => $this->AppsModel->getAllApps(),
		);
		$this->view( 'admin/apps', $data );
	}

}

/* End of file apps.php */
/* Location: ./application/controllers/admin/apps.php */