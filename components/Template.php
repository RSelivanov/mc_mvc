<?php
class Template {

  private $content; // tpl-файл
  private $data = array(); // Данные для вывода

  /* Метод для добавления новых значений в данные для вывода */ 
  public function set($name, $value) {
    $this->data[$name] = $value;
  }

  /* Вывод tpl-файла, в который подставляются все данные для вывода */ 
  public function out_content($template) {
      $this->content = file_get_contents($template);
      
      foreach ($this->data as $key => $value) {
          $this->content = str_replace($key, $value, $this->content);
      }
      return $this->content;
  }
}