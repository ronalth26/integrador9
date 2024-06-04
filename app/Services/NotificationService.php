<?php

namespace App\Services;

class NotificationService
{
    public function success($message)
    {
        session()->flash('notification', [
            'type' => 'success',
            'message' => $message,
        ]);
    }

    public function warning($message)
    {
        session()->flash('notification', [
            'type' => 'warning',
            'message' => $message,
        ]);
    }

    public function error($message)
    {
        session()->flash('notification', [
            'type' => 'error',
            'message' => $message,
        ]);
    }
}