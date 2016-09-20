<?php

/**
 * Created by PhpStorm.
 * @author Sayan
 * Date: 01.09.2016
 * Time: 15:33
 * @package classes
 */
class DatabaseClass
{
    private $pdo;

    /**
     * @author Sayan
     * создаем подключение к базе данных
     */
    public function __construct()
    {
        $database = new \PDO('mysql:host=127.0.0.1;dbname=my_database', 'root', '');
        $this->pdo = $database;
    }

    /**
     * @author Sayan
     * @param string $tableName - название таблицы
     * @param string $data - название колонок и вся информация которые внем хранится
     * @return boolean
     * Метод insert() добавляет запись в таблицу
     */
    public function insert($tableName, $data)
    {
        $columns = [];
        $columnsInfo = [];

        foreach ($data as $key => $value) {
            $columns[] = $key;
            $columnsInfo[] = '"' . $value . '"';
        }

        $columnsString = implode(', ', $columns);
        $columnsInfoString = implode(', ', $columnsInfo);

        $sql = 'INSERT INTO ' . $tableName . ' (' . $columnsString . ') VALUES (' . $columnsInfoString . ')';

        $result = $this->pdo->exec($sql);

        if ($result != 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @author Sayan
     * @param string $tableName - название таблицы
     * @return string
     * Метод findAll() возвращает все записи веденные в таблицу
     */
    public function findAll($tableName)
    {
        $sql = 'SELECT * FROM ' . $tableName;
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    /**
     * @author Sayan
     * @param string $tableName - название таблицы
     * @param string $id - название колони и информация которые внем хранится
     * @return string
     * Метод findOne() возвращает один укзанный запись
     */
    public function findOne($tableName, $id)
    {
        $sql = 'SELECT * FROM ' . $tableName . ' where id=' . $id;
        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    /**
     * @author Sayan
     * @param string $tablename
     * @param array $params
     * @param array $condition
     * @return boolean
     * Метод update() обновляет существующий запись
     */
    public function update($tablename, array $params, array $condition, $sep = 'AND')
    {
        $sql1 = '';

        foreach ($params as $key => $value) {
            $sql1 .= $key . ' = "' . $value . '", ';
        }
        $paramsFinal = rtrim($sql1, ', ');

        $sql2 = '';

        foreach ($condition as $key => $value) {
            $sql2 .= $key . ' = "' . $value . '" ' . $sep . ' ';
        }
        $conditionFinal = rtrim($sql2, ' ' .  $sep . ' ');

        $sql = 'UPDATE ' . $tablename . ' SET ' . $paramsFinal . ' WHERE ' . $conditionFinal;

        $sth = $this->pdo->prepare($sql);
        $sth->execute();
        $result = $sth->rowCount();

        if ($result != 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $tableName
     * @param array $condition
     * @return boolean
     * Метод delete() удаляет запись из таблицы
     */
    public function delete($tableName, array $condition)
    {
        $sql1 = '';

        foreach ($condition as $key => $value) {
            $sql1 .= $key . ' = "' . $value . '", ';
        }
        $paramsFinal = rtrim($sql1, ', ');

        $sql = 'DELETE FROM ' . $tableName . ' WHERE ' . $paramsFinal;
        $result = $this->pdo->exec($sql);

        if ($result != 0) {
            return true;
        } else {
            return false;
        }
    }
}