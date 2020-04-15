<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	 public function __construct()
	 	{
	 		parent::__construct();

			
	 	}
	
	
	public function index()
	{
		$personId = $this->session->userdata('id');

		$data['title']="Contact us";

		if($this->session->userdata('is_logged_in')==True){
		$this->load->view('Templets/admintemplet/header',$data);
		$this->load->view('admin/contactus');
		$this->load->view('Templets/footer');
		}
		else
		{
			redirect("home");
		}
	}
public function send_mail()
    {

    $messages= $this->input->post("message");
	
	$config = Array(
			'mailtype'  => 'html'
            );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('ethiotaskemail@gmail.com', 'EthioTask');
        $this->email->to('coofrozen@gmail.com');
        $this->email->cc('anania.mesfin@ethiotelecom.et');
        $this->email->subject("Email Testing");
        $this->email->message($messages);

        if($this->email->send())
			$this->session->set_flashdata("email_sent","Email sent successfully.");
		else
			$this->session->set_flashdata("email_not_sent","Email not sent due to Busy Server please try again letter");

		redirect('cofree/Contactus');
	    }

}
?>
