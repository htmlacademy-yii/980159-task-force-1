<?php

namespace TaskLoader;

class GetTaskStatus
{
    const ACTION_NEW
        = [
            'cancel' => 'canceled',
            'active' => 'active'
        ];
    const ACTION_IN_JOB
        = [
            'complete' => 'completed',
            'fail'     => 'failed',
            'active'   => 'active'
        ];
    const ROLES_NEW
        = [
            'client'    => 'cancel',
            'performer' => 'respond'
        ];
    const ROLES_IN_JOB
        = [
            'client'    => 'complete',
            'performer' => 'refuse'
        ];
    public static $currentStatus;
    
    private $clientID;
    private $performerID;
    private $dataCompletion;
    
    public function checkStatusNew($action)
    {
        return self::getStatus(self::ACTION_NEW, $action);
    }
    
    public function checkStatusJob($action)
    {
        return self::getStatus(self::ACTION_IN_JOB, $action);
    }
    
    private static function getStatus($status, $action)
    {
        foreach ($status as $key => $curStatus) {
            if ($key === $action) {
                self::$currentStatus = $curStatus;
                return $curStatus;
            }
        }
        
        return 'Не задано действие';
    }
}
