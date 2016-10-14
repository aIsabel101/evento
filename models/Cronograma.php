<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Cronograma {
    private $expositor;
    private $tema;
    private $horaInicio;
    private $horaFin;
    private $fecha;
    
   /*function __construct($expositor, $tema, $horaInicio, $horaFin, $fecha) {
        $this->expositor = $expositor;
        $this->tema = $tema;
        $this->horaInicio = $horaInicio;
        $this->horaFin = $horaFin;
        $this->fecha = $fecha;
    }
*/
    function __construct() {
        $this->expositor = new app\models\Expositor();
        $this->expositor = new app\models\Expositor();
        $this->horaInicio = 0;
        $this->horaFin = 0;
        $this->expositor = new app\models\Expositor();
    }
    
    public function getExpositor() {
        return $this->expositor;
    }

    public function getTema() {
        return $this->tema;
    }

    public function getHoraInicio() {
        return $this->horaInicio;
    }

    public function getHoraFin() {
        return $this->horaFin;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setExpositor($expositor) {
        $this->expositor = $expositor;
    }

    public function setTema($tema) {
        $this->tema = $tema;
    }

    public function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    public function setHoraFin($horaFin) {
        $this->horaFin = $horaFin;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
}