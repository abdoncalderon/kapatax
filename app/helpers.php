<?php

use App\Models\UserProject;

if (! function_exists('current_user')) {
    function current_user()
    {
        $projectId = session('current_project_id');
        $userProject = UserProject::where('user_id',auth()->user()->id)->where('project_id', $projectId)->first();
        return $userProject;
    }
}


