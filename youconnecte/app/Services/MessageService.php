<?php

namespace App\Services;

use App\Repository\MessageRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageService implements MessageServiceInterface
{
    protected $messageRepository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    public function create(array $data)
    {
        $validatedData = validator($data, [
            'content' => 'required|string|max:255',
            'media' => 'image|mimes:jpeg,png,jpg,gif|max:2000000',
        ])->validate();

        $data['user_id'] = Auth::id();

        if (isset($data['media'])) {
            $mediaPath = $data['media']->store('uploads', 'public');
            $data['media'] = $mediaPath;
        }

        return $this->messageRepository->create($data);
    }

}
