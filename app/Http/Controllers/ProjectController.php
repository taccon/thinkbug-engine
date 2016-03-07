<?php

namespace App\Http\Controllers;

use App\Services\ProjectManager;

/**
 * Class ProjectController
 *
 * Project controller
 *
 * @package App\Http\Controllers
 * @author Thomas Bretzke <thomas@taccon.com>
 * @copyright (c) 2016 taccon software
 */
class ProjectController extends Controller
{
    /** @var ProjectManager $projectManager */
    protected $projectManager;

    /**
     * ProjectController constructor.
     * @param ProjectManager $projectManager
     */
    public function __construct(ProjectManager $projectManager)
    {
        $this->projectManager = $projectManager;
    }

    public function getProjects()
    {
        return $this->projectManager->getAllProjects();
    }
}
