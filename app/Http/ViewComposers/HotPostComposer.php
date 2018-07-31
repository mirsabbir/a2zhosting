<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Post;
use App\Category;


class HotPostComposer
{
    
    protected $category, $post;

    
    public function __construct(Category $category,Post $post)
    {
        $this->post = $post;
        $this->category = $category;
        
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $latests = $this->category->with('latestPosts')->get();
        $populars = $this->category->with('popularPosts')->get();
        $view->with(['latests' => $latests, 'populars' => $populars]);
    }
}