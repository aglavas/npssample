<?php

namespace App\Services;

use Mpclarkson\Laravel\Freshdesk\FreshdeskFacade as Freshdesk;

class FreshDeskAdapter
{
    /**
     * Create FreshDesk ticket
     *
     * @param string $content
     * @param string $tag
     * @return bool
     */
    public function createTicket(string $content, string $tag)
    {
        $ticketApi = Freshdesk::tickets();

        $result = $ticketApi->create([
            'email' => 'test@mail.com',
            'subject' => 'Not satisfied',
            'status' => 2,
            'priority' => 3,
            'description' => $content,
            'tags' => [$tag],
        ]);

        return true;
    }
}
