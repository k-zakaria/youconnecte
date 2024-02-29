<?php

namespace App\Repository;

use App\Models\Message;
use App\Repository\MessageRepositoryInterface;

class MessageRepository implements MessageRepositoryInterface
{


    public function create(array $data)
    {
        return Message::create($data);
    }


}