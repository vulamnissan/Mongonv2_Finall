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
        function select_data_translate_rq($db,$table)
            {
                $query='SELECT * FROM '.$this->database.".".$table." ORDER BY textid ASC";
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

        function select_data_translate_rq_filter($db,$table, $filter_val,$select_val)
            {
                if ($select_val === "textid")
                    {
                        //nothing
                    }
                else
                    if ($select_val == "US_English")
                            {
                                $select_val = "US_English";
                            }
                    else
                            {
                                $select_val = $select_val . "_text";
                            }
                $query='SELECT * FROM '.$this->database.".".$table." WHERE ".$select_val." LIKE '%".$filter_val."%' ORDER BY textid ASC";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) 
                    {
                        die("Query preparation failed");
                    }
                else
                    {
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                    }
                return $result;
            }

        function select_id_manager($db,$table,$mail)
            {
                $query='SELECT id FROM '.$this->database.".".$table. " WHERE mail= '".$mail."'";
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

        function count_data($db,$table)
            {
                $query='SELECT count(*) FROM '.$this->database.".".$table;
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
        function insert_request($db,$table,$id,$qr,$stt,$creator,$date,$dl,$user)
            {
                $query="INSERT INTO ".$this->database.".".$table." (id, requestnumber, status,requester,dateissue,deadline,user) VALUES (".$id.",'".$qr."','".$stt."','".$creator."','".$date."','".$dl."',".$user.")";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
            }
        function change_status_request($db,$rq,$date)
            {
                $query="UPDATE ".$this->database."."."request"." SET status = 'Close' , dateissue = '".$date."'  WHERE requestnumber = '".$rq."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    die("Query preparation failed");
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                }
            }

        function select_request_user($db,$table,$id)
            {
                $query='SELECT * FROM '.$this->database.".".$table." WHERE user='".$id."' ORDER BY status DESC ";
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

        function select_request_TR($db,$table)
            {
                $query='SELECT requestnumber FROM '.$this->database.".".$table." WHERE requestnumber LIKE 'TR%'";
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

        function get_meter($db,$txtid,$display)
            {
                $query= "SELECT textid_infor.meter_type FROM textid_infor WHERE textid_infor.textid = '".$txtid."' AND textid_infor.display_type = '".$display."'" ;
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

        function get_font_limit($db,$meter,$display)
            {
                $query= "SELECT fix_limit.fontsize ,fix_limit.limit  FROM fix_limit WHERE fix_limit.meter = '".$meter."' AND fix_limit.display_type = '".$display."'" ;
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

        function select_textID_language($db)
            {
                $query = "SELECT id, textid, ver,US_English,Japanese_text,Arabic_text,BrazilianPortuguese_text,British_text,CanadianFrench_text,Chinese_text,Czech_text,	Danish_text,Dutch_text,	Finnish_text,French_text,German_text,Greek_text,Hungarian_text,Italian_text,Korea_text,	MexicanSpanish_text,Norwegian_text,	Polish_text,Portuguese_text,Russian_text,Slovak_text,Spanish_text,Swedish_text,Taiwanese_text,Thai_text,Turkish_text,Ukrainian_text FROM textid_language WHERE (textid,ver) IN ( SELECT textid, MAX(ver) FROM textid_language WHERE textid IN (SELECT textid FROM textid_language) GROUP BY textid)GROUP BY textid";
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

        function select_textid_vehicle($db,$select_project)
            {
                $query = "SELECT textid FROM textid_vehicle WHERE $select_project = 1";
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

        function check_pass_email($db,$email,$old_pass)
            {
                $query = "SELECT mongonv2.id FROM user WHERE mail = '".$email ."' AND password = '".$old_pass."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    return 0;
                }
                else
                {
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    return $result; 
                }
                
            }

        function update_new_pass($db,$email,$new_pass)
            {
                $query = "UPDATE ".$this->database.".user SET password = '".$new_pass."' WHERE mail = '".$email."'";
                $stmt = mysqli_stmt_init($db->conn);
                if (!mysqli_stmt_prepare($stmt, $query)) {
                    return 0;
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
