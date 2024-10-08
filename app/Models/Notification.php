<?php

namespace App\Models;
use App\Traits\NotificationMessageTrait;
use Illuminate\Notifications\DatabaseNotification;
use Spatie\Translatable\HasTranslations;


class Notification extends DatabaseNotification
{
    use NotificationMessageTrait ,HasTranslations;
    public $translatable = ['title','body'];

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }    public function getTypeAttribute($value)
    {
        return $this->data['type'] ;
    }

   

    public function getBodyAttribute($value)
    {   
        return $this->getBody($this->data ,   app()->getLocale());
    }

    public function getSenderAttribute($value)
    {
        $def    = 'App\Models\\' . $this->data['sender_model'];
        $sender = $def::find($this->data['sender']);
        return [
            'name'   => $sender->name,
            'avatar' => $sender->avatar,
        ];
    }
}
