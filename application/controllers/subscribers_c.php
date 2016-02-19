<?php

class subscribers_c extends CI_controller{

public function index()
{
  $this->load->model('Subscribers_m');
  $this->load->view("AdminComponents/header");
  $this->load->view("AdminComponents/leftnavbar");
  $this->load->view("AdminComponents/subscribers");
  $this->load->view("AdminComponents/footer");
}

/*Function to send mails to all the subscribers*/
public function sendMail()
{
if(isset($_POST["submit"])) {
  $this->load->model('Subscribers_m');

  //get subscribers from DB and pass it to $data variable
  $data = $this->Subscribers_m->get_subscribers();
  //loading components in the page
  $this->load->view("AdminComponents/header");
  $this->load->view("AdminComponents/leftnavbar");
  $this->load->view("AdminComponents/subscribers");
  $this->load->view("AdminComponents/footer");
  //formatting the subscribers list to a string with commas
  $email_array = "";

  foreach ($data->result() as $row)
  {
    $email_address = $row->email;
    $email_array = $email_array.$email_address.",";
  }
  
  $email_array = rtrim($email_array, ",");

    //configuration of e mail
    $config = Array(
     'protocol' => 'smtp',
     'smtp_host' => 'ssl://smtp.googlemail.com',
     'smtp_port' => 465,
     'smtp_user' => 'adora.apparel@gmail.com',
     'smtp_pass' => 'tryandtry',
     'mailtype' => 'html',
     'charset' => 'iso-8859-1',
     'wordwrap' => TRUE
    );

     $this->load->library('email', $config);
     $this->email->set_newline("\r\n");
     $this->email->from('adora.apparel@gmail.com'); // change it to yours
     $this->email->to($email_array);// change it to yours
     $this->email->subject($_POST["subject"]);
     $this->email->message($_POST["message"]);

     //if the e mail is sent successfully
    if($this->email->send())
    {
      echo '<script>alert("Successfully Sent Message");</script>';
    }
    else
    {
    show_error($this->email->print_debugger());
    }
    
  }

}
}
?>