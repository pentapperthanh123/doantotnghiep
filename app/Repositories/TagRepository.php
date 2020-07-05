<?php 
	namespace App\Repositories;

	use App\Models\Tag;
	use App\Http\Resources\TagResource;

	class TagRepository
	{
	/**
     * Get all of the objects for a given model.
     *
     * @return Collection
     */
		public function index()
	    {
	        return TagResource::collection(Tag::orderBy('id','ASC')->get());
	    }

	    public function store($request)
	    {
	        return new TagResource(Tag::create($request->all()));   
	    }

	    public function update($request,$id)
	    {
	        $tags = Tag::findOrFail($id);
	        $tags->update($request->only(['value','devices_id']));
	        return new TagResource($tags);
	    }

	    public function destroy($id)
	    {
	    	$tag = Tag::findOrFail($id);
	    	$tag->delete();
	    	return response()->json(null,204);
	    }
	}
