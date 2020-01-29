<?php
class users extends db{
    //select all data from the database
    public function select()
    {
        $sql = "Select * from r_users";

        $result = $this->connect()->query($sql);

                if($result->rowCount()> 0){
                while ($row = $result->fetch() ){
                    $data[] =$row;
                    }
            return $data;
            }   
    }
    public function insert($fields)
    {
         //$sql = "Insert into users (firstname,lastname,email,phonenumber,password) Values (:firstname, :lastname, :email, :phonenumber,:password)" 
        $implodecolumns = implode(',',array_keys($fields));
        $implodeplaceholder = implode(",:",array_keys($fields));

        $sql = "INSERT INTO r_users ($implodecolumns) VALUES (:".$implodeplaceholder.")" ;
        $stmt = $this->connect()->prepare($sql);
        foreach($fields as $key => $value)
        {
            $stmt->bindValue(':'.$key,$value);
        }
            $stmtExec = $stmt->execute();
            if($stmtExec){
                header('Location: CRUD.php');
            }
    }
    public function selectOne($id)
    {
        $sql = "SELECT * FROM r_users WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt ->bindValue(":id",$id);
        $stmt->execute();
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function update($fields,$id){
        $st ="";
        $counter = 1;
        $total_fields = count($fields);
        
        foreach($fields as $key => $value){
            if($counter === $total_fields){
                $set = "$key =:".$key;
                $st = $st.$set;
            }
            else{    
                $set = "$key =:".$key.",";
                $st = $st.$set;
                $counter++;
            }
        }
            $sql = "";
        
            $sql.= "UPDATE r_users SET ".$st. " ";
            $sql.= "WHERE id=".$id;
        $stmt = $this->connect()->prepare($sql);
        
        foreach ($fields as $key => $value){
            $stmt->bindValue(':'.$key,$value);
        }
        $stmtExec = $stmt->execute();
        if($stmtExec){
            header('Location: CRUD.php');
        }
    }
    
    public function destroy($id){
        $sql = "Delete from r_users where id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindValue(":id",$id);
        $stmt -> execute();
    }
}
?>