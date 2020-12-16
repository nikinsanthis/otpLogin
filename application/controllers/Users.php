<?php 
    class Users extends CI_Controller{
        
        // admin Dasboard page
        public function index()
        {
            $data['title'] = 'DashBoard';

            $usrmail = $this->session->userdata('usrmail');
            $user_role = $this->session->userdata('user_role');

            $data['custom_user'] 	= $this->user_model->getCustomUser($usrmail);
			$data['country'] 		= $this->user_model->get_Country();

            if($user_role == 'admin')
            {
                $this->load->view('pages/header');
                $this->load->view('users/index',$data);
            }
            else
            {
                redirect('users/faq');
            }
            
        }

        public function addCustomUser()
        {
            $email      = trim($this->input->post('custom_email'));
            $password   = random_string('alnum', 8);
            
            $result 	= $this->user_model->validateEmail($email);
          
            if($result > 0)
            {
                $msg = "Email already exist";
                redirect('users');
            }
            else
            {
                $userData = array( 
                    'user_name' 	=> trim($this->input->post('custom_name')), 
                    'user_email' 	=> $email, 
                    'user_country'  => trim($this->input->post('custom_country')),
                    'user_role' 	=> trim($this->input->post('custom_role')),
                    'user_username' => trim($this->input->post('custom_email')),
                    'user_status'   => 'inactive',
                    'user_password' => $password,

                ); 

                $insert = $this->user_model->createUser($userData);

                if($insert)
                {
                    
                    $subject = 'Reset your password ';

                    $from                   = 'worknikin@gmail.com';              // Pass here your mail id
                    $message                = "login with below creditial and Then reset the password. Username / Email : ".$email. " And Password : ".$password;
                    $config['protocol']     = 'smtp';
                    $config['smtp_host']    = 'ssl://smtp.gmail.com';
                    $config['smtp_port']    = '465';
                    $config['smtp_timeout'] = '60';

                    $config['smtp_user']    = 'worknikin@gmail.com';    //Important give your emial Id
                    $config['smtp_pass']    = 'worknikin@123';  //Important enter password

                    $config['charset']      = 'utf-8';
                    $config['newline']      = "\r\n";
                    $config['mailtype']     = 'html'; // or html
                    $config['validation']   = TRUE; // bool whether to validate email or not 

                    $this->email->initialize($config);
                    $this->email->set_mailtype("html");
                    $this->email->from($from);
                    $this->email->to($email);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    
                    if ( $this->email->send())
                    {
                        // added to DB and sent mail
                        $msg = "User addes succesfully.";
                        redirect('users');
                        // $this->load->view('pages/header');
                        // $this->load->view('users/index', compact('msg'));
                    }
                    else
                    {
                        // failed to send mail
                        redirect('users');
                        // $msg = "Failed to send reset password link.";
                        // $this->load->view('pages/header');
                        // $this->load->view('users/index', compact('msg'));
                    }
                    
                }
                else
                {
                    // not inserted into the DB
                    redirect('users');
                    // $msg = "Something went wrong. Please try agian later";
                    // $this->load->view('pages/header');
                    // $this->load->view('users/index', compact('msg'));
                }
            }
        }

        public function updateStatus($id,$status)
        {
            $update = $this->user_model->updatestatus($id,$status);
            redirect('users');
        }

        public function resetpassword()
        {
            $data['title'] = 'Reset Password';

            if($this->input->post('resetpwd'))
            {
                $usrmail     = $this->session->userdata('usrmail');
                $passwordData = array( 
                    'user_password' 	    => trim($this->input->post('password')),
                );

                $update = $this->user_model->updatepassword($usrmail,$passwordData);
                redirect('users');  
            }

            $this->load->view('pages/header');
            $this->load->view('users/resetpassword',$data);
            $this->load->view('pages/footer');
        }

        public function deleteUser($id)
		{
			$this->user_model->deleteCustomUser($id);
			redirect('users');
        }
        
        public function faq()
        {
            $data['title'] = "FAQ";

			$data['questions'] 	= $this->user_model->getQuestions();

			$this->load->view('pages/header');
            $this->load->view('users/faq',$data);
            $this->load->view('pages/footer');
        }

        public function my_faq()
        {
            $data['title']  = "My Questions";
            $usrmail        = $this->session->userdata('usrmail');
            $user_role      = $this->session->userdata('user_role');

            $data['userdetail'] = $this->user_model->getuserdetail($usrmail);
            $username = $data['userdetail']['user_name'];

            if($user_role == 'admin')
            {
                $data['questions'] 	= $this->user_model->getQuestions();
            }
            else
            {
                $data['questions'] 	= $this->user_model->getQuestions($username);
            }
           
            $this->load->view('pages/header');
			$this->load->view('users/my_faq',$data);

        }

        public function askQuestion()
        {

            $queData = array( 
                'faq_username' 	    => trim($this->input->post('que_name')), 
                'faq_usercountry' 	=> trim($this->input->post('que_country')), 
                'faq_regarding' 	=> trim($this->input->post('que_question_title')), 
                'faq_question' 	    => trim($this->input->post('que_text')),
                'faq_status'        => 'open'
            ); 

            $insert = $this->user_model->askQuestion($queData);

            redirect('users/my_faq');
        }

        public function editFAQ($id)
        {
            $data['title']  = "Update Questions";

            $data['faq'] 	    = $this->user_model->fecthFAQ($id);
            $data['admins'] 	= $this->user_model->getadmindetail();

            $this->load->view('pages/header');
			$this->load->view('users/update_faq',$data);
        }

        public function updateFAQ()
        {

            $id = trim($this->input->post('faq_id'));

            $faqData = array(
                'faq_status' 	=> trim($this->input->post('faq_status')), 
                'faq_question' 	=> trim($this->input->post('faq_question')), 
                'faq_owner'    => trim($this->input->post('faq_owner')),
                'faq_answer' 	=> trim($this->input->post('faq_answer'))
            ); 

            $update = $this->user_model->updateQuestions($id,$faqData);

            redirect('users/my_faq');
        }
        
        public function logout()
        {

            $this->session->unset_userdata('usrmail');
            $this->session->unset_userdata('user_role');
            $this->session->sess_destroy();
            redirect('login');
        }
    }