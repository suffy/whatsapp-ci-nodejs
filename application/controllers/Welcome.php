<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function send()
	{
		$tujuan 	= $this->input->post('tujuan');
		$message 	= urlencode($this->input->post('message'));

		$result = file_get_contents("http://localhost:5000/" . "msg?number=" . $tujuan . "&message=" . $message);
		$this->session->flashdata('message', 'berhasil kirim pesan');
		redirect('/');
	}
}
