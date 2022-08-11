<?php
    class relativePath{

        public function path(){
            $acumulator = "";
            $local = str_replace($_SERVER['DOCUMENT_ROOT'],'',$_SERVER['SCRIPT_FILENAME']);
            $localPath = explode("/",$local);
            foreach($localPath as $item){
                $acumulator = $acumulator . "../"; 
            }
            return $acumulator = substr($acumulator,6); //2vezes "../"
        }

    }
?>