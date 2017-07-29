<?php
class LoginController extends ControllerBase
{

    public function indexAction()
    {
    	
    }

    public function registerAction(){
    	$user = new Users();
    	echo 'xxx';
    	$success = $user->save(
            $this->request->getPost(),
            array('name','email')
    	);

    	if($success){
             echo 'Thanks for registing!';
    	}else{
             echo 'sorry,the reason :';
             foreach($user->getMessages() as $message){
             	echo $message->getMessage() , '<br/>';
             }
    	}

    	$this->view->disable();
    }

}