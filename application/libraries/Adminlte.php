<?php 

class Adminlte {
	protected $my_template;

	function __construct(){
        $this->my_template = &get_instance();
    }

    function content($content, $tittle, $card_tittle = Null, $data=array()) {
        $data['judul'] = $tittle;
        $data['card_tittle'] = $card_tittle;
    	$data['content'] = $this->my_template->load->view($content, $data, TRUE);
    	$this->my_template->load->view('template/adminlte', $data);
    }
}