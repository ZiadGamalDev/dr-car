<?php

namespace App\Http\Interfaces\Web;

interface ProviderInterface
{
    public function index();

    public function create();
    
    public function store($request);

    public function show($id);

    public function edit($id);

    public function update($request, $id);

    public function destroy($id);
}
