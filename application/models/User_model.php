<?php
    class User_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }

        public function getCustomUser($usrmail)
		{
            $query = $this->db->get_where('tbl_user',array('user_email !=' => $usrmail));
			return $query->result_array();
        }

        public function getuserdetail($usrmail)
        {
            $query = $this->db->get_where('tbl_user',array('user_email' => $usrmail));
			return $query->row_array();
        }

        public function getadmindetail()
        {
            $query = $this->db->get_where('tbl_user',array('user_role' => 'admin', 'user_status' =>'active'));
			return $query->result_array();
        }

        public function createUser($data =array())
		{
			if(!empty($data))
			{
                $insert = $this->db->insert('tbl_user', $data);
                return $insert?$this->db->insert_id():false;
			}
        }  
        
        public function updatestatus($id,$status)
        {
            $update_rows = array('user_status' => $status);
            $this->db->where('user_id',$id);
            $this->db->update('tbl_user', $update_rows);
			return true;
        }

        public function updatepassword($usrmail,$passwordData)
        {
            $this->db->where('user_email',$usrmail);
            $this->db->update('tbl_user', $passwordData);
			return true;
        }

        public function deleteCustomUser($id)
		{
			$this->db->where('user_id',$id);
			$this->db->delete('tbl_user');
			return true;
        }
        
        public function validateEmail($email)
        {
            $this->db->where('user_email',$email);
			$this->db->from('tbl_user');
			$query = $this->db->get();
			// return $query;
            return $query->row_array();
            
			// $query = $this->db->get_where('tbl_user',array('user_email' => $usrmail));
			// return (int) $query->num_rows();
        }


        public function getQuestions($username = FALSE)
	    {
            if($username == FALSE)
            {
                $query = $this->db->get('tbl_faq');
			    return $query->result_array();
            }

            $query = $this->db->get_where('tbl_faq',array('faq_username' => $username));
			return $query->result_array();
        }
        
        public function askQuestion($data =array())
	    {
	    	if(!empty($data))
			{
				$insert = $this->db->insert('tbl_faq', $data);
			}
        }

        public function fecthFAQ($id)
        {
            $query = $this->db->get_where('tbl_faq',array('faq_id' => $id));
			return $query->row_array();
        }
        

        public function updateQuestions($id,$data)
	    {

            $this->db->where('faq_id',$id);
            $this->db->update('tbl_faq', $data);
        }
        

        public function get_Country() {
	        $this->db->select('code, countryname')->from("country");
	        $query = $this->db->get();
	        return $query->result_array();
	    }
    }