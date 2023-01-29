<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;

class DestroyController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $this->service->destroy($tag);
        return redirect()->route('admin.tag.index')->with(['success' => 'Тег удален']);
    }
}
