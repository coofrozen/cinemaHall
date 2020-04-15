<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('file_model','file');
          /*session checks */ 

      if($this->session->userdata('is_logged_in')=='')
    {
       $this->session->set_flashdata('msg','Please Login to Continue');
       redirect('login');
     }
      $this->load->model('file');
    }
public function index(){
        $data = array();
        $data['error'] = "";
        //get files from database
        $data['ppt'] = $this->file->getRows();
        //load the view
        $data['title']="Readable";
      
         
      $this->load->view('Templets/admintemplet/header',$data);
      $this->load->view('admin/files_upload_view',$data);
      $this->load->view('Templets/footer');
    }

 public function upload($kno){
      
                $config['upload_path'] = './upload/file';
                $config['allowed_types'] = 'pptx|ppt|pdf';
                $config['max_size'] = 100000;
                $config['encrypt_name'] = TRUE;
               /*$config['max_width'] = 1024;
                $config['max_height'] = 768;*/

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                  
                  $this->session->set_flashdata("upload Failed", $this-> upload ->display_errors());
                }
                else
                {
                    $fileUpload = $this->upload->data();
                    $kno=$this->input->post('kno');
                    // $titlename = "Best Knowledge Sharing";
                    $data = array(
                              'name' => $this->session->userdata('fullname'),
                              'title' => $kno,
                              'file_name' => $fileUpload['file_name'],
                              'created' => date("y-m-d-h-m-s"),
                                );
                      $insert = $this->file->data_insert($data);
                      echo json_encode(array("status" => TRUE));

                 $this->session->set_flashdata("upload Success","File Upload Successfully");
                }
                redirect('cofree/files');
 }   
    
    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->file->getRows(array('id' => $id));
            
            //file path
            $file = 'upload/file/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }

}
   