<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class ModelDashboard extends CI_Model{


	public function deleteuser($id)
	{
        $this->db->where('id', $id);
        $this->db->delete('users');
        $db = $this->db->get('users');
        return $db;
	}
	public function updatedata_user($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	// Category 
	public function Load_Category(){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->order_by('category','asc');
		$db = $this->db->get();
		return $db;
	}

	public function delcategories($id){
        $this->db->where('id_category', $id);
        $this->db->delete('categories');
    }
    
    public function insertcategories($categories){
		$this->db->insert('categories',$categories);
		return $db;
	}

	public function editcategories($id){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('id_category',$id);
    	$query =$this->db->get();
    	return $query;
	}

	public function updatedata_cat($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//End Category


	//Faculty
    public function Load_Faculties(){
		$this->db->select('*');
		$this->db->from('faculties');
		$this->db->order_by('faculty','asc');
		$db = $this->db->get();
		return $db;
	}

	public function Load_FacultiesMajors(){
		$this->db->select('*');
		$this->db->from('faculties');
		$this->db->order_by('faculty','asc');
		$db = $this->db->get();
		return $db;
	}

	public function insertfaculties($faculties){
		$this->db->insert('faculties',$faculties);
		return $db;
	}

	public function delfaculties($id){
        $this->db->where('id_faculty', $id);
        $this->db->delete('faculties');
    }

    public function editfaculties($id){
		$this->db->select('*');
		$this->db->from('faculties');
		$this->db->where('id_faculty',$id);
    	$query =$this->db->get();
    	return $query;
	}

	public function updatedata_fal($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//End Faculty

	//Major
	public function Load_Majors(){
		$this->db->select('*');
		$this->db->from('majors');
		$this->db->order_by('id_major','desc');
		$db = $this->db->get();
		return $db;
	}

	public function Load_QMajors(){
		$this->db->select('*');
		$this->db->from('majors');
		$this->db->join('faculties','majors.id_faculty = faculties.id_faculty','left');
		$this->db->order_by('faculties.faculty','asc');
		$db = $this->db->get();
		return $db;
	}

	public function insertmajors($majors){
		$this->db->insert('majors',$majors);
		return $db;
	}

	public function delmajors($id){
        $this->db->where('id_major', $id);
        $this->db->delete('majors');
    }

    public function editmajors($id){
		$this->db->select('*');
		$this->db->from('majors');
		$this->db->where('id_major',$id);
		$this->db->join('faculties','majors.id_faculty = faculties.id_faculty');
    	$query =$this->db->get();
    	return $query;
	}

	public function updatedata_maj($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	//End Major
	
	//User

	public function insertusers($users){
		$this->db->insert('users',$users);
		return $db;
	}

	public function Load_Users(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('faculties','users.id_faculty = faculties.id_faculty');
		$this->db->join('majors','users.id_major = majors.id_major');
		$this->db->order_by('id','desc');
		$db = $this->db->get();
		return $db;
	}

	public function Load_UsersVerify(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('faculties','users.id_faculty = faculties.id_faculty');
		$this->db->join('majors','users.id_major = majors.id_major');
		$this->db->where('verified','0');
		$this->db->order_by('id','desc');
		$db = $this->db->get();
		return $db;
	}

	public function edituser($id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('faculties','users.id_faculty = faculties.id_faculty');
		$this->db->join('majors','users.id_major = majors.id_major');
		$this->db->where('users.id',$id);
    	$query =$this->db->get();
    	return $query;
	}
	//End User


	//News
	public function Load_News(){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->select('news.updatedAt as date');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->order_by('id_news','desc');
		$db = $this->db->get();
		return $db;
	}

	public function editnews($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function News_Pending(){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->select('news.updatedAt as date');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Pending');
		$this->db->order_by('id_news','desc');
		$db = $this->db->get();
		return $db;
	}
	public function News_Pending_Dashboard(){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Pending');
		$this->db->order_by('id_news','desc');
		$this->db->limit(10);
		$db = $this->db->get();
		return $db;
	}

	public function News_active(){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Agree');
		$this->db->order_by('id_news','desc');
		$db = $this->db->get();
		return $db;
	}

	public function record_count() {
        return $this->db->count_all("news");

    }
 
	public function fetch_countries($limit, $start) {
		$this->db->select('*');
		$this->db->from('news');
		$this->db->select('news.updatedAt as date');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Agree');
		$this->db->order_by('id_news','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get("");

 
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
   	}


	public function news_byid($id){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->select('news.updatedAt as date');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Agree');
		$this->db->where('news.id_news', $id);
		$this->db->order_by('id_news','desc');
		$db = $this->db->get();
		return $db;
	}
	public function comments_byid($id){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->select('comments.updatedAt as date');
		$this->db->join('users','comments.id = users.id');
		$this->db->where('comments.id_news', $id);
		$db = $this->db->get();
		return $db;
	}
	

	public function news_bycatid($limit,$start,$x){
		$this->db->select('*');
		$this->db->from('news');
		$this->db->select('news.updatedAt as date');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Agree');
		$this->db->where('categories.category', $x);
		$this->db->order_by('news.id_news','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get("");

 
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function Load_Comments(){
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->select('comments.updatedAt as date');
		$this->db->join('news','news.id_news = comments.id_news');
		$this->db->join('users','users.id = comments.id');
		$this->db->order_by('id_comment','asc');
		$db = $this->db->get();
		return $db;
	}

	public function delcomments($id){
        $this->db->where('id_comment', $id);
        $this->db->delete('comments');
    }
    

	//End News

	public function Load_Polls_Limit($limit,$start){
		
		$this->db->limit($limit, $start);
		$this->db->order_by('id_poll','desc');
		$query = $this->db->get("polls");

 
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	public function search_news($keyword)
	{
		$this->db->select('*');
		$this->db->from('news');
		$this->db->select('news.updatedAt as date');
		$this->db->join('categories','news.id_category = categories.id_category');
		$this->db->join('users','news.id = users.id');
		$this->db->where('news.status','Agree');
		$this->db->order_by('id_news','desc');
		$this->db->like('title',$keyword);
		$this->db->where('status','Agree');
        $query  =   $this->db->get('');
        return $query->result();
	}

	public function Load_Career(){
		$this->db->select('*');
		$this->db->from('careers');
		$this->db->order_by('id_career','desc');
		$db = $this->db->get();
		return $db;
	}

	//End News 


	//Polls
	public function Load_Polls(){
		$this->db->select('*');
		$this->db->from('polls');
		$this->db->order_by('title_poll','desc');
		$db = $this->db->get();
		return $db;
	}

	public function delpolls($id){
        $this->db->where('id_poll',$id);
		$query = $this->db->get('polls');
		$row = $query->row();
		$x = substr($row->thumbnail_poll,46);

	    $this->db->delete('polls',array('id_poll' => $id));
	    $path ='/var/www/html/Trisakti/images/'.$x;
	    //chmod($path, 0666);
	    if($this->db->affected_rows() >= 1){
	    if(unlink($path))
	    return TRUE;
	    } else {
	        return FALSE;
	    }
	    var_dump($path);
	    
    }

    public function replacePolls($id){
       	$this->db->where('id_poll',$id);
		$query = $this->db->get('polls');
		$row = $query->row();
		$x = substr($row->pic_polls,46);

	    $path ='/var/www/html/Trisakti/images/'.$x;
	    var_dump($path);
	    if($this->db->affected_rows() >= 1){
	    if(unlink($path))
	    return TRUE;
	    } else {
	        return FALSE;
	    }
    }

    public function insert_titlepolls($polls){
		$this->db->insert('polls',$polls);
		return $db;
	}
	public function editpolls($id){
		$this->db->select('*');
		$this->db->from('polls');
		$this->db->where('id_poll',$id);
    	$query =$this->db->get();
    	return $query;
	}

	public function update_titlepolls($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	//End Polls


	//Candidate

	public function Load_Candidate(){
		$this->db->select('*');
		$this->db->from('pollschoices');
		$this->db->join('polls','pollschoices.id_poll = polls.id_poll','left');
		$this->db->order_by('idpoll_choice','desc');
		$db = $this->db->get();
		return $db;
	}

	public function upload_candidate($polls_choice){
		$this->db->insert('pollschoices',$polls_choice);
		return $db;
	}

	public function editpolls_id($id){
		$this->db->select('*');
		$this->db->from('pollschoices');
		$this->db->where('idpoll_choice',$id);
		$this->db->join('polls','polls.id_poll = pollschoices.id_poll');
    	$query =$this->db->get();
    	return $query;
	}

	public function updatedata_can($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function deleteCandidate($id)
	{
		$this->db->where('idpoll_choice',$id);
		$query = $this->db->get('pollschoices');
		$row = $query->row();
		$x = substr($row->avatar,46);


	    $this->db->delete('pollschoices',array('idpoll_choice' => $id));
	    $path ='/var/www/html/Trisakti/images/'.$x;
	    var_dump($path);
	    if($this->db->affected_rows() >= 1){
	    if(unlink($path))
	    return TRUE;
	    } else {
	        return FALSE;
	    }
	}

	public function replaceCandidate($id)
	{
		$this->db->where('idpoll_choice',$id);
		$query = $this->db->get('pollschoices');
		$row = $query->row();
		$x = substr($row->avatar,46);

	    $path ='/var/www/html/Trisakti/images/'.$x;
	    var_dump($path);
	    if($this->db->affected_rows() >= 1){
	    if(unlink($path))
	    return TRUE;
	    } else {
	        return FALSE;
	    }
	}
	
	//End Candidate

	//List Candidate front-end

	public function polls_byid($id){
		$this->db->select('*');
		$this->db->from('polls');
		$this->db->where('polls.id_poll', $id);
		$this->db->join('pollschoices','polls.id_poll = pollschoices.id_poll');
		$this->db->order_by('pollschoices.idpoll_choice','asc');
		$db = $this->db->get();
		return $db;
	}

	public function voted(){
		$this->db->select('*');
		$this->db->from('polls');
		$this->db->join('pollschoices','polls.id_poll = pollschoices.id_poll');
		$this->db->order_by('pollschoices.idpoll_choice','asc');
		$db = $this->db->get();
		return $db;
	}

	//End List Candidate front-end

	//Votenow

	public function insert_answers($polls){
		$this->db->insert('pollsanswers',$polls);
	}

	//End List


	// Load Reports

	public function Load_Report(){
		$this->db->select('*');
		$this->db->from('reports');
		$this->db->order_by('id_report','desc');
		$db = $this->db->get();
		return $db;
	}

	//End Reports

	//Careers

	public function careers($limit, $start) {
		$this->db->select('*');
		$this->db->from('careers');
		$this->db->select('careers.updatedAt as date');
		$this->db->join('users','users.id = careers.id');
		$this->db->order_by('careers.id_career','desc');
		$this->db->limit($limit, $start);
		$query = $this->db->get("");

 
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
   	}




	public function job_byid($id){
		$this->db->select('*');
		$this->db->from('careers');
		$this->db->select('careers.updatedAt as date');
		$this->db->join('users','users.id = careers.id');
		$this->db->where('careers.id_career', $id);
		$db = $this->db->get();
		return $db;
	}

	public function search_careers($keyword)
	{
		$this->db->select('*');
		$this->db->from('careers');
		$this->db->select('careers.updatedAt as date');
		$this->db->join('users','careers.id = users.id');
		$this->db->order_by('careers.id_career','desc');
		$this->db->like('job_title',$keyword);
        $query  =   $this->db->get('');
        return $query->result();
	}

	public function delcareers($id){
			$this->db->where('id_career', $id);
			$this->db->delete('careers');
	}

	public function delallnews($id){
		$this->db->where('id_news', $id);
		$this->db->delete('news');
	}

	public function delnews($id){
		$this->db->where('id_news', $id);
		$this->db->delete('news');
	}

	//End Careers

}