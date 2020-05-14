<?php
class listDAO
{
    private $objCon;

    function __construct()
    {
        require __DIR__ . '\..\infrastructure\clsConexion.php';
        $this->objCon = new clsConexion();
        $this->con = $this->objCon->conectar();
    }

    public function listLaboratorios()
    {
        $sql = "select id,nombre from laboratorio";
        $this->objCon->Execute($sql);
    }

    public function listMedicamentos()
    {
        $sql = "select id,nombre,cantidad,precio from inventario_medico";
        $this->objCon->Execute($sql);
    }

    public function ListClientes()
    {
        $sql = "select id,cedula from cliente";
        $this->objCon->Execute($sql);
    }

    
}
