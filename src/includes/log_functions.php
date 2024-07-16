<?
class writelog{

function writelog_admin_website_settings($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Website Settings <font color=#FF0000>Changed</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}

function writelog_admin_add_server($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "New Server Named: $_POST[name] Has Been <font color=#FF0000>Added</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}

function writelog_admin_edit_server($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Server Named: $_POST[name] Has Been <font color=#FF0000>Edited</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}

function writelog_admin_delete_server($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Server Named: $_POST[server_name_delete] Has Been <font color=#FF0000>Deleted</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}


function writelog_admin_add_news($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "News: $_POST[news_title] Has Been <font color=#FF0000>Added</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}


function writelog_admin_edit_news($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "News: $_POST[edit_news_title] Has Been <font color=#FF0000>Edited</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}

function writelog_admin_delete_news($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "News: $_POST[news_title] Has Been <font color=#FF0000>Deleted</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}



function writelog_admin_add_link($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Link $_POST[link_name] Has Been <font color=#FF0000>Added</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}



function writelog_admin_edit_link($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Link $_POST[link_name] Has Been <font color=#FF0000>Edited</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}


function writelog_admin_delete_link($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Link $_POST[link_name] Has Been <font color=#FF0000>Deleted</font> On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}



function writelog_admin_edit_character($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Character $_POST[character] Has Been <font color=#FF0000>Edited</font> with the next->Level:$_POST[level]|Resets:$_POST[resets]|Zen:$_POST[zen]|Strengh:$_POST[strength]|Agiltiy:$_POST[agility]|Vitality:$_POST[vitality]|Energy:$_POST[energy] On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}



function writelog_admin_edit_account($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Account $_POST[account] Has Been <font color=#FF0000>Edited</font> with the next->New Password:$_POST[new_pwd]|Personal ID Code:$_POST[idcode]|E-mail:$_POST[email]|Secret Question:$_POST[squestion]|Secret Answer:$_POST[sanswer] On $date By $ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}



function writelog_user_resets($logfile){
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:i');
        $data = "Character $_POST[reset_character] Has Been <font color=#FF0000>Reseted</font>, Before Reset:$row[1](resets), After Reset:$resetup(resets), All Those On $date By ip:$ip \n";

        $fp = fopen($logfile, 'a');
        fputs($fp, $data);
        fclose($fp);}








}






class readlog
{
    function readLog_admin($logfile)
    {

        return implode('', file($logfile));
    }

}

?>