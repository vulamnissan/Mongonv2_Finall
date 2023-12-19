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

        function insert_vehicle($db,$table,$temp_field,$temp_value)
            {
                $query = "INSERT INTO ".$this->database.".".$table." ($temp_field) VALUES (".$temp_value.")";
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

        function insert_to_textid_infor($db,$table,$key)
            {
                $query = "INSERT INTO ".$this->database.".".$table." (textid) VALUES ('".$key."')";
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

        function insert_to_textid_language($db,$table,$key)
            {
                $query = "INSERT INTO ".$this->database.".".$table." (textid,ver) VALUES ('".$key."','"."1"."')";
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

        function insert_vehicle_to_vehicle_language($db,$table,$last_row_vehicle_language,$vehicle_add,$meter_add)
            {
                $query = "INSERT INTO ".$this->database.".".$table." (id,Vehicle,meter_type) VALUES ('".$last_row_vehicle_language."','".$vehicle_add."','".$meter_add."')";
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

        function add_cl($db,$vehicle_add)
            {
                $query = "ALTER TABLE textid_vehicle
                ADD $vehicle_add VARCHAR(100);
                ";
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

        function update_textid_vehicle_new($db,$vehicle_add,$value,$key)
            {
                $query = "UPDATE ".'mongonv2.textid_vehicle' . ' SET '.$vehicle_add.'='.$value." WHERE"." textid="."'$key'";
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