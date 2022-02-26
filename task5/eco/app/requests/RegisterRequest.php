<?php

namespace app\requests;

use app\database\models\User;

class RegisterRequest
{
    private $password;
    private $password_confirmation;
    private $email;
    private $phone;
    private $gender;
    private $code;
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

    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of password_confirmatoin
     */
    public function getPassword_confirmation()
    {
        return $this->password_confirmation;
    }

    /**
     * Set the value of password_confirmatoin
     *
     * @return  self
     */
    public function setPassword_confirmation($password_confirmation)
    {
        $this->password_confirmation = $password_confirmation;

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

    public function passwordValidation(): array
    {
        $errors = [];
   
        if (empty($this->password)) {
            $errors['required'] = "Password Is Required";
        }
       
        if (empty($this->password_confirmation)) {
            $errors['confirmation-required'] = "Password confrimation Is Required";
        }
      
        if (empty($errors)) {
           
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/', $this->password)) {
                $errors['regex'] = "Password Minimum eight and maximum 20 characters, at least one uppercase letter, one lowercase letter, one number and one special character";
            }

            if (empty($errors)) {
                # confirmed
                if ($this->password != $this->password_confirmation) {
                    $errors['confirmed'] = "Password dosen't match password confirmation";
                }
            }
        }
        return $errors;
    }


    public function emailValidaiton()
    {
        $errors = [];
        if (empty($this->email)) {
            $errors['required'] = "Email Is Required";
        }
        if (empty($errors)) {
            if (!preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $this->email)) {
                $errors['regex'] = "Email Is Invalid";
            }
            if (empty($errors)) {
                $user = new User;
                $user->setEmail($this->email);
                $result = $user->getUserByEmail();
                if ($result->num_rows == 1) {
                    $errors['unique'] = "Email Already Exists";
                }
            }
        }

        return $errors;
    }

    public function phoneValidation()
    {

        $errors = [];
        if (empty($this->phone)) {
            $errors['required'] = "Phone Is Required";
        }
        if (empty($errors)) {
            if (!preg_match('/01[0-2,5]{1}[0-9]{8}$/', $this->phone)) {
                $errors['regex'] = "Phone Is Invalid";
            }
            if (empty($errors)) {
                $user = new User;
                $user->setPhone($this->phone);
                $result = $user->getUserByPhone();
                if ($result->num_rows == 1) {
                    $errors['unique'] = "Phone Already Exists";
                }
            }
        }

        return $errors;
    }

    public function genderValidation()
    {
        $errors = [];
        if (empty($this->gender)) {
            $errors['required'] = "Gender Is Required";
        }
        if (empty($errors)) {
            if ($this->gender=='m'){
               
        }
        elseif($this->gender=='f'){

        }
        else
        {
            $errors['invalid'] = "Gender Is invalid";
        }
    }
        return $errors;
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

    public function codeValidation(){
    $errors = [];
    if (empty($this->code)) {
        $errors['required'] = 'Code Is Required';
    } else {
        if (strlen($this->code) != 5) {
            $errors['digits'] = 'Code Must Be 5 Digits';
        }
    }
   }

    
}