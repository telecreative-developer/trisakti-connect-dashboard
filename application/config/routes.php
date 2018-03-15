<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

//Back-end

$route['default_controller'] = 'Trisakti';
$route['dashboard'] = 'DashboardController/index';
$route['login_valid'] = 'LoginController/login_valid';
$route['trisakti_logadmin'] = 'LoginController/index';


$route['categories'] = 'DashboardController/categories';
$route['addcategories'] = 'DashboardController/addcategories';
$route['delcategories/:any'] = 'DashboardController/delcategories';
$route['insertcategories'] = 'DashboardController/insertcategories';
$route['editcategories/:any'] = 'DashboardController/editcategories';


$route['faculties'] = 'DashboardController/faculties';
$route['addfaculties'] = 'DashboardController/addfaculties';
$route['editfaculties/:any'] = 'DashboardController/editfaculties';
$route['insertfaculties'] = 'DashboardController/insertfaculties';
$route['delfaculties/:any'] = 'DashboardController/delfaculties';


$route['majors'] = 'DashboardController/majors';
$route['addmajors'] = 'DashboardController/addmajors';
$route['insertmajors'] = 'DashboardController/insertmajors';
$route['delmajors/:any'] = 'DashboardController/delmajors';
$route['editmajors/:any'] = 'DashboardController/editmajors';


$route['users'] = 'DashboardController/users';
$route['registerusers'] = 'DashboardController/registerusers';
$route['verifyusers/:any'] = 'DashboardController/verifyUsers';
$route['allnews'] = 'DashboardController/allnews';
$route['editnews/:any'] = 'DashboardController/editnews';
$route['pendingnews/:any'] = 'DashboardController/pendingnews';
$route['pending'] = 'DashboardController/pending';
$route['backcareers'] = 'DashboardController/backcareers';
$route['delcareers/:any'] = 'DashboardController/delcareers';
$route['allcomments'] = 'DashboardController/allcomments';
$route['delcomments/:any'] = 'DashboardController/delcomments';



$route['polls'] = 'DashboardController/title_poll';
$route['edit_titlepolls/:any'] = 'DashboardController/edit_titlepolls';
$route['addpolls'] = 'DashboardController/addpolls';
$route['uppolls'] = 'DashboardController/uppolls';
$route['delpolls/:any'] = 'DashboardController/delpolls';
$route['insert_titlepolls'] = 'DashboardController/insert_titlepolls';

$route['delallnews/:any'] = 'DashboardController/delallnews';
$route['delnews/:any'] = 'DashboardController/delnews';

$route['candidate'] = 'DashboardController/candidate';
$route['addcandidate'] = 'DashboardController/addcandidate';
$route['editcandidate/:any'] = 'DashboardController/editcandidate';
$route['updatecandidate'] = 'DashboardController/updatecandidate';
$route['insertcandidate'] = 'DashboardController/insertcandidate';
$route['deleteCandidate/:any'] = 'DashboardController/deleteCandidate';


$route['answers'] = 'DashboardController/answers';

$route['reports'] = 'DashboardController/reports';
$route['reply_reports/:any'] = 'DashboardController/sendreports';

$route['addusers'] = 'DashboardController/addusers';
$route['insertusers'] = 'DashboardController/insertusers';
$route['deleteuser/:any'] = 'DashboardController/deleteuser';
$route['edituser/:any'] = 'DashboardController/edituser';
$route['updateuser'] = 'DashboardController/updateuser';

// End Backend


//Front-end

$route['article/:any'] = 'Trisakti/article';
$route['index'] = 'Trisakti/index';

$route['category/:any/:any'] = 'Trisakti/category';
$route['search'] = 'Trisakti/search';


$route['vote'] = 'Trisakti/vote';
$route['list_vote/:any'] = 'Trisakti/list_vote';
$route['votenow/:any/:any'] = 'Trisakti/votenow';


$route['careers'] = 'Trisakti/careers';
$route['overviews/:any'] = 'Trisakti/overviews';
$route['searchcareers'] = 'Trisakti/searchcareers';
// End Front-end

$route['logout'] = 'DashboardController/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
