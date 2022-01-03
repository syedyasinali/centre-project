<?php defined('BASEPATH') OR exit('No direct script access allowed');

class product_review extends CI_Controller {

	public function index()
	{
		$this->load->model('product_review_model');
		
		$config['base_url'] = base_url() . 'admin/product_review/index';
		$config['total_rows'] = $this->product_review_model->count_all();
		$config['per_page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 15;
		$config['uri_segment'] = 4;
		$config['num_links'] = 3;
		
		$this->pagination->initialize($config);

		if ($this->input->get('q')) {
			$this->db->like('name', $this->input->get('q'), 'BOTH');
		}

		$data['product_reviews'] = $this->product_review_model->get_all($config['per_page'] , $this->uri->segment(4));
		$data['title'] = 'Manage Product review';
		$data['mainContent'] = '/admin/product_review/index';
		$this->load->view('/admin/layout/master', $data);
	}
	public function add()
	{
		$this->load->model('product_review_model');
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$this->form_validation->set_rules('create_date','Date','required');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('email','email','required');

			if ($this->form_validation->run() == TRUE)
			{
			$options = [
				'create_date' => $this->input->post('create_date'),
				'product_id' => $this->input->post('product_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'comment' => $this->input->post('comment')
			];
			$this->product_review_model->create($options);
			redirect('/admin/product_review','refresh');
			}
		}
		$data['title'] = 'Create Product review';
		$data['mainContent'] = '/admin/product_review/add';
		$this->load->view('/admin/layout/master', $data);
	}
	public function edit($product_review_id)
	{
		$this->load->model('product_review_model');

		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			$options = [
				'create_date' => $this->input->post('create_date'),
				'product_id' => $this->input->post('product_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'comment' => $this->input->post('comment')
			];
			$this->product_review_model->update($product_review_id,$options);
			redirect('/admin/product_review','refresh');
		}
		$data['product_review'] = $this->product_review_model->get_by($product_review_id);
		$data['title'] = 'Edit Product review';
		$data['mainContent'] = '/admin/product_review/edit';
		$this->load->view('/admin/layout/master', $data);
	}
	public function status($product_review_id)
	{
		$this->load->model('product_review_model');
		$rows = $this->product_review_model->get_by($product_review_id);
		$newStatus = ($rows->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
		$options = ['status' => $newStatus];
		$this->product_review_model->update($product_review_id,$options);
		redirect('/admin/product_review','refresh');
	}
	public function delete($product_review_id)
	{
		$this->load->model('product_review_model');
		$this->product_review_model->remove($product_review_id);
		redirect('/admin/product_review','refresh');
	}
	public function product_review_seed()
	{
		$this->load->model('product_review_model');
		$faker = Faker\Factory::create();
		for ($i=0; $i < 50 ; $i++) { 
		$options = [
			'create_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
			'product_id' => $faker->paragraph,
			'name' => $faker->paragraph,
			'email' => $faker->paragraph,
			'website' => $faker->paragraph,
			'comment' => $faker->paragraph
		];
			$this->product_review_model->create($options);
		}
			redirect('/admin/product_review','refresh');
	}
}
