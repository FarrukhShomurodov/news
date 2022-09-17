<?php

namespace App\Service;



use App\Models\Tag;

class TagsService{
    public function store($validated)
    {
        $tags = new Tag();
        $tags->tag_name = $validated["tag_name"];
        $tags->save();
        return redirect()->route('login.admin.categories.index');

    }
    public function update($validated, $tag)
    {
        $tag->tag_name = $validated["tag_name"];
        $tag->update();
    }
    public function destroy($tag)
    {
        $tag->delete();
    }
}
?>
