<?php

namespace App\HTML;

class Form
{
    private $data;
    private $errors;

    public function __construct($data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input(string $key, string $label, string $type): string
    {
        $value = $this->getValue($key);
        
        return <<<HTML
            <div class="form-group mt-2">
                <label for="field{$key}">{$label}</label>
                <input type="{$type}" id="field{$key}" class="{$this->getInputClass($key)} mt-2" name="{$key}" value="{$value}" required>
                {$this->getErrorFeedBack($key)}
            </div>
HTML;
    }

    public function textarea(string $key, string $label): string
    {
        $value = $this->getValue($key);
        
        return <<<HTML
            <div class="form-group mt-2">
                <label for="field{$key}">{$label}</label>
                <textarea type="text" id="field{$key}" class="{$this->getInputClass($key)} mt-2" name="{$key}" value="{$value}" required>{$value}</textarea>
                {$this->getErrorFeedBack($key)}
            </div>
HTML;       
    }

    public function select(string $key, string $label, array $options = []): string
    {
        $optionsHTML = [];
        
        $value = $this->getValue($key);
        // dd($value);
        foreach($options as $k => $v)
        {   
                $selected = ($k==$value) ? " selected" : "";
            
            $optionsHTML[] ="<option value=\"$k\"$selected>$v</option>";
        }
        
        $optionsHTML = implode('', $optionsHTML);
        return <<<HTML
            <div class="form-group mt-2">
                <label for="field{$key}">{$label}</label>
                <select id="field{$key}" class="{$this->getInputClass($key)} mt-2" name="{$key}" value="{$value}" required multiple>{$optionsHTML}</select>
                {$this->getErrorFeedBack($key)}
            </div>
HTML;
    }

    private function getValue(string $key)
    {
        if (is_array($this->data)) {
            return $this->data[$key] ?? null;
        }
        $method = 'get' . ucfirst($key);
        $value = $this->data->$method();
        if($value instanceof \DateTimeInterface){
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }

    private function getInputClass(string $key): string
    {
        $inputClass = 'form-control';
        if (isset($this->errors[$key])) {
            $inputClass .= ' is-invalid';
        }
        return $inputClass;
    }

    private function getErrorFeedBack(string $key): string
    {
        if (isset($this->errors[$key])) {
            if(is_array($this->errors[$key])){
                $errors = implode('<br>', $this->errors[$key]);
            }else{
                $errors = $this->errors[$key];
            }
            return '<div class="invalid-feedback">' . $errors . '</div>';
        }
        return '';
    }
}