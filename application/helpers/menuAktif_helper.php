<?php

    // if ($this->router->fetch_class() == 'dashboard') { echo 'active'}
    function menuAktif($class = ''){
        $ci =& get_instance(); //mengambil instance dari ci (mengambil/ akses di luar controller,views,model)

        if($ci->router->fetch_class() == $class){
            return 'active';
        }

        return false;
    }
?>
