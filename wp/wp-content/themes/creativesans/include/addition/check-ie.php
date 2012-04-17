<?php 
function using_ie(){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = False;
    if(preg_match('/MSIE/i',$u_agent))
    {
        $ub = True;
    }
    return $ub;
}
function using_firefox(){
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $ub = False;
    if(preg_match('/Firefox/i',$u_agent))
    {
        $ub = True;
    }
    return $ub;
}


?>
