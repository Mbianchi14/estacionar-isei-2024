<?php
class Administrador extends Usuario
{
    protected $nivel_acceso; 
    protected $ultima_actividad; 
    protected $permisos = []; 
    protected $registros_manejados; 
    protected $fecha_asignacion; 
    protected $tareas_asignadas = []; 
    protected $historial_cambios = [];

    public function __construct($nivel_acceso,$ultima_actividad,$permisos=[],$registros_manejados,
    $fecha_asignacion,$tareas_asignadas=[],$historial_cambios=[])
    {
        $this->nivel_acceso = $nivel_acceso;
        $this->ultima_actividad = $ultima_actividad;
        $this->permisos = $permisos;
        $this->registros_manejados = $registros_manejados;
        $this->fecha_asignacion = $fecha_asignacion;
        $this->tareas_asignadas = $tareas_asignadas;
        $this->historial_cambios = $historial_cambios;
    }

    public function Agregar(){
    $sql='INSERT INTO administrador (nivel_acceso,ultima_actividad,permisos,
    registros_manejados,fecha_asignacion,tareas_asignadas,historial_cambios)
    VALUES (:nivel_acceso,:ultima_actividad.:permisos,:registros_manejados,
    :fecha_asignacion,:tareas_asignadas,:historial_cambios)';      
    $params=['nivel_acceso'=>$nivel_acceso,'ultima_actividad'=>$ultima_actividad,'permisos'=>$permisos,
    'registros_manejados'=>$registros_manejados, 'fecha_asignacion'=>$fecha_asignacion,'tareas_asignadas'=>$tareas_asignadas,'historial_cambios'=>$historial_cambios];
    $resultado= Database::execute($sql,$params);
    return $resultado; }

    public function Editar()
    {
        $sql='UPDATE usuarios SET (nivel_acceso=:nivel_acceso,ultima_actividad=:ultima_actividad,permisos=:permisos,
        registros_manejados=:registros_manejados,fecha_asignacion=:fecha_asignacion,tareas_asignadas=:tareas_asignadas,
        historial_cambios=:historial_cambios) WHERE id=:id';
          $params=['nivel_acceso'=>$nivel_acceso,'ultima_actividad'=>$ultima_actividad,'permisos'=>$permisos,
          'registros_manejados'=>$registros_manejados, 'fecha_asignacion'=>$fecha_asignacion,'tareas_asignadas'=>$tareas_asignadas,'historial_cambios'=>$historial_cambios];
          $resultado= Database::execute($sql,$params);
          return $resultado;  
    }

    public function Desactivar($id,$activo)
    {
        $sql='UPDATE administrador SET (activo) WHERE id=:id';
        $params=['activo'=>0,'id'=>$id];    
        $resultado= Database::execute($sql,$params);
        return $resultado;  
    }

       
}
