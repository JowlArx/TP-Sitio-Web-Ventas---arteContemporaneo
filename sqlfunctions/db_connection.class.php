<?php 
 
class DB{ 
    private $dbHost     = "localhost"; 
    private $dbUsername = "root"; 
    private $dbPassword = ""; 
    private $dbName     = "db_tossoni"; 
     
    public function __construct(){ 
        if(!isset($this->db)){ 
            // Connect to the database 
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName); 
            if($conn->connect_error){ 
                die("Failed to connect with MySQL: " . $conn->connect_error); 
            }else{ 
                $this->db = $conn; 
            } 
        } 
    } 
     
    /* 
     * Returns rows from the database based on the conditions 
     * @param array select, where, order_by, limit and return_type conditions 
     */ 
    public function getRows($conditions = array(), $table){ 
        $sql = 'SELECT '; 
        $sql .= array_key_exists("select",$conditions)?$conditions['select']:'*'; 
        $sql .= " FROM {$table} "; 
        if(array_key_exists("where",$conditions)){ 
            $sql .= ' WHERE '; 
            $i = 0; 
            foreach($conditions['where'] as $key => $value){ 
                $pre = ($i > 0)?' AND ':''; 
                $sql .= $pre.$key." = '".$value."'"; 
                $i++; 
            } 
        } 
         
        if(array_key_exists("order_by",$conditions)){ 
            $sql .= ' ORDER BY '.$conditions['order_by'];  
        }else{ 
            $sql .= " ORDER BY id ASC ";  
        } 
         
        if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){ 
            $sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit'];  
        }elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){ 
            $sql .= ' LIMIT '.$conditions['limit'];  
        } 
         
        $result = $this->db->query($sql); 
         
        if(array_key_exists("return_type", $conditions) && $conditions['return_type'] != 'all'){ 
            switch($conditions['return_type']){ 
                case 'count': 
                    $data = $result->num_rows; 
                    break; 
                case 'single': 
                    $data = $result->fetch_assoc(); 
                    break; 
                default: 
                    $data = ''; 
            } 
        }else{ 
            if($result->num_rows > 0){ 
                while($row = $result->fetch_assoc()){ 
                    $data[] = $row; 
                } 
            } 
        } 
        return !empty($data)?$data:false; 
    } 
     
    public function insert($data, $table) {
         $nombre = $this->db->real_escape_string($data['nombre']);
        $checkQuery = "SELECT COUNT(*) FROM {$table} WHERE nombre = '$nombre'";
        $result = $this->db->query($checkQuery);
        $count = $result->fetch_assoc()['COUNT(*)'];

        if ($count > 0) {
            // El nombre ya existe, devuelve un mensaje de error
            return false;
        }
        
        if(!empty($data) && is_array($data)){ 
            $columns = implode(", ", array_keys($data));
            $values = "'" . implode("', '", array_map(array($this->db, 'real_escape_string'), $data)) . "'";
    
            $query = "INSERT INTO {$table} ($columns) VALUES ($values)";
            $insert = $this->db->query($query);
            $nuevoID = $this->db->insert_id;
            
            return $insert ? $nuevoID : false;
        } else { 
            return false; 
        }
    }

    public function update($data, $conditions, $table){ 
        if(!empty($data) && is_array($data)){ 
            $colvalSet = ''; 
            $whereSql = ''; 
            $i = 0; 
            foreach($data as $key=>$val){ 
                $pre = ($i > 0)?', ':''; 
                $colvalSet .= $pre.$key."='".$this->db->real_escape_string($val)."'"; 
                $i++; 
            } 
            
             $nombre = $this->db->real_escape_string($data['nombre']);
        $checkQuery = "SELECT COUNT(*) FROM {$table} WHERE nombre = '$nombre'";
        $result = $this->db->query($checkQuery);
        $count = $result->fetch_assoc()['COUNT(*)'];

        if ($count > 0) {
            // El nombre ya existe, devuelve un mensaje de error
            return false;
        }
            
            if(!empty($conditions)&& is_array($conditions)){ 
                $whereSql .= ' WHERE '; 
                $i = 0; 
                foreach($conditions as $key => $value){ 
                    $pre = ($i > 0)?' AND ':''; 
                    $whereSql .= $pre.$key." = '".$value."'"; 
                    $i++; 
                } 
            } 
            $query = "UPDATE {$table} SET ".$colvalSet.$whereSql; 
            $update = $this->db->query($query); 
            return $update?$this->db->affected_rows:false; 
        }else{ 
            return false; 
        } 
    } 
     
    /* 
     * Delete data from the database 
     * @param array where condition on deleting data 
     */ 
    public function delete($conditions, $table){ 
        $whereSql = ''; 
        if(!empty($conditions)&& is_array($conditions)){ 
            $whereSql .= ' WHERE '; 
            $i = 0; 
            foreach($conditions as $key => $value){ 
                $pre = ($i > 0)?' AND ':''; 
                $whereSql .= $pre.$key." = '".$value."'"; 
                $i++; 
            } 
        } 
        $query = "DELETE FROM {$table} $whereSql"; 
        $delete = $this->db->query($query); 
        return $delete?true:false; 
    } 
} 
 
?>