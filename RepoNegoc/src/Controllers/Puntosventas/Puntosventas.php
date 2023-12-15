<?php

namespace Controllers\Puntosventas;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Puntosventas\Puntosventas as DAOPuntosventa;
use Utilities\Site;
use Utilities\Validators;

class Puntosventas extends PublicController
{
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
    private $puntosventa = [
        "idpuntoventa" => -1,
        "nombrefranquicia" => "",
        "nombrepuntoventa" => "",
        "pais" => "",
        "ciudad" => "",
        "codigopostal" => "",
        "direccion" => "",
        "telefono" => "",
        "email" => "",
        "responsablenombre" => "",
        "responsabletelefono" => ""
    ];
    private $url = "index.php?page=Puntosventas_Puntosventa";
    private $mode = 'INS';
    private $viewData = [];
    private $error = [];

    private $modes = [
        "INS" => "Ingresando nuevo punto de venta",
        "UPD" => "Editando punto de venta",
        "DEL" => "Eliminando punto de venta",
        "DSP" => "Detalle de punto de venta"
    ];

    public function run(): void
    {
        $this->init();
        if ($this->isPostBack()) {
            if ($this->validateFormData()) {
                $this->puntosventa['idpuntoventa'] = $_POST['idpuntoventa'];
                $this->puntosventa['nombrefranquicia'] = $_POST['nombrefranquicia'];
                $this->puntosventa['nombrepuntoventa'] = $_POST['nombrepuntoventa'];
                $this->puntosventa['pais'] = $_POST['pais'];
                $this->puntosventa['ciudad'] = $_POST['ciudad'];
                $this->puntosventa['codigopostal'] = $_POST['codigopostal'];
                $this->puntosventa['direccion'] = $_POST['direccion'];
                $this->puntosventa['telefono'] = $_POST['telefono'];
                $this->puntosventa['email'] = $_POST['email'];
                $this->puntosventa['responsablenombre'] = $_POST['responsablenombre'];
                $this->puntosventa['responsabletelefono'] = $_POST['responsabletelefono'];
                $this->processAction();
            }
        }
        $this->prepareViewData();
        $this->render();
    }

    private function init()
    {
        if (isset($_GET["mode"])) {
            if (isset($this->modes[$_GET["mode"]])) {
                $this->mode = $_GET["mode"];
                if ($this->mode !== "INS") {
                    if (isset($_GET["idpuntoventa"])) {
                        $this->puntosventa = DAOPuntosventa::obtenerPorId(strval($_GET["idpuntoventa"]));
                    }
                }
            } else {
                $this->handleError("Oops, el programa no encuentra el modo solicitado, intente de nuevo");
            }
        } else {
            $this->handleError("Oops, el programa falló, intente de nuevo.");
        }
    }

    private function handleError($errMsg)
    {
        Site::redirectToWithMsg($this->url, $errMsg);
    }

    private function validateFormData()
    {
        if (Validators::IsEmpty($_POST["nombrefranquicia"])) {
            $this->error["nombrefranquicia_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["nombrepuntoventa"])) {
            $this->error["nombrepuntoventa_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["pais"])) {
            $this->error["pais_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["ciudad"])) {
            $this->error["ciudad_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["codigopostal"])) {
            $this->error["codigopostal_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["direccion"])) {
            $this->error["direccion_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["telefono"])) {
            $this->error["telefono_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["email"])) {
            $this->error["email_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["responsablenombre"])) {
            $this->error["responsablenombre_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["responsabletelefono"])) {
            $this->error["responsabletelefono_error"] = "Campo es requerido";
        }

        return count($this->error) == 0;
    }

    private function processAction()
    {
        switch ($this->mode) {
            case 'INS':
                if (DAOPuntosventa::insertPuntosventa(
                    $this->puntosventa["nombrefranquicia"],
                    $this->puntosventa["nombrepuntoventa"],
                    $this->puntosventa["pais"],
                    $this->puntosventa["ciudad"],
                    $this->puntosventa["codigopostal"],
                    $this->puntosventa["direccion"],
                    $this->puntosventa["telefono"],
                    $this->puntosventa["email"],
                    $this->puntosventa["responsablenombre"],
                    $this->puntosventa["responsabletelefono"]
                )
                ) {
                    Site::redirectToWithMsg($this->url, "Punto de venta creado exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->url, "Hubo un error.");
                }
                break;
            case 'UPD':
                if (DAOPuntosventa::updatePuntosventa(
                    $this->puntosventa["idpuntoventa"],
                    $this->puntosventa["nombrefranquicia"],
                    $this->puntosventa["nombrepuntoventa"],
                    $this->puntosventa["pais"],
                    $this->puntosventa["ciudad"],
                    $this->puntosventa["codigopostal"],
                    $this->puntosventa["direccion"],
                    $this->puntosventa["telefono"],
                    $this->puntosventa["email"],
                    $this->puntosventa["responsablenombre"],
                    $this->puntosventa["responsabletelefono"]
                )
                ) {
                    Site::redirectToWithMsg($this->url, "Punto de venta actualizado exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->url, "Hubo un error.");
                }
                break;
            case 'DEL':
                if (DAOPuntosventa::deletePuntosventa(
                    $this->puntosventa["idpuntoventa"]
                )
                ) {
                    Site::redirectToWithMsg($this->url, "Punto de venta eliminado exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->url, "Hubo un error.");
                }
                break;
        }
    }


    private function prepareViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["puntosventa"] = $this->puntosventa;
        if ($this->mode == "INS") {
            $this->viewData["modedsc"] = $this->modes[$this->mode];
        } else {
            $this->viewData["modedsc"] = sprintf(
             $this->modes[$this->mode]
            );
        }

        foreach ($this->error as $key => $error) {
            if ($error !== null) {
                $this->viewData["puntosventa"][$key] = $error;
            }
        }
        $this->viewData["readonly"] = in_array($this->mode, ["DSP", "DEL"]) ? 'readonly' : '';
        $this->viewData["showConfirm"] = $this->mode !== "DSP";

    }


    private function render()
    {
        Renderer::render("puntosventas/puntosventaform", $this->viewData);
    }
}
