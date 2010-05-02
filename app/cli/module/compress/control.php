<?php if(!defined('IN_SHELL')) exit;?>
<?php
/**
 * The control file of compress module of ZenTaoPHP.
 *
 * ZenTaoPHP is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.

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
 * @link        http://www.zentaoms.com
 */
class compress extends control
{
    /* 构造函数。*/
    public function __construct()
    {
        parent::__construct();
    }

    /* 压缩框架类文件。*/
    public function compressFramework()
    {
        $fileContent = '';
        $files = glob($this->app->getFrameRoot() . '*.class.php');
        foreach($files as $file)
        {
            if(strpos($file, 'all.class.php')) continue;
            $classContent = trim(file_get_contents($file));
            if(substr($classContent, -2) != '?>') $classContent .= "\n?>\n";
            $fileContent .= $classContent;
        }
        file_put_contents($this->app->getFrameRoot() . 'all.class.php', str_replace('^M', '', $fileContent));
    }
}
