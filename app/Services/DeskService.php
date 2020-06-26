<?php

namespace App\Services;
use App\Folder;

class DeskService 
{
    private $nestingBranch = [];

    public function wrapCollection ($folderId)
    {
        $folder = Folder::find($folderId);
        $subfolders = $folder->subfolders()->get();
        $subfiles = $folder->files()->get();
        $nestingBranch = $this->calculateNestingBranch($folderId);
        $collection = [
            'folder'        => $folder,
            'subfolders'    => $subfolders,
            'subfiles'      => $subfiles,
            'nestingBranch' => $this->nestingBranch
        ];
        return $collection;

    }

    private function calculateNestingBranch ($folderId)
    {
        $folder = Folder::find($folderId);
        $parentId = $folder->parent_id;
        if ($parentId > 0) {
            $this->calculateNestingBranch($parentId);
        }
        array_push($this->nestingBranch, $folderId);
    }
}


