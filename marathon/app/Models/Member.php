<?php

namespace App\Models;

use CodeIgniter\Model;

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

        return true;
    }

    //add create user function
    public function create_user(){
        $db = db_connect();
        $query = "insert into memberLogin (MemberName, MemberEmail, MemberPassword, RoleID, MemberKey) values (?,?,?,?,?)";
        $results = $db->query($query);

    }
}