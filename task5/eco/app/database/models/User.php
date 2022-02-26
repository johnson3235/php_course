<?php
namespace app\database\models; 
use app\database\config\connection;

class User extends connection{
    private $id,$first_name,$last_name,$password,$email,$phone,$gender,$status,$image,$code,
    $expired_at,$email_verified_at,$created_at,$updated_at;
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of first_name
     */ 
    public function getFirst_name()
    {
        return $this->first_name;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */ 
    public function setFirst_name($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * Get the value of last_name
     */ 
    public function getLast_name()
    {
        return $this->last_name;
    }

    /**
     * Set the value of last_name
     *
     * @return  self
     */ 
    public function setLast_name($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of gender
     */ 
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */ 
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of expired_at
     */ 
    public function getExpired_at()
    {
        return $this->expired_at;
    }

    /**
     * Set the value of expired_at
     *
     * @return  self
     */ 
    public function setExpired_at($expired_at)
    {
        $this->expired_at = $expired_at;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */ 
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */ 
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getUserByEmail(){
        $query="SELECT * from users WHERE users.email='{$this->email}'";
        return $this->runDQL($query);
    }

    public function getUserByPhone()
    {
        $query = "SELECT * FROM `users` WHERE users.phone = '{$this->phone}'";
        return $this->runDQL($query);
    }

    public function insertUserRegister()
    {
        $query = "INSERT INTO users(first_name,last_name,email,password,phone,gender,STATUS,code,code_expired_at) VALUES ('{$this->first_name}','{$this->last_name}','{$this->email}','{$this->password}','{$this->phone}','{$this->gender}','{$this->status}','{$this->code}','{$this->expired_at}');";
        return $this->runDML($query);
    }

    public function updateCode()
    {
        $query = "UPDATE users set code='{$this->code}' , code_expired_at ='{$this->expired_at}' WHERE users.email='{$this->email}';";
        return $this->runDML($query);
    }

    public function  checkByCode()
    {
        $query = "SELECT * FROM users WHERE users.email ='{$this->email}' AND users.code='{$this->code}';";
        return $this->runDQL($query);
    }
    public function changeUserStatus()
    {
        $query = "UPDATE users set status= {$this->status} , email_verified_at='{$this->email_verified_at}' WHERE users.email='{$this->email}';";
        return $this->runDML($query);
    }


    public function update()
    {
        $query = "UPDATE users SET first_name = '{$this->first_name}',last_name='{$this->last_name}',phone='{$this->phone}',gender='{$this->gender}',image='{$this->image}' WHERE email = '{$this->email}';";
        return $this->runDML($query);
    }

    public function updatePass()
    {
        $query = "UPDATE users SET password = '{$this->password}' WHERE email = '{$this->email}';";
        return $this->runDML($query);
    }

  
   // ,image='{$this->image}'
}
?>

