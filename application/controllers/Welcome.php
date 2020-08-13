<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
	}

	public function index()
	{

		$this->loadviews('home', null, 'portada');
		//$view['body'] = $this->load->view('portada',null,TRUE);
		//$this->parser->parse('home', $view);

	}

	public function logout()
	{
		session_destroy();
		$this->loadviews('login');
	}

	public function login()
	{

		if (isset($_POST['user']) && isset($_POST['pass'])) {

			$login = $this->Site_model->login($_POST);

			if (isset($login)) {

				$array = array(
					'nombre' => $login[0]->nombre,
					'apellidos' => $login[0]->apellidos,
					'curso' => $login[0]->curso,
					'user' => $login[0]->user,

				);
				/* CREAMOS LA SESSION DEL CLIENTE*/

				/*if ($login[0]->is_profesor) {
					$array['profesor'] = $login[0]->is_profesor;
				}elseif ($login[0]->is_alumno) {
					$array['alumno'] = $login[0]->is_alumno;
				}*/

				if (isset($login[0]->is_profesor)) {
					$array['tipo'] = 'profesor';
					$array['profesor_id'] = $login[0]->profesor_id;
				} elseif (isset($login[0]->is_alumno)) {
					$array['tipo'] = 'alumno';
					$array['alumno_id'] = $login[0]->alumno_id;
				}

				$this->session->set_userdata($array);
			}
		}
		//$this->load->view('login');
		//con el @ evitamos que nos muestre un aviso de consejo
		@$this->loadviews('login');
	}

	public function loadviews($view, $data = null, $cuerpo = null)
	{


		if ($_SESSION['user']) {

			if ($view == 'login') {
				redirect(base_url() . 'Welcome', 'location');
			}

			$body['body'] = $this->load->view($cuerpo, $data, TRUE);
			$body['header'] = $this->load->view('templates/header', null, TRUE);
			$this->parser->parse($view, $body);
		} else {
			if ($view == 'login') {

				$this->load->view($view);
			} else {

				redirect(base_url() . 'welcome/login', 'location');
			}
		}
	}

	public function gestionalumnos()
	{

		if ($_SESSION['tipo'] == 'profesor') {

			$data['alumnos'] = $this->Site_model->getAlumnos();
			$this->loadviews('home', $data, 'alumnos/alumnos');
		} else {
			redirect(base_url() . 'Welcome', 'location');
		}
	}

	public function eliminaralumno()
	{
		if ($_SESSION['tipo'] == 'profesor') {

			if ($_POST['idalumno']) {
				$this->Site_model->deletealumno($_POST['idalumno']);
			}
		} else {
			redirect(base_url() . 'Welcome', 'location');
		}
	}

	public function crearta()
	{

		if ($_POST) {
			if ($_FILES['archivo']) {
				$config['upload_path']          = './uploads/';
				$config['allowed_types']        = 'gif|jpg|png';

				$config['file_name'] = uniqid() . $_FILES['archivo']['name'];

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('archivo')) {
					echo 'error';
				} else {
					$this->Site_model->uploadTareas($_POST, $config['file_name']);
				}
			}
			$this->Site_model->uploadTareas($_POST);
			
		}

		$this->loadviews('home', null, 'creartareas');
	}

	public function mistareas()
	{
		if ($_SESSION['nombre']) {
			$data['tareas'] = $this->Site_model->getTareas($_SESSION['curso']);
			$this->loadviews('home', $data, 'mistareas');
		} else {
			redirect(base_url() . 'Welcome', 'location');
		}
	}
	public function mensajes(){
		if ($_SESSION['nombre']) {
			$this->loadviews('home', null, 'mensajes');
		} else {
			redirect(base_url() . 'Welcome', 'location');
		}
	}
}
