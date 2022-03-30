<?php

session_start();

function signup($data)  // expecting data
{
    $errors = array();

    //validate
    if(!preg_match('/^[a-zA-Z]+$/', $data['username'])){
        $errors[] = "Please enter a valid username, upper and lowercase letters only";
    }

    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
        $errors[] = "Please enter a valid email";
    }

    if($data['email'] != $data['email2']){
        $errors[] = "Emails must match";
    }

    if(strlen(trim($data['password'])) < 4){
        $errors[] = "Password must be atleast 4 characters long";
    }

    if($data['password'] != $data['password2']){
        $errors[] = "Passwords must match";
    }

    $check = database_run("select * from users where email = :email limit 1", ['email'=>$data['email']]);
    if(is_array($check)){
        $errors[] = "That email already exists";
    }

    //save
    if(count($errors) == 0){

        $arr['username'] = $data['username'];
        $arr['email'] = $data['email'];
        $arr['password'] = hash('sha256', $data['password']);
        $arr['date'] = date("Y-m-d H:i:s");

        $query = "insert into users (username,email,password,date) values 
        (:username,:email,:password,:date)";

        database_run($query,$arr);
    }
    return $errors;
}

function login($data)
{
    $errors = array();

    //validate
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
		$errors[] = "Please enter a valid email";
	}

    if(strlen(trim($data['password'])) < 4){
		$errors[] = "Password must be atleast 4 chars long";
	}

    //check
    if(count($errors) == 0) {

        $arr['email'] = $data['email'];
        $password = hash('sha256', $data['password']);

        $query = "select * from users where email = :email limit 1";

        $row = database_run($query, $arr);

        if(is_array($row)){
            $row = $row[0];

            if($password === $row->password){
                $_SESSION['USER'] = $row;
                $_SESSION['LOGGED_IN'] = true;
            }
            else{
                $errors[] = "wrong email or password";
            }
        }
        else{
            $errors[] = "wrong email or password";
        }
    }

    return $errors;
}



/*function save($data) // save project
{
    $errors = array();

   /* $check = database_run("select * from content where content_name = :content_name limit 1", ['content_name'=>$data['content_name']]);
    if(is_array($check)){
        $errors[] = "That project name already exists";
    }

    //save
    if(count($errors) == 0){
        $arr['content_name'] = $data['content_name'];
        $arr['content'] = $data['content'];
    
        $query = "insert into content (content_name,content) values 
        (:content_name,:content)";

        database_run($query,$arr);
    }*/

  /*  return $errors;
}*/



function database_run($query,$vars = array()) {
    $string = "mysql:host=localhost;dbname=myfirstwebsite"; // database name
    $con = new PDO($string,'root','');

    if(!$con){
        return false;
    }

    $stm = $con->prepare($query);
    $check = $stm->execute($vars);

    if($check){
        $data = $stm->fetchAll(PDO::FETCH_OBJ);

        if(count($data) > 0){
            return $data;
        }
    }

    return false;
}

function check_login($redirect = true){
    
    if(isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])){
        return true;
    }

    if($redirect){
        header("Location: HomePage.php");
        die;
    }
    else{
        return false;
    }
}

function check_verified(){
    
    $id = $_SESSION['USER']->id;
    $query = "select * from users where user_id = '$id' limit 1";
    $row = database_run($query);

    if(is_array($row)){
        $row = $row[0];

        if(is_array($row)){
            $row = $row[0];

            if($row ->email == $row->email_verified){
                return true;
            }
        }

        return false;
    }
}