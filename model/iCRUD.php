<?php

interface iCRUD
{
    public function create($params);

    public function read();

    //public function update($id_conducteur, $params);

    public function delete($params);
}
