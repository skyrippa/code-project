<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;
    /**
     * @var ProjectNoteService
     */
    private $service;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
    {
        $this->repository = $repository;

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     * @return Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);;
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param $noteId
     * @return mixed
     */
    public function show($id, $noteId)
    {
        return $this->repository->findWhere(['project_id'=>$id, 'id'=>$noteId]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param $noteId
     * @return void
     */
    public function update(Request $request, $id, $noteId)
    {
        return $this->service->update($request->all(), $noteId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param $noteId
     * @return void
     */
    public function destroy($id, $noteId)
    {
        $this->repository->find($noteId)->delete();
    }
}
