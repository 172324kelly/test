<?php # add page.php-Script 9.15
//This page boh displays and handles the "add a page" form.

//Need the utilities file:
require('includes/utilities.inc.php')://??????utilitie改成utilities

// Redirect if the user doesn't have permission:
if(!$user->canCreatePage()){
	header("Location:index.php");
	exit;
}

//Create a new form:
set_include_path(get_include_path().PATH_SEPARATOR.'/usr/local/pear/share/pear/');
require('HTML/QuickForm2.php');
$form=new HTML_QuickForm2('addPageForm');

//Add the title field:
$title=$form->addElement('text','title');
$title->setLabel('Page Title');
$title->addFilter('strip_tags');
$title->addRule('required','Please enter a page title.');

//Add the content field:
$content=$form->addElement('textarea','content');
$content->setLabel('Page Content');
$content->addFilter('trim');
$content->addRule('required','Please enter the page content.');

//Add the submit button:
$submit=$form->addElement('submit','submit',array('value'=>'Add This Page'));

//Check for a form submission:
if($_SERVER['REQUEST_METHOD']='POST'){//Handle the form submission
	//Validate the form data:
	if($form->validate()){
		//Insert into the database:
		$q = 'INSERT INTO pages (creatorld,title,content,dataAdded) VALUES (:creatorld, :title, :content, NOW())';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute(array(':creatorld' => $user->getld(), 'title' => $title->getValue(), ':content' => $content->getValue()));

		//Freeze the foem upon success:
		if($r){
			$form->toggleFrozen(true);
			$form->removeChild($submit);
		}

	}//End of form validation IF.

}//End of form submission IF.

//Show the page:
$pageTitle='Add a Page';
include('includes/header.inc.php');
include('views/add_page.html');
include('includes/footer.inc.php');
?>














