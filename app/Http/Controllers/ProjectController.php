<?php

namespace App\Http\Controllers;

use App\Services\ProjectManager;
use App\User;
use Illuminate\Database\QueryException;
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

    /**
     * GET /projects
     *
     * @return array projects
     */
    public function getProjects()
    {
        return $this->projectManager->getAllProjects();
    }

    /**
     * GET /projects/{projectId}
     *
     * @param int $projectId
     * @return mixed
     */
    public function getProject($projectId)
    {
        return $this->projectManager->getProject($projectId);
    }

    /**
     * POST /projects
     *
     * @param Request $request
     * @return static
     */
    public function postProject(Request $request)
    {
        return $this->projectManager->createProject(
            [
                'name' => $request->name
            ]
        );
    }

    /**
     * GET /projects/{projectId}/users
     *
     * @param $projectId
     * @return mixed
     */
    public function getProjectUsers($projectId)
    {
        $project = $this->getProject($projectId);

        return $project->users;
    }

    /**
     * POST /projects/{projectId}/users
     *
     * @param Request $request
     * @param $projectId
     * @return mixed
     */
    public function postProjectUsers(Request $request, $projectId)
    {
        $user = User::firstOrCreate(['email' => $request->email]);
        $project = $this->getProject($projectId);

        try {
            $project->users()->attach($user->id);
        } catch (QueryException $e) {
            // TODO Log
        }


        return $project->users;
    }
}
