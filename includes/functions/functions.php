<?php

function getCount($tbl,$where=NULL)
{
    global $cnx;
    $query = "SELECT * FROM $tbl $where";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    return $count;
}

//function get_From use it for Selected rows or clomumns from any table
function get_From($select="*",$tbl,$where=NULL)
{
    global $cnx;
    $query = "SELECT $select FROM $tbl $where";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
}
//function get_From use it for Selected rows or clomumns from any table
function get_From_fetch($select="*",$tbl,$where=NULL)
{
    global $cnx;
    $query = "SELECT $select FROM $tbl $where";
    $stmt = $cnx->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetch();
    return $rows;
}

//function use it for get current page title
function getTitle()
{
    global $active;
    if(isset($active))
    {
        echo $active;
    }
    else
    {
        echo 'Default';
    }
}
//function use it for Check Element if exist or not
function checkItem($table,$champ,$val)
{
    global $cnx;
    if(gettype($val)=="string")
    {
        $stmt = $cnx->prepare("SELECT * FROM $table WHERE $champ='$val'");
    }
    else
    {
        $stmt = $cnx->prepare("SELECT * FROM $table WHERE $champ=$val");
    }
    $stmt->execute();
    return $stmt->rowCount()>0?true:false;
}

