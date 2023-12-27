<?php

namespace App\Traits;

use App\Models\Project;

trait AssignClientLogoTrait
{
    public function assignClientLogosToProjects()
    {
        $projectsWithoutLogo = Project::whereNull('logo')->get();

        foreach ($projectsWithoutLogo as $project) {
            $clientsWithLogo = $project->clients()
                ->whereNotNull('logo')
                ->whereNull('extra_logos')
                ->get();

            if ($clientsWithLogo->isNotEmpty()) {
                $clientWithLogo = $clientsWithLogo->first();

                $project->logo = $clientWithLogo->logo;
                $project->save();
            }
        }
    }
}