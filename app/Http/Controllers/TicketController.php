<?php

namespace App\Http\Controllers;
use App\Services\TicketManager;

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

    /**
     * TicketController constructor.
     * @param TicketManager $ticketManager
     */
    public function __construct(TicketManager $ticketManager)
    {
        $this->ticketManager = $ticketManager;
    }

    /**
     * GET /projects/{projectId}/tickets
     *
     * @param int $projectId project id
     * @return array
     */
    public function getProjectTickets($projectId)
    {
        return [];
    }
}