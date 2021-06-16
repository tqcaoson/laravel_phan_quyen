<?php

namespace Core\Services;
use Core\Services\ServiceInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaseService implements ServiceInterface
{
    protected $repository;

    public function paginate()
    {
        return $this->repository->paginate();
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function store($data)
    {
        DB::beginTransaction();

        try {
            $repository = $this->repository->store($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();

        return $repository;
    }

    public function update($id, $data)
    {
        DB::beginTransaction();

        try {
            $repository = $this->repository->update($id, $data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();

        return $repository;
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $repository = $this->repository->destroy($id);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to delete post data');
        }

        DB::commit();
        
        return $repository;
    }
}