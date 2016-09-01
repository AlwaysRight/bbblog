<?php
class Blog extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Blog_model", "blog_model");

	}
	public function index(){
		$this->myBlog();
	}

	public function myBlog(){
		$data = $this->blog_model->findByUser(1);
		$this->load->library('pagination');
		$config['base_url'] = 'http://localhost/bbblog/index.php?c=Blog&m=myBlog';
		$config['total_rows'] = $data["total"];
		$config['per_page'] = $data["page_size"];
		$this->pagination->initialize($config);
		$this->load->view('blog/Home.php', $data);
	}
}
