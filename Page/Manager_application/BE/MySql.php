<?php
    
// CONTENT: CONNECT DATABASE AND  CREATE QUERY
// 1. CONNECT DATABASE
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
                return $result;
            }
        }
// CREATE QUERY
    class Query
    {
        public $host, $database,$user,$pass;
        function __construct($database_)
            {
                $this->database=$database_;
            }

        function select_data($db,$table)
            {
                $query='SELECT * FROM '.$this->database.".".$table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function select_vehicle($db,$table)
            {
                $query='SELECT Vehicle FROM '.$this->database.".".$table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function add_field_vehicle_language($db,$table,$name_field)
            {
                $query='ALTER TABLE '.$this->database.".".$table ." ADD ".$name_field." int(11)" ;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function insert_vehicle_language($db,$table,$name_field,$record)
            {
                $query= 'INSERT INTO '.$this->database.".".$table.' ('.$name_field.') VALUES ('.$record.')';
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function find_max_id($db,$table)
            {
                $query='SELECT MAX(id) FROM '.$this->database.".".$table;
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function delete_vehicle($table,$condition)
            {
                $query='DELETE FROM '.$this->database.".".$table." WHERE Vehicle = '".$condition."'";
                return $query;
            }

        function select_id_vehicle($db,$table,$vehicle)
            {
                $query='SELECT id FROM '.$this->database.".".$table. " WHERE Vehicle= '".$vehicle."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function add_field_textid_language($db,$table,$language,$transcode,$translator,$transdate,$validator,$validate)
            {
                $query='ALTER TABLE '.$this->database.".".$table. " ADD COLUMN ".$language. " text, ADD COLUMN ".$transcode. " text, ADD COLUMN ".$translator. " text, ADD COLUMN ".$transdate. " text, ADD COLUMN ".$validator. " text, ADD COLUMN ".$validate." text";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function add_field_textid_vehicle($db,$table,$vehicle)
            {
                $query='ALTER TABLE '.$this->database.".".$table. " ADD COLUMN ".$vehicle. " int(11)";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function update_veh_language($db,$table,$data,$vehicle)
            {
                $query='UPDATE '.$this->database.'.'.$table.'
                SET '.$data.'
                WHERE Vehicle="'.$vehicle.'"';
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }

        function get_name_field_vehicle_language($db)
            {
                $query="SHOW COLUMNS FROM vehicle_language";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
                return $result;
            }
    }
?>