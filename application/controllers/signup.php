<?php
class Signup extends CI_Controller {
  public function index(){
    $this->load->view('templates/header');
    $this->load->view('signup');
    #$this->load->view('templates/footer');
  }


  public function signup_user(){
    $this->load->model('currency_model');
    $this->form_validation->set_rules('name', 'Name',  'required');
		$this->form_validation->set_rules('email', 'Email',  'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('contact', 'Contact',  'required|max_length[12]');
		$this->form_validation->set_rules('address', 'Address',  'required|max_length[50]');
		$this->form_validation->set_rules('date', 'date', 'required');
		if ($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('message', validation_errors());
		}
    else{

      $form_data=$this->input->post();
      $data = array(
         'name'=>$form_data['name'],
         'email'=>$form_data['email'],
         'password'=> SHA1($form_data['password']),
         'DOB'=> $form_data['date'],
         'contact'=> $form_data['contact'],
         'address' => $form_data['address'],
         'userType' => 'end_user',
          );
    $this->currency_model->insert_user($data);
    $this->session->set_flashdata('message', 'form submitted successfully');
    echo "Registration successful";
    echo "<script>window.location.href='login'</script>";
    echo '<script type="text/javascript">alert("Registration successful!");</script>';
    header ('Location :login');

      }

    $this->session->sess_destroy();
    }
    //redirect('signup');

  }
