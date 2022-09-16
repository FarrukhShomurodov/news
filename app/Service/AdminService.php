<?php

namespace App\Service;

use App\Models\Post;
use App\Models\Tag;


class AdminService{
    public function create($validated)
        {
        $image = $validated['title_image']->store('public/images');
        $validated['title_image'] = $image;
        $post = Post::create($validated);
        foreach ($validated['tags'] as $key => $tag)
        {
            if (!is_numeric($tag))
            {
                $validated['tags'][$key] = Tag::create(['tag_name' => $tag])->id;
            }
        }
        $post->tags()->sync($validated['tags']);

    }
    public function update($validated, $post)
    {
        $image = $validated['title_image']->store('public/images');
        $validated['title_image'] = $image;
        $post->update($validated);
        $post->tags()->sync($validated['tags']);
    }
}
?>
