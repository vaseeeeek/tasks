<?php

class tasksTaskshelperPlugin extends waPlugin
{    
    public function getTime($id)
    {
        $model = new waModel();
        $sql = "SELECT * FROM `tasks_task_time` WHERE `id` = " . $id;
        $result = $model->query($sql)->fetchAll();
        if (reset($result)['value'])
        {
            return reset($result)['value'];
        } else 
        {
            return false;
        }
    }
}
