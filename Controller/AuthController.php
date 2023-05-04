<?php 
require_once '../Model/User.php'; 
require_once '../Controller/Database.php';

class AuthController
{
    protected $db;
    

    public function register( User $user)
   {
     $this->db=new Database();
     if($conn = $this->db->getConn())
     {
          
      
          
             $query = "SELECT * FROM user WHERE Email = '$user->email'";
              $result = $conn->query($query);
              if ($result->num_rows > 0) {
                 // Email already exists, return false
                 $_SESSION['error']="Email is already registered ";
                 
                  $this->db->closeConnection();
                  
                   return false;
                  
      }

          $query = "INSERT INTO user (Email, Name, Password, NumOfVideo, Subscription, Country) VALUES 
          ('$user->email', '$user->Name', '$user->password', '0', '1', '$user->country')";

          $result=$this->db->insert($query);
              if ($result!=false)
              {
                session_start();
                $_SESSION['User_ID'] = $result;
                $_SESSION['user_name'] = $user->Name;
                unset($_SESSION['error']);
                $this->db->closeConnection();
                return true;
              }  
    
              else 
              {
                $_SESSION["errMsg"]="Something Went Wrong";
                $this->db->closeConnection();
                return false;
              }

     }

   }




   public function login(User $user)
   {
        $this->db=new Database();
       if($this->db->getConn())
       {
           $query = "SELECT * FROM user WHERE email = ?";
           $stmt = $this->db->getConn()->prepare($query);
           $stmt->bind_param("s", $user->email);
           $stmt->execute();
           $result = $stmt->get_result();

           if($result===false)
           {
               echo "Error in Query";
               return false;
           }
           else
           {
               if($result->num_rows==0)
               {                
                   $_SESSION["errMsg"]="Incorrect Email";
                   return false;
               }
               else
               {
                   $row = $result->fetch_assoc();
                   $hashed_password = $row["Password"];
                
                   $password=$user->password;
                   
                   //var_dump($hashed_password);
                   //var_dump($user->password);
                   

                   if(password_verify($user->password, $hashed_password))
                   {
                       $_SESSION["userID"] = $row["ID"];                    
                       $_SESSION["userEmail"] = $row["Email"];                    
                       $_SESSION["userName"] = $row["Name"];
                       return $row;
                   }
                   else
                   {
                       $_SESSION["errMsg"]="Incorret password";
                       
                       return false;
                   }
               }
           }
       }
       else
       {
           echo "Error in db connection";
           return false;
       }
    }
}

                   





?>
