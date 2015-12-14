<?php 
namespace Libraries;

class Secure
{
    public function xss($type = 'GET'){
        eval("
        foreach (\$_{$type} as \$key => \$val)
        {
            unset(\$_{$type}[\$key]);
            \$key = htmlspecialchars(\$key, ENT_QUOTES | ENT_HTML401, 'UTF-8');
            \$val = htmlspecialchars(\$val, ENT_QUOTES | ENT_HTML401, 'UTF-8');
            \$_{$type}[\$key] = \$val;
        }
        ");
    }
    
    public function xssAll(){
        $this->xss('GET');
        $this->xss('POST');
        $this->xss('SERVER');
    }
}
