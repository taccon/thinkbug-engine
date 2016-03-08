<?php

namespace App\Services;
use App\Project;
use App\Ticket;

/**
 * Class TicketManager
 *
 * Ticket service (handles i/o for tickets)
 *
 * @package App\Services
 * @author Thomas Bretzke <thomas@taccon.com>
 * @copyright (c) 2016 taccon software
 */
class TicketManager
{
    /**
     * @param string $ticketNumber ticket number
     * @return Ticket $ticket
     */
    public function getTicket($ticketNumber)
    {
        $ticketNumberParts = explode('-', $ticketNumber);
        $project = Project::where('short_code', '=', $ticketNumberParts[0])
            ->firstOrFail();

        return Ticket::where('project_id', $project->id)
            ->where('ticket_number', $ticketNumberParts[1])
            ->firstOrFail();
    }
}
