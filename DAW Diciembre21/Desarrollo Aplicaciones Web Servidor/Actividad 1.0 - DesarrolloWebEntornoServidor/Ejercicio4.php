<?php
    // Declarar la interfaz 'iMac'
    interface iMac
    {
        public function setMarca($marca);
        public function setSoftware($software);

        public function getMarca($marca);
        public function getSoftware($software);

        public const nameMarca = "Apple";
    }
?>