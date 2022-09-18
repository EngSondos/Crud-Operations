<?php
namespace Models;
class Employee extends Connection implements Crud
{
    function getemployeedata($id){
        $query = "SELECT * FROM {$this->table} Where `id` = ? ";
        $statment = $this->conn->prepare($query);
        if(!$statment){
            return false;
        }
        $statment->bind_param("i",$id);
        $statment->execute();
        return $statment->get_result();
    }
    private $table = "employee";
    private $name, $phone, $city, $salary;

    function create()
    {
        $query = "INSERT INTO {$this->table} (`name`,`salary`,`phone` , `city`) Values (?,?,?,?)";
        $statment = $this->conn->prepare($query);
        if(!$statment){
            return false;
        }
        $statment->bind_param("sdss",$this->name , $this->salary , $this->phone , $this->city);
        return $statment->execute();
    }
    function update($id)
    {

        $query="UPDATE {$this->table} SET `name` = ? ,`salary` = ? , `phone` = ?  , `city` = ? Where `id` = ?";
        $statment = $this->conn->prepare($query);
        if(!$statment){
            return false;
        }
        $statment->bind_param("sdssi", $this->name , $this->salary , $this->phone , $this->city ,$id);
        return $statment->execute();
    }
    function delete($id)
    {
        $query="DELETE From {$this->table} Where `id` = ?";
        $statment = $this->conn->prepare($query);
        if(!$statment){
            return false;
        }
        $statment->bind_param("i", $id);
        return $statment->execute();

    }
    function read()
    {
        $query ="SELECT * From {$this->table}";
        $statment = $this->conn->query($query);
        return $statment;     
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }
}
