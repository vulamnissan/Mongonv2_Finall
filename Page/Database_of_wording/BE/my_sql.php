<?php
    class connect_DB
    {
        public $host, $database,$user,$pass,$conn;
        function __construct($host_,$database_,$user_,$pass_)
        {   
            // config database
            $this->host = $host_;
            $this->database=$database_;
            $this->user=$user_;
            $this->pass=$pass_;
            $this->connection_DB($host_,$database_,$user_,$pass_);
        }
        // connect database
        function connection_DB($host_,$database_,$user_,$password_)
        {
            // Create connection
            $this->conn = mysqli_connect($host_, $user_, $password_, $database_);
            // Check connection
            if (!$this->conn) {
                die("Connect fail");
            }
            // echo "Connected successfully";
        }
        function get_data($query)
        {
            $result = mysqli_query($this->conn, $query);
            // $this->conn -> close;
            return $result;
        }
    }
    // =================================================
    // ====================QUERY========================
    // =================================================
    class Query
    {
        public $host, $database,$user,$pass;
        function __construct($database_)
        {
            $this->database=$database_;
        }

        function select_data($table)
        {
            $query='SELECT * FROM '.$this->database.".".$table;
            return $query;
        }

        function count_data($table)
        {
            $query='SELECT count(*) FROM '.$this->database.".".$table;
            return $query;
        }
        function insert_request($table,$id,$qr,$stt,$creator,$date,$dl,$user)
        {
            $query="INSERT INTO ".$this->database.".".$table." (id, requestnumber, status,requester,dateissue,deadline,user) VALUES ('".$id."','".$qr."','".$stt."','".$creator."','".$date."','".$dl."','".$user."')";
            return $query;
        }
        function insert_textid($table,$textid,$content,$display_type,$meter_type,$number_lines,$US_English,$Japanese,$VehicleApplied,$ManagerApproval,$Date)
        {
            $query="INSERT INTO ".$this->database.".".$table." (textid,content,display_type,meter_type,number_lines,US_English,Japanese,VehicleApplied,ManagerApproval,Date) VALUES ('".$textid."','".$content."','".$display_type."','".$meter_type."','".$number_lines."','".$US_English."','".$Japanese."','".$VehicleApplied."','".$ManagerApproval."','".$Date."')";
            return $query;
        }

        function insert_limit($table,$id,$display_type,$meter,$limit)
        {
            $query="INSERT INTO ".$this->database.".".$table." (id,display_type,meter,fix_limit.limit) VALUES ('".$id."','".$display_type."','".$meter."','".$limit."')";
            return $query;
        }

        function update_textid($table,$textid,$content,$display_type,$meter_type,$number_lines,$US_English,$Japanese,$VehicleApplied,$ManagerApproval,$Date)
        {
            $query = "UPDATE ".$this->database.".".$table." SET content ='".$content."',display_type ='".$display_type."',meter_type='".$meter_type."',number_lines='".$number_lines."',US_English='".$US_English."',Japanese='".$Japanese."',VehicleApplied='".$VehicleApplied."',ManagerApproval='".$ManagerApproval."',Date='".$Date."' WHERE textid = '".$textid."'";
            return $query;
        }

        function update_limit($table,$display_type,$meter,$limit,$id)
        {
            $query = "UPDATE ".$this->database.".".$table." SET meter='".$meter."',fix_limit.limit ='".$limit."'  WHERE id ='".$id."'";
            return $query;
        }

        function select_request_user($table,$id)
        {
            $query='SELECT * FROM '.$this->database.".".$table." WHERE user='".$id."' ";
            return $query;
        }
        function find_ID($ID, $name_table)
        {
            $query = "SELECT (s1.".$ID."+1) as \"min\" from ".$this->database.".".$name_table." as s1
                    where (s1.".$ID."+1) not in (SELECT s2.".$ID." from ".$this->database.".".$name_table." as s2 where s2.".$ID.">1) 
                    UNION
                    SELECT (s1.".$ID."-1) as \"min\" from ".$this->database.".".$name_table." as s1
                    where (s1.".$ID."-1) not in (SELECT s2.".$ID." from ".$this->database.".".$name_table." as s2) and (s1.".$ID."-1) > 0
                    ORDER BY 1 ASC
                    LIMIT 1";
            return $query;
        }
        
    }
?>