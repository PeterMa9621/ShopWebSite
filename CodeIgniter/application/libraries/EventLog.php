<?php


class EventLog
{
    public static function log($msg){
        openlog("SimpleWebSite", LOG_PID, LOG_SYSLOG);
        syslog(LOG_ERR, $msg);
    }
}