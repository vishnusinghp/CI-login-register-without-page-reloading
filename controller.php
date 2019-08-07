	public function user_login()
	{

    $this->form_validation->set_rules('email', 'Email', 'required');    
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    if ($this->form_validation->run() == FALSE){
         echo json_encode(array('status'=>false,'message'=>'Invalid Email/password'));
    }else{        
        $data['email'] = $this->input->post('email');        
        $data['password'] = sha1($this->input->post('password'));
        $row = $this->MainModel->get_row('users',$data);
        if($row){
          	$this->session->set_userdata('user_id',$row['id']);
            echo json_encode(array('status'=>true,'message'=>'Login Successfully'));
          }else{
            echo json_encode(array('status'=>false,'message'=>'Invalid Attempt Try Again'));
          }          
      } 
	}
  
  
  public function user_signup()
	{  
      $this->form_validation->set_rules('first_name', 'first_name', 'required');
      $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'password', 'required');

      if ($this->form_validation->run() == FALSE){
         echo json_encode(array('status'=>false,'message'=>'Please fill mandatory fields'));
      }else{
        $data['first_name'] = $this->input->post('first_name');
        $data['last_name'] = $this->input->post('Last_name');
        $data['email'] = $this->input->post('email');
        $data['password'] = sha1($this->input->post('password'));

          if($this->MainModel->insert_row('users',$data))
          {
            echo json_encode(array('status'=>true,'message'=>'Registration Successfully'));
          }
          else
          {
            echo json_encode(array('status'=>false,'message'=>'Error in registration!'));
          }
      } 
	}
