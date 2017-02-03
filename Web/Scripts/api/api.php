<?php
	require_once("Rest.inc.php");
        
	class API extends REST {
		public $data = "";
        public $url = "http://127.0.0.1/projects/web/Home.php";
        public $url2 = "http://127.0.0.1/projects/web/Unsuccessful.php";
        public $url3 = "http://127.0.0.1/projects/web/ViewUsers.php";
        public $url4 = "http://127.0.0.1/projects/web/index.php";
        public $url5 = "http://127.0.0.1/projects/web/Register.php";
        public $url6 = "http://127.0.0.1/projects/web/Requirements.php";
        public $url7 = "http://127.0.0.1/projects/web/PasswordMatch.php";
        public $url8 = "http://127.0.0.1/projects/web/InvalidEmail.php";
        public $emailErr = "";
        public $passErr = "";
        public $passConfErr = "";
        public $ipErr = "";
        //Script Variables
        //public dir = getcwd();
        //public $dir2 = "../Test3/";
                
		const DB_SERVER = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB = "wdmtf";
								  
		private $db = NULL;
		public function __construct(){
			parent::__construct();				// Init parent contructor
			$this->dbConnect();					// Initiate Database connection
		}
                public function getcwd ()
                {
                }
		/*
		 *  Database connection
		*/
		private function dbConnect(){
			$this->db = @mysql_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD);
			if($this->db)
				mysql_select_db(self::DB,$this->db);
		}
		/*
		 * Public method for access api.
		 * This method dynmically call the method based on the query string
		 *
		 */
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['rquest'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);				// If the method not exist with in this class, response would be "Page not found".
		}
                public function Redirect() {
                    if (headers_sent()){
                        die('<script type="text/javascript">window.location.href="' . $this->url2 . '";</script>');
                            }else{
                                  header('Location: ' . $this->url);
                             die();
                            }
                }
                public function Unsucessful() {
                    if (headers_sent()){
                        die('<script type="text/javascript">window.location.href="' . $this->url2 . '";</script>');
                            }else{
                                  header('Location: ' . $this->url2);
                             die();
                            }
                }
                public function GoBack (){
                    if (headers_sent()){
                        die('<script type="text/javascript">window.location.href="' . $this->url4 . '";</script>');
                            }else{
                                  header('Location: ' . $this->url4);
                             die();
                            }
                }
                 public function GoBackRegister (){
                    if (headers_sent()){
                        die('<script type="text/javascript">window.location.href="' . $this->url5 . '";</script>');
                            }else{
                                  header('Location: ' . $this->url5);
                             die();
                            }                          
                }
                Function PasswordError (){
                    if (headers_sent()){
                        die('<script type="text/javascript">window.location.href="' . $this->url6 . '";</script>');
                            }else{
                                  header('Location: ' . $this->url6);
                             die();
                            }
                }
                public function Logout (){
                   session_start();
                    //ending the session for the user
                    session_destroy();
                    //then redirecting a user to the home page
                   $this->GoBack();
                }
               Public function pingAddress($ip) {
                  $pingresult = exec("ping  -n 3 $ip", $outcome, $status);
                  if (0 == $status) {
                    //$status = "alive => ( ".print_r($outcome)." )";
                  } else if (1 == $status) {
                       $status = "dead";
                  }
                  else{
		 $status = "poor";
                 }
                }
                
		/*
		 *	Simple login API
		 *  Login must be POST method
		 *  email : <USER EMAIL>
		 *  pwd : <USER PASSWORD>
		 */
		private function login()
		{
			// Cross validation if the request method is POST else it will return "Not Acceptable" status
			if($this->get_request_method() != "POST")
			{
				$this->response('',406);
			}
			//Validate password
                        $email = $this->_request['user_email'];
			$password = $this->_request['user_password'];
                        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $password)){
                            $this->PasswordError();
                        }
                        else {
                            $passwordhash = hash('sha256', $password); //hash password using sha256
                        }			
			// Input validations
			if(!empty($email) and !empty($password))
			{
				if(filter_var($email, FILTER_VALIDATE_EMAIL))
				{
					$sql = mysql_query("SELECT user_id, user_fullname, user_email FROM users WHERE user_email = '$email' AND user_password = '".md5($passwordhash)."' LIMIT 1", $this->db);
					if(mysql_num_rows($sql) > 0)
					{
                                            
                                        session_start();
                                        $_SESSION['csir'] = $email;
										
                                        //echo "logged in";
						 $result = mysql_fetch_array($sql,MYSQL_ASSOC);
						// If success everythig is good send header as "OK" and user details
						//$this->response($this->json($result), 200);
					//$this->response('Successfully logged in',200);
					
                                           $this->Redirect();
					}
					//$this->response('', 204);	// If no records "No Content" status
                                        $this->Unsucessful();
				}
                                //$this->response('Wrong password or username',203);
                                //echo "Wrong password or email". '<script type="text/javascript">window.location.href="' . $this->url2 . '";</script>';
			}
			// If invalid inputs "Bad Request" status message and reason
			//$error = array('status' => "Failed", "msg" => "Invalid Email address or Password");
			//$this->response($this->json($error), 400);
		} //close function
		
		private function users()
		{
			// Cross validation if the request method is GET else it will return "Not Acceptable" status
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
                $sql = mysql_query("SELECT user_id, user_fullname, user_email FROM users", $this->db);
			if(mysql_num_rows($sql) > 0){
				$result = array();
				while($rlt = mysql_fetch_array($sql,MYSQL_ASSOC)){
					$result[] = $rlt;
				}
				// If success everythig is good send header as "OK" and return list of users in JSON format
				$this->response($this->json($result), 200);
                               // $this->DisplayUsers();
			}
			$this->response('No content',204);	// If no records "No Content" status
		}
		private function user()
		{
			$id = (int)$this->_request['user_id'];
			// Cross validation if the request method is GET else it will return "Not Acceptable" status
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			$sql = mysql_query("SELECT user_id, user_fullname, user_email FROM users WHERE user_id = $id", $this->db);
			if(mysql_num_rows($sql) > 0){
				$result = array();
				while($rlt = mysql_fetch_array($sql,MYSQL_ASSOC)){
					$result[] = $rlt;
				}
				// If success everythig is good send header as "OK" and return list of users in JSON format
				$this->response($this->json($result), 200);
			}
			$this->response('',204);	// If no records "No Content" status
		}
		private function deleteUser()
		{
			// Cross validation if the request method is DELETE else it will return "Not Acceptable" status
			if($this->get_request_method() != "POST"){
				$this->response('',406);
			}
			$id = (int)$this->_request['user_id'];
			if($id > 0){
				mysql_query("DELETE FROM users WHERE user_id = $id");
				$success = array('status' => "Success", "msg" => "Successfully one record deleted.");
				$this->response($this->json($success),200);
			}else
				$this->response('',204);	// If no records "No Content" status
		}
		private function insertUser()
		{
                    if($_SERVER['REQUEST_METHOD'] == "POST")
                    {
                       $user_fullname = isset($_POST['user_fullname']) ? mysql_real_escape_string($_POST['user_fullname']) : "";
                       $user_email = isset($_POST['user_email']) ? mysql_real_escape_string($_POST['user_email']) : "";
                       $user_password = isset($_POST['user_password']) ? mysql_real_escape_string($_POST['user_password']) : "";
                       $user_ipaddress = isset($_POST['user_ipaddress']) ? mysql_real_escape_string($_POST['user_ipaddress']) : "";
                       $user_passwordconf = isset($_POST['user_passwordconf']) ? mysql_real_escape_string($_POST['user_passwordconf']) : ""; 
                       
                       //Validate email
                       if(filter_var($user_email, FILTER_VALIDATE_EMAIL))
                       {
                           if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $user_password) && preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,16}$/', $user_passwordconf))
                           {
                                if ($user_password == $user_passwordconf ) {   //check if passwords match
                                    $user_passwordhash = hash('sha256', $user_password); //hash password
                                    $pingresult = exec("ping  -n 3 $user_ipaddress", $outcome, $status);
;
                                    if(0 == $status)
                                    {                                      
                                        //Insert data into data base
                                        $sql = mysql_query("INSERT INTO users (user_fullname, user_email, user_password) VALUES ('$user_fullname', '$user_email', '".md5($user_passwordhash)."')");
                                        //$qur = $conn->query($sql);			
										$query2 ="SELECT user_id FROM USERS WHERE user_email='". $user_email ."'";
										$result = mysqli_query($conn,$query2);
										while (@$row = mysqli_fetch_row($result)){
											//var_dump($row[2])."\r\n";
										   //taking data from database to views the form table
										  $user_id=$row[0];
										  
										}
				
										$query3 ="SELECT file_id FROM FILES";
										$result3 = mysqli_query($conn,$query3);
										while (@$row = mysqli_fetch_row($result3)){
											//var_dump($row[2])."\r\n";
										   //taking data from database to views the form table
										  $file_id=$row[0];
										}
										//$this->response('User added successfully',200); 
                                        $this->GoBack();
                                       // $qur = $conn->query($sql);
                                    }
                                    else if (1 == $status)
                                    {
                                        $this->response('Invalid IP Address/URL',203);
                                    }
                                    else
                                    {
                                        $this->response('Poor',203);
                                    }
                                }
                                //echo "Passwords don't match";
                                $this->response('Passwords do not match',203);
                           }
                           else
                           {
                               //echo "Password does't meet requirements";
                               $this->response("Password does't meet requirements",203);
                           }
                       }
                       else
                       {
                           //echo "Invalid email";
                           $this->response('Invalid email',203);
                       }
                    }
                    $mysqli_close($conn);
                    /* Output header */
                    header('Content-type: application/json');
                    echo json_encode($json);
                }
			
		private function updateUser()
		{
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$user_id = isset($_POST['user_id']) ? mysql_real_escape_string($_POST['user_id']) : "";
				$user_fullname = isset($_POST['user_fullname']) ? mysql_real_escape_string($_POST['user_fullname']) : "";
				$user_email = isset($_POST['user_email']) ? mysql_real_escape_string($_POST['user_email']) : "";
				$user_password = isset($_POST['user_password']) ? mysql_real_escape_string($_POST['user_password']) : "";
				$user_status = isset($_POST['user_status']) ? mysql_real_escape_string($_POST['user_status']) : "";
				$user_passwordhash = hash('sha256', $user_password);
				// Insert data into data base
				mysql_query("UPDATE users SET user_fullname='$user_fullname', user_email='$user_email', user_password='".md5($user_passwordhash)."',user_status='$user_status' WHERE user_id='$user_id'");
				$result = mysql_fetch_array($mysql_query,MYSQL_ASSOC);
						// If success everythig is good send header as "OK" and user details
						$this->response($this->json($result), 200);
				$qur = $conn->query($mysql_query);
				if($qur){
					$json = array("status" => 1, "msg" => "Done User added!");
				}else{
					$json = array("status" => 0, "msg" => "Error adding user!");
					}
				}else{
					$json = array("status" => 0, "msg" => "Request method not accepted");
					}
				$mysqli_close($conn);
/* Output header */
 header('Content-type: application/json');
 echo json_encode($json);
		}
		/*
		 *	Encode array into JSON
		*/
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	// Initiiate Library
	$api = new API;
	$api->processApi();
?>