<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function index()
	{
		$country = $this->Custom_model->getdata('tbl_country');
		$data = array
				(
					'country' => $country
				);
		$this->load->view('home/register', $data);
	}

	public function validate()
	{
		$post = $this->input->post(NULL, TRUE);

		$this->form_validation->set_rules('full_name', 'Name', 'required');
		$this->form_validation->set_rules('register_as', 'Register', 'required');
		$this->form_validation->set_rules('id_country', 'Country', 'required');
		$this->form_validation->set_rules('id_state', 'State', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error', 'Please Check your Input');
			redirect(base_url('register'));
			die();
        }

        if ($post['password'] != $post['confirm_password']) 
        {
        	$this->session->set_flashdata('error', 'Please Confirm your Password');
			redirect(base_url('register'));
			die();
        }

        if ($post['register_as'] == 'user') 
        {
        	$as_company = 0;
        }
        if ($post['register_as'] == 'company') 
        {
        	$as_company = 1;
        }

        $otp_exp = ip_10menit(date('Y-m-d H:i:s'));
        $otp = generate_otp();

        $insert = array
        			(
        				'as_company' => $as_company,
        				'id_country' => $post['id_country'],
        				'id_state' => $post['id_state'],
        				'registrar_name' => trim($post['full_name']),
        				'registrar_email' => trim($post['email']),
        				'registrar_password' => password_hash($post['password'], PASSWORD_BCRYPT),
        				'otp_token' => $otp,
        				'otp_expired' => $otp_exp
        			);

       	$this->Custom_model->insertdata('tbl_registrar', $insert);

       	global $SConfig;
        $this->load->library("phpmailer_library");
        $mail = $this->phpmailer_library->load();
        $mail->Host = "mail.mandiri-ebuss.com";
        $mail->isSMTP();
        $mail->SMTPOptions = array(
                             'ssl' => array(
                             'verify_peer' => false,
                             'verify_peer_name' => false,
                             'allow_self_signed' => true
                                            )
                                    );
        $mail->SMTPAuth = TRUE;
        $mail->Username = 'admin@mandiri-ebuss.com';
        $mail->Password = 'CyberPunk2077';
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;


        $mail->addAddress($post['email']);
        $mail->setFrom('admin@mandiri-ebuss.com', 'Career Portal Registration');

        $mail->Subject = 'Career Portal Registration';
        $mail->isHTML(TRUE);

        $mail->Body = '<h1>Career Portal Registration</h1>
    
                <table style="width: 100%; border: 1px solid #002060;">
                    <tr style="background-color: #002060; ">
                        <td style="padding: 10px;" colspan="2">
                            <font style="float: left; width: 50%;">
                                <img src="'.'https://cdn-icons-png.flaticon.com/512/25/25231.png'.'" alt="Avatar" style="width:70%; max-width: 100px;">
                            </font>
                            <font style="float: right; width: 50%; text-align: right; vertical-align: middle; padding-top: 20px;">
                                <h4 style="color: white; "><b>Career Portal</b></h4>
                            </font>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: justify;">
                            <p>For <b>'.strtoupper($post['full_name']).'</b>, please confirm with OTP code below:
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: justify;">
                        <center>

                        	<h2><strong>'.$otp.'</strong></h2>

                            <a href="'.base_url().'/otp/'.'" style="background-color: #002060; border: none;color: white;padding: 15px; text-align: center;text-decoration: none;display: inline-block;font-size: 16px; width: 70%;">INPUT OTP</a>
                            </center><br>
                        </td>
                    </tr>
                </table>';

        if($mail->send()) {
		    $this->session->set_flashdata('success', 'Thank you for your registration, please check your email for OTP Code');
			redirect(base_url('otp'));
		} else {
		    $this->session->set_flashdata('error', 'Please Check Your Input');
			redirect(base_url('register'));
		}
	}

	public function otp()
	{
		$this->load->view('home/otp');
	}

	public function otp_validation()
	{
		$post = $this->input->post(NULL, TRUE);

		$checkotp = $this->Custom_model->getdetail('tbl_registrar', array('otp_token' => $post['otp'], 'otp_expired >=' => date('Y-m-d H:i:s')));
		
		if (!empty($checkotp) && $checkotp['otp_expired'] >= date('Y-m-d H:i:s')) 
		{
			$insertuser = array
						(
							'id_country' => $checkotp['id_country'],
							'id_state' => $checkotp['id_state'],
							'company_account' => $checkotp['as_company'],
							'user_email' => $checkotp['registrar_email'],
							'user_password' => $checkotp['registrar_password'],
							'user_name' => $checkotp['registrar_name'],
							'active_date' => date('Y-m-d H:i:s'),
							'user_status' => 'active'
						);
			$id_user = $this->Custom_model->insertdata('tbl_user', $insertuser);

			$logindata = array
					(
						'id_user' => $id_user,
						'nama_user' => $checkotp['registrar_name'],
						'company' => $checkotp['as_company'],
						'logged_in' => TRUE					
					);
			
			$this->session->set_userdata($logindata);

			if ($checkotp['as_company'] == 1) 
			{
				$this->session->set_flashdata('success', 'Thank you for your registration, please create or choose your company.');
				redirect(base_url('validate_company'));
			}
			else
			{
				$this->session->set_flashdata('success', 'Thank you for your registration, we recommend you to complete your profile.<br><a href="'.base_url('user/profile').'">Click here to setting up your profile</a>');
				redirect(base_url('user'));
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Please input a valid Code');
			redirect(base_url('otp'));
		}
	}
}