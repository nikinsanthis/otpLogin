<?php 
    class Pages extends CI_Controller{
		
        // Default Load method 
        public function view($page = 'login')
        {
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
			{
				show_404();
            }
            $data['title'] = ucfirst($page);

            $this->load->view('pages/signin_header');
			$this->load->view('pages/'.$page,$data);
        }

        // signin method
        public function signin()
        {
            $userEmail	= trim($this->input->post('email'));
            $password 	= trim($this->input->post('password'));
                
            $result 	= $this->page_model->processLogin($userEmail,$password);

            if ($result)
            {
                $code	 = random_string('alnum',5);
  
                $this->session->set_userdata('usrcode',$code);
                $this->session->set_userdata('usrmail',$userEmail);
                $this->session->set_userdata('user_role',$result['user_role']);

				$to =  $userEmail; // User email pass here
    			$subject = 'Two Factor Authentication ';

    			$from                   = 'worknikin@gmail.com';              // Pass here your mail id
				$message                = "Here is the OTP for get logging in to the site. The code is: ".$code;
			    $config['protocol']     = 'smtp';
   				$config['smtp_host']    = 'ssl://smtp.gmail.com';
    			$config['smtp_port']    = '465';
    			$config['smtp_timeout'] = '60';

    			$config['smtp_user']    = 'worknikin@gmail.com';    //Important give your emial Id
    			$config['smtp_pass']    = 'worknikin@123';  //Important enter password

   				$config['charset']      = 'utf-8';
   			    $config['newline']      = "\r\n";
   				$config['mailtype']     = 'html';
   			    $config['validation']   = TRUE; // bool whether to validate email or not 

			    $this->email->initialize($config);
			    $this->email->set_mailtype("html");
			    $this->email->from($from);
			    $this->email->to($to);
			    $this->email->subject($subject);
			    $this->email->message($message); 


		        if ( $this->email->send())
		        {
		        	// 
		        	redirect('authenticate');
		        }
		        else
		        {
		        	$msg = "Entered OTP is incorrect.";
					$this->load->view('pages/signin_header');
					$this->load->view('pages/login', compact('msg'));
		        }

		        echo $this->email->print_debugger();
            }
            else
            {
                $msg = "The email or password you entered is incorrect. Or User is not active";
                $this->load->view('pages/signin_header');
                $this->load->view('pages/login', compact('msg'));
            }
        }

        // validate the OTP 
        public function authenticate()
		{
			$otp	= trim($this->input->post('otp'));

			if($this->input->post('authenticateSubmit'))
			{
				$usrcode = $this->session->userdata('usrcode');

				if($otp == $usrcode)
				{
                    $this->session->unset_userdata('usrcode');
                    redirect('users');
				}
				else
				{
					$msg = "Entered OTP is incorrect.";
					$this->load->view('pages/signin_header');
					$this->load->view('pages/authenticate', compact('msg'));
				}
			}
			else
			{
                $msg = "Entere OTP.";
				$this->load->view('pages/signin_header');
				$this->load->view('pages/authenticate');
			}			
        }
        
        public function signup()
        {
            $this->form_validation->set_rules('name', 'Name','required');
			$this->form_validation->set_rules('email', 'Email','required');
			$this->form_validation->set_rules('userName', 'User Name','required');
			$this->form_validation->set_rules('password', 'Password','required');
            $this->form_validation->set_rules('confirmPassword', 'Repeated password','required');
            
            if($this->form_validation->run()=== FALSE)
			{
				$this->load->view('pages/signin_header');
				$this->load->view('pages/signup');
            }
            else
			{
                $userData = array( 
	                'user_name' 		=> trim($this->input->post('name')), 
	                'user_email' 		=> trim($this->input->post('email')), 
	                'user_username' 	=> trim($this->input->post('userName')), 
	                'user_password' 	=> trim($this->input->post('password'))
                );

                $insert = $this->page_model->signup($userData);

                if($insert)
            	{
            		$msg = "Login with credential.";
					$this->load->view('pages/signin_header');
					$this->load->view('pages/login', compact('msg'));
            	}
            	else
            	{
            		$msg = "Something went wrong. Please try Later. ";
					$this->load->view('pages/signin_header');
					$this->load->view('pages/signup');
            	}
            }
        }

    }