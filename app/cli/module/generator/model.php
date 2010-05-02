<?php
/**
 * The model file of generator module of ZenTaoPHP.
 *
 * ZenTaoPHP is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * ZenTaoPHP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public License
 * along with ZenTaoPHP.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright   Copyright 2009-2010 青岛易软天创网络科技有限公司(www.cnezsoft.com)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     ZenTaoPHP
 * @version     $Id$
 */
?>
<?php
class generatorModel extends model
{
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }

    /* 设置要创建的应用的数据库句柄。*/
    public function setDBH($dbh)
    {
        $this->dbh = $dbh;
    }

    /* 获得某一个表的所有字段。*/
    public function getFields($tableName)
    {
        $this->dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $stmt = $this->dbh->query("DESCRIBE `$tableName`");
        $fields = $stmt->fetchAll();
        $this->dbh->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
        return $fields;
    }

    /* 获得某一个表的所有字段名的最大长度。*/
    public function getFieldsMaxLength($fields)
    {
        $maxLength = 0;
        foreach($fields as $field)
        {
            if(strlen($field->field) > $maxLength) $maxLength = strlen($field->field);
        }
        return $maxLength;
    }
}
