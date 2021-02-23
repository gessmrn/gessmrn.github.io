<?php
	class Post_model extends CI_Model{
		public function tambahPost()
		{
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi')
			);
			$this->db->insert('posts',$data);
		}
		public function getAllPost()
		{
			return $this->db
			->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi")
			->get('posts')
			->result_array();
		}	
		public function getPosts($limit, $start, $keyword = null)
		{
			return $this->db
			->select("id_post, judul, SUBSTRING(isi, 1, 140) as isi")
			->like('judul', $keyword)
			->get('posts', $limit, $start)
			->result_array();
		}
		public function countPosts($keyword=null)
		{
			return $this->db
				->like('judul',$keyword)
				->from('posts')
				->count_all_results();
		}
		public function countAllPost()
		{
			return $this->db->get('posts')->num_rows();
		}
		public function getPostById($id)
		{
			return $this->db
				->select("id_post,judul,isi")
				->where('id_post', $id)
				->get('posts')
				->result_array();
		}
		public function updatePost($id)
		{
			$data = array(
				'judul' => $this->input->post('judul'),
				'isi' => $this->input->post('isi')
			);

			$this->db
			->where('id_post', $id)
			->update('posts', $data);
		}
		public function hapusPost($id)
		{
			$this->db
				->where('id_post', $id)
				->delete('posts');
		}
	}