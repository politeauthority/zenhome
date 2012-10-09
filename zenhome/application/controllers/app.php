<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MY_Controller {

	/**
	 * Main App interface
	 *
	 * Shows and allows managment of all installed apps.
	 *
	 *
	 */

	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->model( 'AppsModel' );
		$data = array(
			'apps' => $this->AppsModel->getAllApps(),
		);
		$this->view( 'private/apps', $data );
	}

	public function enable( $app_id ){
		if( !isset( $app_id ) )
			//@todo report error
			redirect( 'apps/' );
		$this->load->model( 'AppsModel' );
		$this->AppsModel->enableApp( $app_id );
		redirect( 'app/' );
	}

	public function disable( $app_id, $user_id = Null ){
		if( !isset( $app_id ) )
			redirect( 'apps/' );
		$this->load->model( 'AppsModel' );
		if( isset( $user_id ) && !empty( $user_id ) ){
			$boom = $this->AppsModel->disableUserApp( $app_id, $user_id );
		} else {
			$this->AppsModel->disableApp( $app_id );			
		}
		redirect( 'app/' );
	}

	public function user_enable( $app_id ){
		$this->load->model('AppsModel');
		$this->AppsModel->enableUserApp( $app_id, $this->user['user_id'] );
		redirect( 'profile');
	}

	public function user_disable( $app_id ){
		$this->load->model('AppsModel');
		$this->AppsModel->disableUserApp( $app_id, $this->user['user_id'] );
		redirect( 'profile');
	}

}

/* End of file apps.php */
/* Location: ./application/controllers/apps.php */