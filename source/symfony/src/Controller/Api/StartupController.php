<?php

namespace App\Controller\Api;


use App\Entity\Startup;
use MediaMonks\RestApi\Exception\FormValidationException;
use MediaMonks\RestApi\Response\Response;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/startups")
 */
class StartupController extends AbstractController
{
    const IMG_URL = 'https://phpstack-401769-1264820.cloudwaysapps.com/uploads/';

    public function getImage($object)
    {
        if ($object) {
            if ($object->getProviderReference() != '') {
                return self::IMG_URL . $object->getProviderReference();
            }
        }
        return null;
    }

    public function getDocumentos($startup)
    {
        $documentos = [];
        foreach ($startup->getDocumentos() as $documento) {
            $documentos[] = [
                'id' => $documento->getId(),
                'type' => $documento->getType()->getName(),
                'name' => $documento->getName(),
                'value' => $documento->getValue(),
                'source' => $documento->getSource(),
                'date' => $documento->getDate(),
            ];
        }
        return $documentos;
    }

    public function getStatus($startup)
    {
        $status = [];
        foreach ($startup->getStatus() as $s) {
            $status[] = [
                'id' => $s->getId(),
                'title' => $s->getTitle(),
                'status' => $s->getText(),
                'fecha' => $s->getFecha()
            ];
        }
        return $status;
    }

    public function getBasic($startup)
    {
        $basic = $startup->getBasic();
        $inversores = [];
        foreach ($basic->getInversorStartups() as $inversor) {

            $inversores[] = [
                'id' => $inversor->getInversor()->getId(),
                'name' => $inversor->getInversor()->getName(),
                'porcentaje_participacion' => $inversor->getPorcentajeParticipacion(),
                'logo' => $this->getImage($inversor->getInversor()->getLogo()),
                'website' => $inversor->getInversor()->getWebsite()
            ];
        }
        return [
            'batch' => $basic->getBatch(),
            'total_invertido_gridx' => $basic->getTotalInvertidoGridx(),
            'invertido_gridx_follow' => $basic->getInvertidoGridxFollow(),
            'invertido_gridx' => $basic->getInvertidoGridx(),
            'empleados' => $basic->getEmpleados(),
            'estatuto' => $basic->getEstatuto(),
            'valuacion' => $basic->getValuacion(),
            'registro_acciones_inicial' => $basic->getRegistroAccionesInicial(),
            'inversores' => $inversores
        ];
    }

    public function getFounders($startup)
    {
        $founders = [];
        foreach ($startup->getFounders() as $founder) {
            $founders[] = [
                'id' => $founder->getId(),
                'name' => $founder->getName(),
                'linkedin' => $founder->getLinkedin(),
                'email' => $founder->getEmail(),
                'genero' => $founder->getGenero(),
                'phd' => (boolean)$founder->getPHD(),
                'conicet' => (boolean)$founder->getConicet()
            ];
        }
        return $founders;
    }

    public function getVerticales($startup)
    {
        $verticales = [];
        foreach ($startup->getVerticales() as $vertical) {
            $verticales[] = [
                'id' => $vertical->getId(),
                'name' => $vertical->getName()
            ];
        }

        return $verticales;
    }

    /**
     * @Route("/list", name="startup_list")
     * @Route/Method({"GET"})
     */
    public function listAction()
    {
        $result = [];
        $startups = $this->getDoctrine()->getRepository(Startup::class)->findAll();
        foreach ($startups as $startup) {


            $result[] = [
                'id' => $startup->getId(),
                'name' => $startup->getName(),
                'logo' => $this->getImage($startup->getLogo()),
                'description' => $startup->getDescription(),
                'one_pager' => $startup->getOnePager(),
                'website' => $startup->getWebsite(),
                'fecha_constitucion' => $startup->getFechaConstitucion(),
                'cierre_ejercicio' => $startup->getCierreEjercicio(),
                'fondice' => $startup->getFondice(),
                'basic' => $this->getBasic($startup),
                'founders' => $this->getFounders($startup),
                'verticales' => $this->getVerticales($startup),
                'documentos' => $this->getDocumentos($startup),
                'status' => $this->getStatus($startup)
            ];
        }


        return $result;
    }

    /**
     * @Route("/{id}", name="startup_by_id")
     * @Route/Method({"GET"})
     */
    public function showAction($id)
    {
        $startup = $this->getDoctrine()->getRepository(Startup::class)->findOneById($id);
        if (!$startup) {
            return [];
        }
        return [
            'id' => $startup->getId(),
            'name' => $startup->getName(),
            'logo' => $startup->getLogo(),
            'description' => $startup->getDescription(),
            'one_pager' => $startup->getOnePager(),
            'website' => $startup->getWebsite(),
            'fecha_constitucion' => $startup->getFechaConstitucion(),
            'cierre_ejercicio' => $startup->getCierreEjercicio(),
            'fondice' => $startup->getFondice(),
            'basic' => $this->getBasic($startup),
            'documentos' => $this->getDocumentos($startup),
            'founders' => $this->getFounders($startup),
            'verticales' => $this->getVerticales($startup),
            'status' => $this->getStatus($startup)
        ];
    }
}