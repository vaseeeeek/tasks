<?php 


class tasksTaskshelperPluginBackendGettimeAction extends waViewAction
{

  /**
   * @throws waException
   */
  public function execute()
  {    
        $data = waRequest::post();
        $model = new waModel();
        // Поиск строки с указанным id
        $sql = "SELECT * FROM `tasks_task_time` WHERE `id` = " . $data['id'];
        $result = $model->query($sql)->fetchAll();
        
        $isIdExists = false;

        foreach ($result as $item) {
            if ($item['id'] == $data['id']) {
                $isIdExists = true;
                break;
            }
        }

        if ($isIdExists) {
            // Строка с таким id уже существует, обновляем значение столбца "value"
            $sql = "UPDATE `tasks_task_time` SET `value` = '" . $data['time'] . "' WHERE `id` = " . $data['id'];
        } else {
            // Строки с таким id нет, создаем новую строку
            $sql = "INSERT INTO `tasks_task_time` (`id`, `value`) VALUES (" . $data['id'] . ", '" . $data['time'] . "')";
        }
        
        $model->query($sql);
  }

}
