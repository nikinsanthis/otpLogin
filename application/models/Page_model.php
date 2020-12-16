<?php
    class Page_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function processLogin($email=NULL,$password)
		{
			// $this->db->select("user_name,user_email,user_username,user_password");
			$whereCondition = $array = array('user_email' =>$email,'user_password'=>$password,'user_status'=>'active');
			$this->db->where($whereCondition);
			$this->db->from('tbl_user');
			$query = $this->db->get();
			// return $query;
			return $query->row_array();
        }
        
        public function signup($data = array())
        {
            if(!empty($data))
			{
				$insert = $this->db->insert('tbl_user', $data);

				// Return the status 
            	return $insert?$this->db->insert_id():false;
			}
        }

    }