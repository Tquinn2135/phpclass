<?php

namespace App\Models;

use CodeIgniter\Model;
use mysql_xdevapi\Exception;

class Member extends Model
{

    public function user_login($email, $password)
    {
        $db = db_connect();
        $query = "Select * from memberLogin where MemberEmail = ?";
        $results = $db->query($query,[ $email ]);
        $row = $results->getFirstRow();

        if($row == null) return false; //email not in db
        $dbPassword = $row->MemberPassword;
        $dbMemberKey = $row->MemberKey;
        $hashedPassword = md5($password . $dbMemberKey);

        if($dbPassword != $hashedPassword) return false;//incorrect pw


        $this->session= service('session');
        $this->session->start();

        $this->session->set('RoleID',$row->RoleID);
        $this->session->set('MemberID',$row->MemberID);

        return true;
    }

    //add create user function
    public function create_user($username, $email, $password){
        try {
            $db = db_connect();
            $memberKey = sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
                mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479),
                mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));

            $hashedPassword = md5($password . $memberKey);
            $roleID = 1;
            $query = "insert into memberLogin (MemberName, MemberEmail, MemberPassword, RoleID, MemberKey) values (?,?,?,?,?)";
            $db->query($query, [$username, $email, $hashedPassword, $roleID, $memberKey]);
            return true;
        }
        catch (Exception $ex){
            return false;
        }
    }
}