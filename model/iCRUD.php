<?php

interface iCRUD
{
    public function create($params);

    public function read();

    //public function update($params);

    public function delete($params);
}
