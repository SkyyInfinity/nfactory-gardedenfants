<?php

namespace Vendor\Model;

use Vendor\Model\Model;


class DbInterface extends Model
{

    /**
     * Delete data in Database
     *
     * @param integer $id
     * @param object $class
     * @return boolean
     */
    public function delete($id, $class)
    {
        return $this->exec('DELETE FROM ' . $class . ' where id = ' . $id);
    }

    /**
     * Save data in Database
     *
     * @param array $data
     * @param object $class
     */
    public function save($data, $class)
    {
        $statement = 'INSERT INTO ' . $class . '(';
        foreach ($data as $key => $value) {
            $statement .= $key.', ';
        }
        $statement = substr($statement, 0, -2) . ') VALUES (';
        foreach ($data as $key => $value) {
            $statement .= ':' . $key.', ';
        }
        $statement = substr($statement, 0, -2) . ')';

        foreach ($data as $key => $value) {
            $key = ':' . $key;
            if ($key != 'password'){
                $value = htmlspecialchars($value);
            }
        }

        $this->insert($statement, $data);
    }

    /**
     * Update data in Database
     *
     * @param array $data
     * @param object $class
     */
    public function update($data, $class)
    {
        $statement = 'UPDATE ' . $class . ' SET ';
        foreach ($data as $key => $value) {
           $statement .= $key . " = " . $value . ", ";
        }
        $statement = substr($statement, 0, -2) . " WHERE id = " . $data["id"];

    }
}