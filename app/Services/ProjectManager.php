<?php

namespace App\Services;
use App\Project;

/**
 * Class ProjectManager
 *
 * Project service (handles i/o for projects)
 *
 * @package App\Services
 * @author Thomas Bretzke <thomas@taccon.com>
 * @copyright (c) 2016 taccon software
 */
class ProjectManager
{
    /**
     * @param array $projectData
     * @return static
     */
    public function createProject(array $projectData)
    {
        return Project::create($projectData);
    }

    /**
     * @param Project $project
     * @return Project
     */
    public function saveProject(Project $project)
    {
        $project->save();

        return $project;
    }

    /**
     * @return array<Project> list of projects
     */
    public function getAllProjects()
    {

        return Project::all();
    }

    /**
     * @param int $projectId project id
     * @return mixed
     */
    public function getProject($projectId)
    {

        return Project::find($projectId);
    }
}
