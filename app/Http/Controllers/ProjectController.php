<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\ProjectManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    /**
     * @param int $projectId
     * @return mixed
     */
    public function getProject($projectId)
    {
        $project = $this->projectManager->getProject($projectId);

        if (!$project) {
            throw new NotFoundHttpException('Project not found!');
        }

        return $project;
    }

    public function postProject(Request $request)
    {
        return $this->projectManager->createProject(
            [
                'name' => $request->name
            ]
        );
    }
}
