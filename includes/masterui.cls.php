<?php
class MasterUI{
	private $mui;
	
	public function __construct(){
		$this->mui = new stdclass;
		$this->mui->views = '';
		
		if(
			!file_exists(get_parent_theme_file_path( '/includes/admin/editor.wrapper.php' ))||
			!file_exists(get_parent_theme_file_path( '/includes/admin/editor.wrapper.php' ))
		){
			die('includes/admin/editor.wrapper.php not exists.');
		}
		
		add_action( 'wp_enqueue_scripts', array($this, 'enqueueDefaultScriptStyle') );
		
		if($this->canEdit()){
			add_action( 'wp_footer', array($this,'getEditorModal') );
			add_action( 'wp_ajax_masteruieditor', array($this,'ajax_masteruieditor') );
		}
	}

	public function enqueueDefaultScriptStyle(){
		$this->addStyle();
		$this->addScript();
		
		if($this->canEdit()){
			$this->addUIEditorScript();
		}
	}
	
	public function headerPage($content=''){
		$this->mui->views = 'header/header-default.php';
		$this->getEditorWrapper();
	}
	
	public function sidebarPage($content=''){
		
	}
	
	public function footerPage($content=''){
		$this->mui->views = 'footer/footer-default.php';
		$this->getEditorWrapper();
	}
	
	public function contentPage($content=''){
		
	}
	
	public function contentPost($cntent=''){
		
	}
	
	public function getEditorModal(){
		$content = file_get_contents(get_parent_theme_file_path( '/includes/admin/editor.modal.php' ));
		$this->evaluateContent($content);
	}
	
	public function ajax_masteruieditor(){
		var_dump($_POST);
		wp_die();
	}
	
	private function addStyle(){
		wp_enqueue_style( 'masterui-bootstrap-min-style', get_template_directory_uri() . '/css/bootstrap.min.css' );
		wp_enqueue_style( 'masterui-min-style', get_template_directory_uri() . '/css/masterui.css' );
	}
	
	private function addScript(){
		wp_enqueue_script( 'masterui-bootstrap-min-script', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'masterui-min-script', get_template_directory_uri() . '/js/masterui.js', array( 'jquery' ) );
	}
	
	/*add style and script for editor*/
	private function addUIEditorScript(){
		wp_enqueue_style( 'masterui-editor-style', get_template_directory_uri() . '/css/masterui-editor.css' );
		wp_enqueue_script( 'masterui-editor-script', get_template_directory_uri() . '/js/masterui-editor.js', array( 'jquery' ) );
		wp_localize_script( 'masterui-editor-script', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
	}
	
	/*check user allowed edit*/
	private function canEdit(){
		if($user = $this->isLoggedin()){
			$allowed_roles = array('administrator');
			if( array_intersect($allowed_roles, $user->roles ) ){
				return true;
			} 
		}			
		
		return false;
	}
	
	/*check user if logged in*/
	private function isloggedin(){
		$user = wp_get_current_user();
		return $user? $user : false;
	}
	
	/*check user role*/
	private function userRole(){
		$user = wp_get_current_user();
		return $user? $user->roles : false;
	}
	
	private function getEditorWrapper(){
		$content = file_get_contents(get_parent_theme_file_path( '/includes/admin/editor.wrapper.php' ));
		$this->evaluateContent($content);
	}
	
	/*print content of views*/
	private function getContent($views='',$content=''){
		if(file_exists(get_parent_theme_file_path( '/templates/' . $views ))){
			$content = file_get_contents(get_parent_theme_file_path( '/templates/' . $views ));
		}
		$this->evaluateContent($content);
	}
	
	/*print echo using eval*/
	private function evaluateContent($content=''){
		try{
			eval('?>' . $content);
		}
		catch(Exception $e){}
	}
}