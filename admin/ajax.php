<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'update_account'){
	$save = $crud->update_account();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_course"){
	$save = $crud->save_course();
	if($save)
		echo $save;
}

if($action == "delete_course"){
	$delete = $crud->delete_course();
	if($delete)
		echo $delete;
}
if($action == "update_alumni_acc"){
	$save = $crud->update_alumni_acc();
	if($save)
		echo $save;
}
if($action == "save_gallery"){
	$save = $crud->save_gallery();
	if($save)
		echo $save;
}
if($action == "delete_gallery"){
	$save = $crud->delete_gallery();
	if($save)
		echo $save;
}

if($action == "save_career"){
	$save = $crud->save_career();
	if($save)
		echo $save;
}
if($action == "delete_career"){
	$save = $crud->delete_career();
	if($save)
		echo $save;
}


if($action == "delete_news"){
	$save = $crud->delete_news();
	if($save)
		echo $save;
}

if($action == "delete_notice"){
	$save = $crud->delete_notice();
	if($save)
		echo $save;
}

if($action == "delete_stories"){
	$save = $crud->delete_stories();
	if($save)
		echo $save;
}






if($action == "save_help"){
	$save = $crud->save_help();
	if($save)
		echo $save;
}
if($action == "delete_help"){
	$save = $crud->delete_help();
	if($save)
		echo $save;
}

if($action == "save_comment"){
	$save = $crud->save_comment();
	if($save)
		echo $save;
}
if($action == "delete_comment"){
	$save = $crud->delete_comment();
	if($save)
		echo $save;

}

if($action == "save_event"){
	$save = $crud->save_event();
	if($save)
		echo $save;
}
if($action == "delete_event"){
	$save = $crud->delete_event();
	if($save)
		echo $save;
}	
if($action == "participate"){
	$save = $crud->participate();
	if($save)
		echo $save;
}


if($action == "save_news"){
	$save = $crud->save_news();
	if($save)
		echo $save;
}
if($action == "delete_news"){
	$save = $crud->delete_news();
	if($save)
		echo $save;
}
if($action == "save_notice"){
	$save = $crud->save_notice();
	if($save)
		echo $save;
}
if($action == "delete_notice"){
	$save = $crud->delete_notice();
	if($save)
		echo $save;
}
if($action == "save_stories"){
	$save = $crud->save_stories();
	if($save)
		echo $save;
}
if($action == "delete_stories"){
	$save = $crud->delete_stories();
	if($save)
		echo $save;
}
ob_end_flush();
?>
