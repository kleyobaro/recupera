<?php
namespace Controllers\Puntosventas;
use Controllers\PublicController;
use Views\Renderer;
use Dao\Puntosventas\Puntosventas as DAOPuntosventa;
use Utilities\Site;
use Utilities\Validators;
use Utilities\Context;
use Utilities\Paging;
class Puntosventa extends PublicController {
  private $idpuntoventa;
  private $nombrefranquicia;
  private $nombrepuntoventa;
  private $pais;
  private $ciudad;
  private $codigopostal;
  private $direccion;
  private $telefono;
  private $email;
  private $responsablenombre;
  private $responsabletelefono;
  private $fecharegistro;

    public function run(): void
    {
        Site::addLink('puntosventa_style');
        $viewData['idpuntoventa'] = 'idpuntoventa';
		$viewData['nombrefranquicia'] = 'nombrefranquicia';
		$viewData['nombrepuntoventa'] = 'nombrepuntoventa';
		$viewData['pais'] = 'pais';
		$viewData['ciudad'] = 'ciudad';
		$viewData['codigopostal'] = 'codigopostal';
		$viewData['direccion'] = 'direccion';
		$viewData['telefono'] = 'telefono';
		$viewData['email'] = 'email';
		$viewData['responsablenombre'] = 'responsablenombre';
		$viewData['responsabletelefono'] = 'responsabletelefono';
		$viewData['fecharegistro'] = 'fecharegistro';

		$viewData['puntosventa']= DAOPuntosventa::getPuntosventa();
        Renderer::render("puntosventas/puntosventalist", $viewData);
    }
}
