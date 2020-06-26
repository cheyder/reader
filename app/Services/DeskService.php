namespace App\Services;


private $nestingLevels = [];

private function calculateNestingLevels ($currentFolderId)
  {
    $currentFolder = Folder::find($currentFolderId);
    $parentId = $currentFolder->parent_id;
    $folderId = $currentFolder->id;
    if ($parentId > 0) {
      $this->calculateNestingLevels($parentId);
    }
    array_push($this->nestingLevels, $folderId);
  }