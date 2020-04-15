<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

           $this->load->model('login/login_model'); 

    }
    /*
    *Showing  Login page here 
    */
    function index()
    {
    if($this->session->userdata('is_logged_in')==True){
			redirect('cofree/home');
		}
        $this->load->view('login/login');
    }
    
    /**
    * check the username and the password with the database
    * @return void
    */
    
    function validate()
    {  
    
       
         $username = $this->input->post('username');
         $password = sha1($this->input->post('password'));
         

         $is_valid = $this->login_model->validate($username, $password);


         if($is_valid)/*If valid username and password set */
         {
             $get_id = $this->login_model->get_id($username, $password);

                      
            foreach($get_id as $val)
                { 
                     $id=$val->id;
                     $name = $val->username;                  
                     $password = $val->password;                 
                     $type = $val->type;
                     $fullname = $val->name;
                     $oracleid = $val->oracle_id;
                     $region = $val->user_region;
                     $email = $val->email;
                     $department=$val->department;
                     $date_created=$val->date_created;
                     $date_updated=$val->date_updated;
                     $profile_pic=$val->photo;

 
                     if($type=='Admin')
                     {

                        $data = array(
                        'name' =>$name, 
                        'password' => $password,
                        'type'=>$type,
                        'id'=>$id,
                        'fullname'=>$fullname,
                        'oracle_id'=>$oracleid,
                        'region'=>$region,
                        'email'=>$email,
                        'department'=>$department,
                        'date_created'=>$date_created,
                        'date_updated'=>$date_updated,
                        'pic'=>$profile_pic,
                        'is_logged_in' => true
                        );
                        
                          $this->session->set_userdata($data);
                          redirect('Admin/home');
                     }
                    

                     else if($type=='Staff')
                     {
                        
                        $data = array(
                        'name' =>$name, 
                        'password' =>$password,
                        'type'=>$type,
                        'id'=>$id,
                        'fullname'=>$fullname,
                        'oracle_id'=>$oracleid,
                        'region'=>$region,
                        'email'=>$email,
                        'department'=>$department,
                        'date_created'=>$date_created,
                        'date_updated'=>$date_updated,
                        'pic'=>$profile_pic,
                        'staff_is_logged_in' => true
                        );
                          $this->session->set_userdata($data);
                          redirect('home');
                     }

                    
            } 

         
        }
        else // incorrect username or password
        {
            $this->session->set_flashdata('msg1', 'Username or Password Incorrect!');
            redirect('login');
        }
   
    }

    /**
        * Unset the session, and logout the user.
        * @return void
    */      
    public function admin_logout()
    {
           

            $array_items = array(
                				'name', 
                				'password',
                				'type',
                				'id',
                        'fullname',
                        'oracle_id',
                        'region',
                        'email',
                        'department',
                        'date_created',
                        'date_updated',
                        'pic',
                				'is_logged_in',
                				);



        $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('msg', 'Admin Signed Out Now!');
            redirect('login');

    }

     public function man_logout()
    {
            $array_items = array(   
                        'name',
                        'password' ,
                        'type',
                        'id',
                        'fullname',
                        'oracle_id',
                        'region',
                        'email',
                        'department',
                        'date_created',
                        'date_updated',
                        'pic',
                        'man_is_logged_in'
                        );
        $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('msg', 'Manager Signed Out Now!');
            redirect('login');
  
    }

    public function super_logout()
    {
            $array_items = array(   
        
                        'name',
                        'password' ,
                        'type',
                        'id',
                        'fullname',
                        'oracle_id',
                        'region',
                        'email',
                        'department',
                        'date_created',
                        'date_updated',
                        'pic',
                        'super_is_logged_in'
                        );

        $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('msg', 'Supervisor Signed Out Now!');
            redirect('login');
       
    }
     public function staff_logout()
    {
            $array_items = array(   
        
                        'name',
                        'password' ,
                        'type',
                        'id',
                        'fullname',
                        'oracle_id',
                        'region',
                        'email',
                        'department',
                        'date_created',
                        'date_updated',
                        'pic',
                        'staff_is_logged_in'
                        );

        $this->session->unset_userdata($array_items);
         $this->session->set_flashdata('msg', 'Staff Signed Out Now!');
            redirect('login');

    }

         
}    
?>