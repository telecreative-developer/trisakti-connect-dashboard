<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trisakti extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

		public function __construct()
		{
			parent::__construct();
			$this->load->library('pagination');
			
		}


		public function index()
		{
			
			$cat['categories']    = $this->ModelDashboard->Load_Category()->result();

			$config = array();
	        $config["base_url"] = base_url() . "Trisakti/index";
	        $query = $this->db->query("SELECT * FROM news WHERE status = 'Agree'");
	        $x = $query->num_rows($query);


	        $config["total_rows"] 	= $x;
	        $config["per_page"] 	= 10;
	        $config["uri_segment"] 	= 3;
	        $config['num_links'] 	= 5;

	        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
		    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		    $config['first_link'] 		= '&laquo; First';
		    $config['first_tag_open'] 	= '<li class="prev page">';
		    $config['first_tag_close'] 	= '</li>';

		    $config['last_link'] 		= 'Last &raquo;';
		    $config['last_tag_open'] 	= '<li class="next page">';
		    $config['last_tag_close'] 	= '</li>';

		    $config['next_link'] 		= 'Next &rarr;';
		    $config['next_tag_open'] 	= '<li class="next page">';
		    $config['next_tag_close'] 	= '</li>';

		    $config['prev_link'] 		= '&larr; Previous';
		    $config['prev_tag_open'] 	= '<li class="prev page">';
		    $config['prev_tag_close'] 	= '</li>';

		    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
		    $config['cur_tag_close'] 	= '</a></li>';

		    $config['num_tag_open'] 	= '<li class="page">';
		    $config['num_tag_close'] 	= '</li>';

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
	        $cat["results"] = $this->ModelDashboard->fetch_countries($config["per_page"], $page);
			$cat["links"] = $this->pagination->create_links();

			$this->load->view('front-end/header/header');
			$this->load->view('front-end/index',$cat);
			$this->load->view('front-end/footer/footer');
		}

		public function search()
		{
			
			$cat['categories']    = $this->ModelDashboard->Load_Category()->result();

			$config = array();
	        $config["base_url"] = base_url() . "Trisakti/index";
	        $query = $this->db->query("SELECT * FROM news WHERE status = 'Agree'");
	        $x = $query->num_rows($query);


	        $config["total_rows"] 	= $x;
	        $config["per_page"] 	= 10;
	        $config["uri_segment"] 	= 3;
	        $config['num_links'] 	= 5;

	        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
		    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		    $config['first_link'] 		= '&laquo; First';
		    $config['first_tag_open'] 	= '<li class="prev page">';
		    $config['first_tag_close'] 	= '</li>';

		    $config['last_link'] 		= 'Last &raquo;';
		    $config['last_tag_open'] 	= '<li class="next page">';
		    $config['last_tag_close'] 	= '</li>';

		    $config['next_link'] 		= 'Next &rarr;';
		    $config['next_tag_open'] 	= '<li class="next page">';
		    $config['next_tag_close'] 	= '</li>';

		    $config['prev_link'] 		= '&larr; Previous';
		    $config['prev_tag_open'] 	= '<li class="prev page">';
		    $config['prev_tag_close'] 	= '</li>';

		    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
		    $config['cur_tag_close'] 	= '</a></li>';

		    $config['num_tag_open'] 	= '<li class="page">';
		    $config['num_tag_close'] 	= '</li>';

	        $this->pagination->initialize($config);

	        $page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
	        $cat["results"] = $this->ModelDashboard->fetch_countries($config["per_page"], $page);

	        $cat["links"] = $this->pagination->create_links();

	        $keyword =   $this->input->post('search');
			$cat['searchnews']    =   $this->ModelDashboard->search_news($keyword);

			$this->load->view('front-end/header/header');
			$this->load->view('front-end/search',$cat);
			$this->load->view('front-end/footer/footer');
		}

		public function article()
		{
			
			$id = $this->uri->segment(2);
		
			$cat['categories']    = $this->ModelDashboard->Load_Category()->result();
			$cat['agreenews']     = $this->ModelDashboard->news_byid($id,'news')->result();
			$cat['comments']     = $this->ModelDashboard->comments_byid($id,'news')->result();

			$this->load->view('front-end/header/header');
			$this->load->view('front-end/article',$cat);
			$this->load->view('front-end/footer/footer');
		}

		public function category()
		{
			
			$title = $this->uri->segment(3);
			$x = rawurldecode($title);

			$cat['categories']    = $this->ModelDashboard->Load_Category()->result();

			$config = array();
	        $config["base_url"] = base_url() . "Trisakti/category/".$x;
	        $query = $this->db->query("SELECT * FROM news,categories WHERE news.status = 'Agree'AND categories.id_category = news.id_category");
	        $numbering = $query->num_rows($query);

	        $config["total_rows"] 	= $numbering;
	        $config["per_page"] 	= 10;
	        $config["uri_segment"] 	= 4;
	        $config['num_links'] 	= 5;

	        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
		    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		    $config['first_link'] 		= '&laquo; First';
		    $config['first_tag_open'] 	= '<li class="prev page">';
		    $config['first_tag_close'] 	= '</li>';

		    $config['last_link'] 		= 'Last &raquo;';
		    $config['last_tag_open'] 	= '<li class="next page">';
		    $config['last_tag_close'] 	= '</li>';

		    $config['next_link'] 		= 'Next &rarr;';
		    $config['next_tag_open'] 	= '<li class="next page">';
		    $config['next_tag_close'] 	= '</li>';

		    $config['prev_link'] 		= '&larr; Previous';
		    $config['prev_tag_open'] 	= '<li class="prev page">';
		    $config['prev_tag_close']	= '</li>';

		    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
		    $config['cur_tag_close'] 	= '</a></li>';

		    $config['num_tag_open'] 	= '<li class="page">';
		    $config['num_tag_close'] 	= '</li>';

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        
	        $cat["agreenews"] 	= $this->ModelDashboard->news_bycatid($config["per_page"], $page,$x);
	        $cat["links"]	 	= $this->pagination->create_links();
		
			$this->load->view('front-end/header/header');
			$this->load->view('front-end/category',$cat);
			$this->load->view('front-end/footer/footer');
		}

		public function vote()
		{
			$title = $this->uri->segment(3);
			$config = array();
	        $config["base_url"] = base_url() . "Trisakti/vote/";
	        $query = $this->db->query("SELECT * FROM polls");
	        $numbering = $query->num_rows($query);

	        $config["total_rows"] 	= $numbering;
	        $config["per_page"] 	= 10;
	        $config["uri_segment"] 	= 3;
	        $config['num_links'] 	= 5;

	        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
		    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		    $config['first_link'] 		= '&laquo; First';
		    $config['first_tag_open'] 	= '<li class="prev page">';
		    $config['first_tag_close'] 	= '</li>';

		    $config['last_link'] 		= 'Last &raquo;';
		    $config['last_tag_open'] 	= '<li class="next page">';
		    $config['last_tag_close'] 	= '</li>';

		    $config['next_link'] 		= 'Next &rarr;';
		    $config['next_tag_open'] 	= '<li class="next page">';
		    $config['next_tag_close'] 	= '</li>';

		    $config['prev_link'] 		= '&larr; Previous';
		    $config['prev_tag_open'] 	= '<li class="prev page">';
		    $config['prev_tag_close'] 	= '</li>';

		    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
		    $config['cur_tag_close'] 	= '</a></li>';

		    $config['num_tag_open'] 	= '<li class="page">';
		    $config['num_tag_close'] 	= '</li>';
		    $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
		    $cat["links"] 			= $this->pagination->create_links();
			$cat['list_vote']		= $this->ModelDashboard->Load_Polls_Limit($config["per_page"], $page);
			$this->load->view('front-end/header/header_list');
			$this->load->view('front-end/vote',$cat);
			$this->load->view('front-end/footer/footer');
		}

		public function list_vote()
		{
			
			$id = $this->uri->segment(2);
		
			$cat['categories']    = $this->ModelDashboard->Load_Category()->result();
			$cat['list_vote']     = $this->ModelDashboard->polls_byid($id,'polls_choice')->result();

			$this->load->view('front-end/header/header_vote');
			$this->load->view('front-end/list_vote',$cat);
			$this->load->view('front-end/footer/footer_vote');
		}

		public function votenow() {

        	$id_polls_choice = $this->uri->segment(3);
        	$id_user = 2;
        	$id_polls = $this->uri->segment(2);

			if($id_user == NULL){
				redirect('list_vote/'.$id_polls);
			}
			else{
				$polls = array(
				'id'  => $id_user,
				'id_polls_choice'  => $id_polls_choice,
				'id_polls'  => $id_polls
          	);
			$this->ModelDashboard->insert_answers($polls); 
	        redirect('list_vote/'.$id_polls);
			}

		}

		public function careers()
		{
			
			$config = array();
	        $config["base_url"] = base_url() . "Trisakti/careers";
	        $query = $this->db->query("SELECT * FROM careers");
	        $x = $query->num_rows($query);


	        $config["total_rows"] 	= $x;
	        $config["per_page"] 	= 10;
	        $config["uri_segment"] 	= 3;
	        $config['num_links'] 	= 5;

	        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
		    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		    $config['first_link'] 		= '&laquo; First';
		    $config['first_tag_open'] 	= '<li class="prev page">';
		    $config['first_tag_close'] 	= '</li>';

		    $config['last_link'] 		= 'Last &raquo;';
		    $config['last_tag_open'] 	= '<li class="next page">';
		    $config['last_tag_close'] 	= '</li>';

		    $config['next_link'] 		= 'Next &rarr;';
		    $config['next_tag_open'] 	= '<li class="next page">';
		    $config['next_tag_close'] 	= '</li>';

		    $config['prev_link'] 		= '&larr; Previous';
		    $config['prev_tag_open'] 	= '<li class="prev page">';
		    $config['prev_tag_close'] 	= '</li>';

		    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
		    $config['cur_tag_close'] 	= '</a></li>';

		    $config['num_tag_open'] 	= '<li class="page">';
		    $config['num_tag_close'] 	= '</li>';

	        $this->pagination->initialize($config);

	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
	        $careers["results"] = $this->ModelDashboard->careers($config["per_page"], $page);
			$careers["links"] = $this->pagination->create_links();

			$asd = $careers["results"];
			var_dump($asd);

			$this->load->view('front-end/header/header_careers');
			$this->load->view('front-end/careers',$careers);
			$this->load->view('front-end/footer/footer');
		}

		public function overviews()
		{
			
			$id = $this->uri->segment(2);
			$job['jobs']     = $this->ModelDashboard->job_byid($id,'careers')->result();
			$this->load->view('front-end/header/header_careers');
			$this->load->view('front-end/overviews',$job);
			$this->load->view('front-end/footer/footer');
		}

		public function searchcareers()
		{
			
			$cat['categories']    = $this->ModelDashboard->Load_Category()->result();
		    $keyword =   $this->input->post('searchcareers');
		
			$config = array();
	        $config["base_url"] = base_url() . "Trisakti/searchcareers";
	        $query = $this->db->query("SELECT * FROM careers where job_title = '$keyword'");
	        $x = $query->num_rows($query);


	        $config["total_rows"] 	= $x;
	        $config["per_page"] 	= 1;
	        $config["uri_segment"] 	= 3;
	        $config['num_links'] 	= 5;

	        $config['full_tag_open'] 	= '<div class="pagination"><ul>';
		    $config['full_tag_close'] 	= '</ul></div><!--pagination-->';

		    $config['first_link'] 		= '&laquo; First';
		    $config['first_tag_open'] 	= '<li class="prev page">';
		    $config['first_tag_close'] 	= '</li>';

		    $config['last_link'] 		= 'Last &raquo;';
		    $config['last_tag_open'] 	= '<li class="next page">';
		    $config['last_tag_close'] 	= '</li>';

		    $config['next_link'] 		= 'Next &rarr;';
		    $config['next_tag_open'] 	= '<li class="next page">';
		    $config['next_tag_close'] 	= '</li>';

		    $config['prev_link'] 		= '&larr; Previous';
		    $config['prev_tag_open'] 	= '<li class="prev page">';
		    $config['prev_tag_close'] 	= '</li>';

		    $config['cur_tag_open'] 	= '<li class="active"><a href="">';
		    $config['cur_tag_close'] 	= '</a></li>';

		    $config['num_tag_open'] 	= '<li class="page">';
		    $config['num_tag_close'] 	= '</li>';

	        $this->pagination->initialize($config);

	        $page 	= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        
	        $cat["results"] = $this->ModelDashboard->fetch_countries($config["per_page"], $page);

	        $cat["links"] = $this->pagination->create_links();

	    	$cat['searchcareers']    =   $this->ModelDashboard->search_careers($keyword);

			$this->load->view('front-end/header/header_careers');
			$this->load->view('front-end/searchcareers',$cat);
			$this->load->view('front-end/footer/footer');
		}

}
