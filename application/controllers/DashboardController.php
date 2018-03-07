<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

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
		if($this->session->userdata('username') == ""){
			redirect('trisakti_logadmin');
			
		}
		
	}


	public function currentGet(){
		$id =$this->input->post('id_reports');
		$this->db->from('reports');
		$this->db->where('id_reports', $id); 
		$reports = $this->db->get()->row();
		echo "<h4 span style='color:#01468e; margin-top:20px;'>$reports->name</h4>";
		echo "<p span style='color:#e67a17'>$reports->content</p>";
		
	}




	// Dashboard index admin

	public function index()
	{

		$cat['news']  = $this->ModelDashboard->News_Pending_Dashboard()->result();

		$this->load->view('back-end/header/header');
		$this->load->view('back-end/index',$cat);
		$this->load->view('back-end/footer/footer');

	}

	// End Dashboard index admin //


	// Categories admin


	public function categories()
	{
		$cat['categories']    = $this->ModelDashboard->Load_Category()->result();
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/categories',$cat);
		$this->load->view('back-end/footer/datatables_footer');

	}


	public function addcategories(){
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/addcategories');
		$this->load->view('back-end/footer/footer');	
	}

	public function addusers(){
		$fal['faculties']   = $this->ModelDashboard->Load_FacultiesMajors()->result();
		$fal['majors']    	= $this->ModelDashboard->Load_QMajors()->result();
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/addusers',$fal);
		$this->load->view('back-end/footer/footer');	
	}

	public function deleteuser() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->deleteuser($id);
        redirect("users");
	}

	public function listuser(){
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/listuser');
		$this->load->view('back-end/footer/footer');	
	}

	public function insertusers(){
       	$imageUrl = base_url();
		$nim    		= $this->input->post('nim');
		$nama   	 	= $this->input->post('nama');
		$email    		= $this->input->post('email');
		$phone    		= $this->input->post('phone');
		$id_faculty     = $this->input->post('id_faculty');
		$id_major    	= $this->input->post('id_major');
		$graduated    	= $this->input->post('graduated');
		$address    	= $this->input->post('address');

		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	 
		$targetPath		= '/var/www/html/Trisakti/images/'; 
		$targetFile 	= $targetPath . $fileName ;

		move_uploaded_file($tempFile, $targetFile);

		$users = array(
			'nim'  			=> $nim,
			'name'  		=> $nama,
			'email'  		=> $email,
			'password'		=> '1',
			'phone'  		=> $phone,
			//'avatar'		=> $imageUrl."images/".$fileName,
			'id_faculty'  	=> $id_faculty,
			'id_major'  	=> $id_major,
			'graduated'  	=> $graduated,
			'address'		=> $address
		);

		$this->ModelDashboard->insertusers($users); 
        redirect('users');
        
	}

	public function edituser(){
		$id = $this->uri->segment(2);
		$user['faculties']    = $this->ModelDashboard->Load_FacultiesMajors()->result();
		$user['majors']    = $this->ModelDashboard->Load_QMajors()->result();
		$user['users']    = $this->ModelDashboard->edituser($id,'users')->result();	
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/edituser',$user);
		$this->load->view('back-end/footer/footer');	
	}

	public function updateuser() {
		$id = $this->input->post('id');
		$nim = $this->input->post('nim');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		$id_faculty = $this->input->post('id_faculty');
		$id_major = $this->input->post('id_major');
		$address = $this->input->post('address');
		$graduated = $this->input->post('graduated');
		

		if($id_faculty == NULL && $id_major == NULL){
			
			$data = array(
				'nim' 		=> $nim,
				'name' 		=> $name,
				'email' 	=> $email,
				'phone' 	=> $phone,
				'address' 	=> $address,
				'graduated' => $graduated
			);
			$where = array(
				'id' => $id
			);

		}elseif($id_faculty == NULL){
			$data = array(
				'nim' 		=> $nim,
				'name' 		=> $name,
				'email' 	=> $email,
				'id_major' 	=> $id_major,
				'phone' 	=> $phone,
				'address'	=> $address,
				'graduated'	=> $graduated
			);
			$where = array(
				'id' => $id
			);

		}elseif($id_major == NULL){
			$data = array(
				'nim' 			=> $nim,
				'name' 			=> $name,
				'email' 		=> $email,
				'id_faculty' 	=> $id_faculty,
				'phone' 		=> $phone,
				'address'		=> $address,
				'graduated'		=> $graduated
			);
			$where = array(
				'id' => $id
			);
		}else{
			$data = array(
				'nim' 			=> $nim,
				'name' 			=> $name,
				'email' 		=> $email,
				'id_faculty' 	=> $id_faculty,
				'id_major' 		=> $id_major,
				'phone' 		=> $phone,
				'address'		=> $address,
				'graduated'		=> $graduated
			);
			$where = array(
				'id' => $id
			);
		}
		$this->ModelDashboard->updatedata_user($where,$data,'users');
		redirect("users");
		
	}

	public function insertcategories(){
       
		$title    = $this->input->post('title');

		$categories = array(
			'category'  => $title
          );

        $this->ModelDashboard->insertcategories($categories); 
        $this->session->set_flashdata('berhasil_pic', 'Berhasil Upload Foto');
        redirect('categories');
        
	}

	public function editcategories(){
		$id = $this->uri->segment(2);
		
		$cat['categories']    = $this->ModelDashboard->editcategories($id,'categories')->result();	

		$this->load->view('back-end/header/header');
		$this->load->view('back-end/editcategories',$cat);
		$this->load->view('back-end/footer/footer');	
	}

	public function updatecategories() {
		$id = $this->input->post('id');
		$title = $this->input->post('title');
		
		$data = array(
			'category' => $title
		);
		
		$where = array(
			'id_category' => $id
		);
		$this->ModelDashboard->updatedata_cat($where,$data,'categories');
		redirect("categories");
		
	}
	

	public function delcategories() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->delcategories($id);
        redirect("categories");
	}

	//End Categories Admin //


    // Faculties 

    public function faculties()
	{
		$fal['faculties']    = $this->ModelDashboard->Load_FacultiesMajors()->result();
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/faculties',$fal);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function addfaculties(){
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/addfaculties');
		$this->load->view('back-end/footer/footer');	
	}

	public function insertfaculties(){
       
		$faculty    = $this->input->post('faculty');

		$faculties = array(
			'faculty'  => $faculty
          );
     
        $this->ModelDashboard->insertfaculties($faculties); 
        $this->session->set_flashdata('berhasil_pic', 'Berhasil Upload Foto');
        redirect('faculties');
        
	}

	public function delfaculties() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->delfaculties($id);
        redirect("faculties");
	}

	public function editfaculties(){
		$id = $this->uri->segment(2);
		
		$fal['faculties']    = $this->ModelDashboard->editfaculties($id,'faculties')->result();	

		$this->load->view('back-end/header/header');
		$this->load->view('back-end/editfaculties',$fal);
		$this->load->view('back-end/footer/footer');	
	}

	public function updatefaculties() {
		$id = $this->input->post('id');
		$faculty = $this->input->post('faculty');
		
		$data = array(
			'faculty' => $faculty
		);
		
		$where = array(
			'id_faculty' => $id
		);
		$this->ModelDashboard->updatedata_fal($where,$data,'faculties');
		redirect("faculties");
		
	}

	//End Faculties //

	// Majors

	public function majors()
	{
		$maj['majors']    = $this->ModelDashboard->Load_QMajors()->result();
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/majors',$maj);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function addmajors(){
		$fal['faculty'] = $this->ModelDashboard->Load_Faculties()->result();

		$this->load->view('back-end/header/header');
		$this->load->view('back-end/addmajors',$fal);
		$this->load->view('back-end/footer/footer');	
	}

	public function insertmajors(){
       
		$id_faculty		= $this->input->post('id_faculty');
		$majors 		= $this->input->post('majors');

		$majors = array(
			'major'  => $majors,
			'id_faculty' => $id_faculty
          );
     
        $this->ModelDashboard->insertmajors($majors); 
        $this->session->set_flashdata('berhasil_pic', 'Berhasil Upload Foto');
        redirect('majors');
        
	}

	public function delmajors() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->delmajors($id);
        redirect("majors");
	}

	public function editmajors(){
		$id = $this->uri->segment(2);
		$maj['majors']    = $this->ModelDashboard->editmajors($id,'majors')->result();	
		$maj['faculties']	=$this->ModelDashboard->Load_Faculties()->result();
 		$this->load->view('back-end/header/header');
		$this->load->view('back-end/editmajors',$maj);
		$this->load->view('back-end/footer/footer');	
	}

	public function updatemajors() {
		$id = $this->input->post('id');
		$major = $this->input->post('major');
		$id_faculty = $this->input->post('id_faculty');

		if($id_faculty == NULL){
			$data = array(
				'major' => $major
			);
		
			$where = array(
				'id_major' => $id
			);
			
			$this->ModelDashboard->updatedata_maj($where,$data,'majors');
			
		}else{
			$data = array(
				'major' => $major,
				'id_faculty' => $id_faculty
			);
		
			$where = array(
				'id_major' => $id
			);
			
			$this->ModelDashboard->updatedata_maj($where,$data,'majors');
			
		}
		redirect("majors");
	}

	// End Major //
	

	// User

	public function users()
	{
		$user['users']    = $this->ModelDashboard->Load_Users()->result();
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/users',$user);
		$this->load->view('back-end/footer/datatables_footer');

	}

	// End User


	// News 

	public function allnews()
	{

		$allnews['news'] 	= $this->ModelDashboard->Load_News()->result();

		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/allnews',$allnews);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function editnews() {
	    $id = $this->uri->segment(2);
	    $status = 'Agree';
	    
	    $data = array(
			'status' => $status
		);
		
		$where = array(
			'id_news' => $id
		);

        $this->ModelDashboard->editnews($where,$data,'news');
       	redirect("allnews");
	}

	public function backcareers()
	{
		$results['careers']    = $this->ModelDashboard->Load_Career()->result();
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/career',$results);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function delcareers() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->delcareers($id);
        redirect("backcareers");
	}

	// End News


	public function pending()
	{

		$news['pending'] 	= $this->ModelDashboard->News_Pending()->result();

		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/newspending',$news);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function pendingnews() {
	    $id = $this->uri->segment(2);
	    $status = 'Agree';
	    
	    $data = array(
			'status' => $status
		);
		
		$where = array(
			'id_news' => $id
		);

        $this->ModelDashboard->editnews($where,$data,'news');
       	redirect("pending");
	}

	public function allcomments()
	{
		$com['comments']    = $this->ModelDashboard->Load_Comments()->result();
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/allcomments',$com);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function delcomments() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->delcomments($id);
        redirect("allcomments");
	}

	//End News

	// Logout

	public Function logout(){
		$this->session->sess_destroy($id);
		redirect('trisakti_logadmin');
    }

    //End Logout


    // Title Pols 

    public function title_poll()
	{
		$pols['title_pols']    = $this->ModelDashboard->Load_Polls()->result();
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/title_pols',$pols);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function delpolls() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->delpolls($id);
        //redirect("polls");
	}

	public function addpolls(){
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/addpolls');
		$this->load->view('back-end/footer/footer');	
	}

	public function insert_titlepolls(){
       	$imageUrl = base_url();
		$title   		= $this->input->post('title');
		$content   		= $this->input->post('content');
		$picture 		= $this->input->post('picture');
		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];	 
		$targetPath		= '/var/www/html/Trisakti/images/'; 
		$targetFile 	= $targetPath . $fileName ;

		move_uploaded_file($tempFile, $targetFile);
 
		$polls = array(
			'title_poll'			=> $title,
			'thumbnail_poll'		=> $imageUrl."images/".$fileName,
			'content_poll'			=> $content
          );
        $this->ModelDashboard->insert_titlepolls($polls); 
        $this->session->set_flashdata('berhasil_pic', 'Berhasil Upload Foto');
        redirect('polls');
        
	}
	public function edit_titlepolls(){
		$id = $this->uri->segment(2);
		$title_poll['polls']    = $this->ModelDashboard->editpolls($id,'polls')->result();	

		$this->load->view('back-end/header/header');
		$this->load->view('back-end/editpolls',$title_poll);
		$this->load->view('back-end/footer/footer');	
	}

	public function uppolls() {
		$imageUrl = base_url();
		$id 			= $this->input->post('id');
		$title 			= $this->input->post('title');
		$picture 		= $this->input->post('picture');
		$content 		= $this->input->post('content');
		$tempFile 		= $_FILES['picture']['tmp_name'];	
		$fileName 		= time().$_FILES['picture']['name'];
		$targetPath		= '/var/www/html/Trisakti/images/'; 

		$targetFile 	= $targetPath . $fileName ;
		move_uploaded_file($tempFile, $targetFile);
 
		$x = substr($fileName,10);
		
		if($content == NULL AND $x == ""){
			
			$data = array(
				'title_poll' => $title
			);
		
			$where = array(
				'id_poll' => $id
			);
			$this->ModelDashboard->update_titlepolls($where,$data,'polls');

		}
		elseif($x == ""){
				$data = array(
				'title_poll' 	=> $title,
				'content_poll'	=> $content
			);
		
			$where = array(
				'id_poll' => $id
			);
			$this->ModelDashboard->update_titlepolls($where,$data,'polls');

		}

		elseif($content == NULL){
				$data = array(
				'title_poll' => $title,
				'thumbnail_poll' =>$imageUrl."images/".$fileName
			);
		
			$where = array(
				'id_poll' => $id
			);
			$this->ModelDashboard->update_titlepolls($where,$data,'polls');
		
		}else{
				$data = array(
				'title_poll' => $title,
				'thumbnail_poll' =>$imageUrl."images/".$fileName,
				'content_poll'	=> $content
			);
		
			$where = array(
				'id_poll' => $id
			);
			$this->ModelDashboard->replacePolls($id);
			$this->ModelDashboard->update_titlepolls($where,$data,'polls');
		
		}
		redirect("polls");
		
	}

    // End Title pols
    

    // Candidate

	public function candidate()
	{
		$can['candidate']    = $this->ModelDashboard->Load_Candidate()->result();
		//var_dump($maj);
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/candidate',$can);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function addcandidate(){


		$can['candidate'] = $this->ModelDashboard->Load_Polls()->result();
		$this->load->view('back-end/header/header');
		$this->load->view('back-end/addcandidate',$can);
		$this->load->view('back-end/footer/footer');	
	}

	public function insertcandidate(){
		$imageUrl = base_url();
		$candidate 		= $this->input->post('candidate');
		$id_poll 		= $this->input->post('id_poll');
		$picture 		= $this->input->post('picture');
		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];
 		 
		$targetPath		= '/var/www/html/Trisakti/images/'; 
		$targetFile 	= $targetPath . $fileName ;
		move_uploaded_file($tempFile, $targetFile);
 
		$polls_choice = array(
			'candidate'  	=> $candidate,
			'avatar' 		=> $imageUrl."images/".$fileName,
			'id_poll' 		=> $id_poll

		);
		
		$this->ModelDashboard->upload_candidate($polls_choice); 
		$this->session->set_flashdata('berhasil_pic', 'Berhasil Upload Foto');
		redirect('candidate');
		  
	}
	

	public function editcandidate(){
		$id = $this->uri->segment(2);
		$maj['polls']    	= $this->ModelDashboard->editpolls_id($id,'polls')->result();	
		$maj['title_poll']	= $this->ModelDashboard->Load_Polls()->result();
 		$this->load->view('back-end/header/header');
		$this->load->view('back-end/editcandidate',$maj);
		$this->load->view('back-end/footer/footer');	
	}

	public function updatecandidate() {
		$imageUrl = base_url();
		$id 			= $this->input->post('id');
		$candidate 		= $this->input->post('candidate');
		$picture 		= $this->input->post('picture');
		$tempFile 		= $_FILES['picture']['tmp_name'];
		$fileName 		= time().$_FILES['picture']['name'];
 		 
		$targetPath		= '/var/www/html/Trisakti/images/'; 
		$targetFile 	= $targetPath . $fileName ;
		move_uploaded_file($tempFile, $targetFile);
 		
 		$id_poll = $this->input->post('id_poll');
		$x = substr($fileName, 10);

		if($id_poll == NULL AND $x == ""){
			$data = array(
				'candidate' => $candidate
			);
			
			$where = array(
				'idpoll_choice' => $id
			);
			$this->ModelDashboard->updatedata_can($where,$data,'polls_choice');
		}
		elseif($x == ""){
			$data = array(
				'candidate' => $candidate,
				'id_poll' => $id_poll

			);
			
			$where = array(
				'idpoll_choice' => $id
			);
			$this->ModelDashboard->updatedata_can($where,$data,'polls_choice');

		}elseif($id_poll == NULL){
			$data = array(
				'candidate' => $candidate,
				'avatar' => $imageUrl."images/".$fileName


			);
			
			$where = array(
				'idpoll_choice' => $id
			);
			$this->ModelDashboard->replaceCandidate($id);
			$this->ModelDashboard->updatedata_can($where,$data,'polls_choice');
		}
		
		else{

		}
		redirect("candidate");	
	}

	public function deleteCandidate() {
        $id = $this->uri->segment(2);
        $this->ModelDashboard->deleteCandidate($id);
        redirect("candidate");
	}

	public function answers()
	{
		$maj['voted']    = $this->ModelDashboard->voted()->result();
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/answers',$maj);
		$this->load->view('back-end/footer/datatables_footer');

	}

    // End Candidate

	// Reports

	public function reports()
	{
		$rep['reports']    = $this->ModelDashboard->Load_Report()->result();
		//var_dump($rep);
		
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/reports',$rep);
		$this->load->view('back-end/footer/datatables_footer');

	}

	public function registerusers()
	{
		$allusers['users'] 	= $this->ModelDashboard->Load_UsersVerify()->result();
		$this->load->view('back-end/header/datatables_header');
		$this->load->view('back-end/allusers',$allusers);
		$this->load->view('back-end/footer/datatables_footer');
	}

	public function verifyUsers() {
		$id = $this->uri->segment(2);
		$data = array(
			'verified' => '1'
		);
		$where = array(
			'id' => $id
		);
		$this->ModelDashboard->updatedata_cat($where,$data,'users');
		redirect("registerusers");
		
	}

	// End Reports

	public function sendreports()
	{

		$id = $this->uri->segment(2);
		
		$rep['report']    = $this->ModelDashboard->editReport($id,'reports')->result();	

		$this->load->view('back-end/header/header');
		$this->load->view('back-end/send_report',$rep);
		$this->load->view('back-end/footer/footer');	

	}

}
