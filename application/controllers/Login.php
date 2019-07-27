<?php
class Login extends CI_Controller {

  function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

  public function index(){
    #$this->load->view('templates/header');
    $this->load->view('login');
    $this->load->view('templates/header');
    #$this->load->view('templates/footer');
  }

  public function check(){
     
    
    $this->load->model('currency_model');
    $this->form_validation->set_rules('email', 'Email',  'required|valid_email');
		$this->form_validation->set_rules('pswd', 'Password',  'required');

    if ($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('message', validation_errors());
		}
    else{
			$email = $this->input->post('email');
			$upass =$this->input->post('pswd');
      $pass = sha1($upass);
      $row=$this->currency_model->get_user($email,$pass);
      echo "Invalid Credentials";
    
      $data['userName'] = $row->result();

  if($row)
      {

          $this->load->model('currency_model');
          $query = $this->currency_model->prepareDataForCharts();
          $data['records'] = $query->result();
          $this->currency_model->calculateIntelligence();          
          $this->load->view('chart',$data);
          $this->load->view('userHomePage',$data);
          
       }
       else {
          
          $this->session->set_flashdata('message', 'Invalid Credentials');
          echo "Invalid Credentials";
       }
       
    //$this->session->set_flashdata('message', 'form submitted successfully');
  }

}


}
