<?php

namespace Core\Repositories\Permission;

interface PermissionRepositoryContract
{
    public function all();
    public function byRoleShow($id);
    public function byRoleEdit($id);
    public function paginate();
    public function find($id);
    public function store($data);
    public function update($id, $data);
    public function destroy($id);
}