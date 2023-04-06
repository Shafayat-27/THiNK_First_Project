<?php

require '../inc/dbcon.php';

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
    ]; 
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

function storeTemperature($temperatureInput){
    global $conn;

    $tempno_ = mysqli_real_escape_string($conn, $temperatureInput['Tempno_']);
    $temp_ = mysqli_real_escape_string($conn, $temperatureInput['Temp_']);

    if(empty(trim($tempno_))){
        return erro422('Enter Temperature No. ');
    }elseif(empty(trim($temp_))){
        return error422('Enter Temperature ');
    }else{
        if($temp_ < 40){
            $query = "INSERT INTO temp_log (Tempno_, Temp_) VALUES ('$tempno_','$temp_')";
            $result = mysqli_query($conn, $query);

            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Temperature Created Successfully',
                ];
                header("HTTP/1.0 201 Created");
                return json_encode($data);
            }else{
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error',
                ];
                header("HTTP/1.0 500 Internal Server Error");
                return json_encode($data);
            }
        }else{
            $query = "INSERT INTO alarm_log (Alarmno_, Alarm_) VALUES ('$tempno_','$temp_')";
            $result = mysqli_query($conn, $query);

            if($result){
                $data = [
                    'status' => 201,
                    'message' => 'Temperature Created Successfully',
                ];
                header("HTTP/1.0 201 Created");
                return json_encode($data);
            }else{
                $data = [
                    'status' => 500,
                    'message' => 'Internal Server Error',
                ];
                header("HTTP/1.0 500 Internal Server Error");
                return json_encode($data);
            }
        }
        
    }
}

function getTemperatureList(){

    global $conn;

    $query = "SELECT * FROM temp_log";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        if(mysqli_num_rows($query_run) > 0){
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'status' => 200,
                'message' => 'Temperature List Fetched Successfully',
                'data' => $res,
            ];
            header("HTTP/1.0 200 OK");
            return json_encode($data);
            
        }else{
            $data = [
                'status' => 404,
                'message' => 'No Temperature Found',
            ];
            header("HTTP/1.0 404 No Temperature Found");
            return json_encode($data);
        }
    }
    else{
        $data = [
            'status' => 500,
            'message' => 'Internal Server Error',
        ];
        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }
}



?>