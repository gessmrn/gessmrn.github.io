<?php
	class Post extends CI_Controller{
		public function __construct()
		{
			Parent::__construct();
			$this->load->model('Post_model');
		}
		public function index()
		{
			$data['judul'] = "Halaman Post";

			$this->load->library('pagination');

			$config['base_url'] = 'http://localhost/ci3kp/post/index';

			if (isset($_POST['submit']))
			{
				$data['keyword'] = $this->input->post('keyword');
				$this->session->set_userdata('keyword', $data['keyword']);
			} else {
				$data['keyword'] = $_SESSION['keyword'];
			}

			$config['total_rows'] = $this->Post_model->countPosts($data['keyword']);

			$config['per_page'] = 3;

			$config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
			$config['full_tag_close'] = '</ul></nav>';

			$config['first_tag_open'] = '<li class="page-item">';
			$config['first_tag_close'] = '</li>';

			$config['last_tag_open'] = '<li class="page-item">';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="page-item">';
			$config['num_tag_close'] = '</li>';

			$config['attributes'] = ['class' => 'page-link'];

			$this->pagination->initialize($config);

			$data['start'] = $this->uri->segment(3);

			$data['posts'] = $this
				->Post_model
				->getPosts($config['per_page'], $data['start'], $data['keyword']);
			
			$this->load->view('templates/header', $data);
			$this->load->view('post/index', $data);
			$this->load->view('templates/footer');
		}
		public function tambah()
		{
			$data['judul'] = "Tambah Post";
			
			$this->load->view('templates/header',$data);
			$this->load->view('post/tambah');
			$this->load->view('templates/footer');
		}
		public function prosesTambah()
		{
			$this->Post_model->tambahPost();
			echo "sukses menambahkan";
		}
		public function update($id)
		{
			$data['judul'] = 'Update Post';
			$data['post'] = $this->Post_model->getPostById($id);

			$this->load->view('templates/header', $data);
			$this->load->view('post/update', $data);
			$this->load->view('templates/footer');
		}
		public function prosesUpdate($id)
		{
			$this->Post_model->updatePost($id);
			redirect(base_url()."post");
		}
		public function hapus($id)
		{
			$this->Post_model->hapusPost($id);
			redirect(base_url()."post");
		}
	}