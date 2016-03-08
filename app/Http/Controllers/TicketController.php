<?php

namespace App\Http\Controllers;
use App\Services\ProjectManager;
use App\Services\TicketManager;
use App\Ticket;

/**
 * Class TicketController
 *
 * Ticket controller
 *
 * @package App\Http\Controllers
 * @author Thomas Bretzke <thomas@taccon.com>
 * @copyright (c) 2016 taccon software
 */
class TicketController extends Controller
{
    /** @var TicketManager $ticketManager */
    protected $ticketManager;

    /** @var ProjectManager $projectManager */
    protected $projectManager;

    /**
     * TicketController constructor.
     * @param TicketManager $ticketManager
     * @param ProjectManager $projectManager
     */
    public function __construct(TicketManager $ticketManager, ProjectManager $projectManager)
    {
        $this->ticketManager = $ticketManager;
        $this->projectManager = $projectManager;
    }

    /**
     * GET /projects/{projectId}/tickets
     *
     * @param int $projectId project id
     * @return array
     */
    public function getProjectTickets($projectId)
    {
        $project = $this->projectManager->getProject($projectId);

        return $project->tickets;
    }

    /**
     * GET /projects/{projectId}/tickets/{ticketNumber}
     *
     * @param string $ticketNumber
     * @return Ticket
     */
    public function getTicket($ticketNumber)
    {
        return $this->ticketManager->getTicket($ticketNumber);
    }
}
