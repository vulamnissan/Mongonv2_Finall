<?php
// Start the session
session_start();
?>
<?php
    $arr_data=$_POST["arr"]??"";
    // print_r($arr_data) ;
    $user_mail=$_COOKIE['email'];
    $user_name=$_COOKIE['name'];
    $user_sect="abcdgroup";
    $user_id=$_COOKIE['ID'];
    // $user_id=4;
    $user_company="NISSAN";
    include "MySql.php";
    $db = new connect_DB("localhost","mongonv2","root","");
    $qr= new Query("mongonv2");
   
    //=======================Lay data user==================
    // function get_request($qr,$db)
    // {
    //     $user = [];
    //     $query= $qr->select_data("request");
    //     $result=$db->get_data($query);
    //     if (!$result)
    //     {
    //         die ('Câu truy vấn bị sai');
    //     }
    //     else
    //     {
    //         // return $result;
    //     }
    //     while ($row = mysqli_fetch_assoc($result))
    //     {
    //         $user[$row["requestnumber"]]=$row["name"];
    //     };
    //     return $user;
    // }
    
    function get_data_fix_limit($qr,$db)
    {
        //=======================Lay data fix limit==================
        $query= $qr->select_data("fix_limit");
        $result=$db->get_data($query);
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        else
        {
            
        }
        $fix_limit=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            // $fix_limit[$row['id']]=[];

            $fix_limit[$row['display_type']."_".$row['meter']]=$row['limit'];

        };
        return $fix_limit;

    }

    function get_data_textid_infor($qr,$db)
    {
        //=======================Lay data textid infor=================
        $query= $qr->select_data("textid_infor");
        $result=$db->get_data($query);
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        else
        {
    
        }
        $text_infor=[];
        while ($row = mysqli_fetch_assoc($result))
        {
            $text_infor[$row['textid']]=[];
            $text_infor[$row['textid']]['content']=$row['content'];
            $text_infor[$row['textid']]['display_type']=$row['display_type'];
            $text_infor[$row['textid']]['number_lines']=$row['number_lines'];
            $text_infor[$row['textid']]['meter_type']=$row['meter_type'];
            // $text_infor[$row['textid']]['US_English']=$row['US_English'];
            
        };
        return $text_infor;
    }

    function get_count_request($qr,$db)
    {
        $query= $qr->count_data("request");
        $result=$db->get_data($query);
        while ($row = mysqli_fetch_assoc($result))
        {
            $last_row=$row['count(*)']; 
        };
        if ($last_row===0)
        {
            return 1;
        }
        else
        {
            return $last_row+1;
        }
    }

    function add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user_id)
    {
        $query= $qr->insert_request("request",$id,$rq,$stt,$creator,$date,$dl,$user_id);
        // echo $query;
        $db->get_data($query);
    }
// $arr_user=get_data_user($qr,$db);
$arr_fix_limit=get_data_fix_limit($qr,$db);
$arr_infor_text=get_data_textid_infor($qr,$db);
$last_request=get_count_request($qr,$db);

// them noi dung vao fule json
$arr_data['password']="";
$arr_data['creator']=[];
$arr_data['creator']['name']=$user_name;
$arr_data['creator']['sect']=$user_sect;
$arr_data['creator']['mail']=$user_mail;
$arr_data['creator']['company']=$user_company;
$arr_data['mgr']['name']="";
$arr_data['mgr']['sect']="";
$arr_data['mgr']['mail']="";
$arr_data['mgr']['company']="";
$arr_data['validator']['name']="";
$arr_data['validator']['sect']="";
$arr_data['validator']['mail']="";
$arr_data['validator']['company']="";
$arr_data['deadline']="";
$arr_time=getdate();
$time_now=$arr_time['mday']."/".$arr_time['mon']."/".$arr_time['year'];
$arr_data['date']=$time_now;
// lay thong tin cho txt
foreach ($arr_data['validation_request'] as $key=>$value)
{
    // $arr_data['validation_request'][$key]['language']['US_English']['content']=$arr_infor_text[$key]['US_English'];
    $arr_data['validation_request'][$key]['content']=$arr_infor_text[$key]['content'];
    $arr_data['validation_request'][$key]['display_type']=$arr_infor_text[$key]['display_type'];
    $arr_data['validation_request'][$key]['number_line']=$arr_infor_text[$key]['number_lines'];
    $arr_data['validation_request'][$key]['layout']="";
    // echo ($arr_infor_text[$key]['display_type']."_".$arr_infor_text[$key]['meter_type']);
    $arr_data['validation_request'][$key]['limit_lenght']=$arr_fix_limit[$arr_infor_text[$key]['display_type']."_".$arr_infor_text[$key]['meter_type']];
}
// print_r($arr_data);

$jsonString = json_encode($arr_data, JSON_PRETTY_PRINT);
//  echo ("../../../Data/UserData/".$arr_user[$user_mail]['id']."/test.json");
//  print_r($arr_data);

//Save request vao MySQL
$id=$last_request;
$rq="VL".$last_request;
$stt="Open";
$creator=$user_name;
$date=($time_now);
$dl=NULL;

add_request($qr,$db,$id,$rq,$stt,$creator,$date,$dl,$user_id);

// $link_file_json = "../../../Data/UserData/2/data.json";
$link_file_json = "../../../Data/UserData/".$user_id."/".$rq.".json";
// $link_file_json="../../../Data/UserData/".$user_id."/".$rq.".json";
//Save vao file json draf
$_SESSION['link_file_json'] = $link_file_json ;
$_SESSION['request'] = $rq;


if (file_put_contents($link_file_json,$jsonString)) 
{
    echo $link_file_json;
    
}
else
{
    // echo $user_id;
    // echo $link_file_json;
    echo "Fail to save";
   
}

?>


